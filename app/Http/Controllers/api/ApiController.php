<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurRequest;
use App\Models\Blog;
use App\Models\PreviousWinner;
use App\Models\Product;
use App\Models\User;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Exception;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    private $ffmpeg = null;

    /**
     * Singleton to initialze FFMPEG to speedup operations
     */
    private function initializeFFMPEG() 
    {   
        if(!$this->ffmpeg) {
            $this->ffmpeg = FFMpeg::create([                
                'ffmpeg.binaries'  => '/usr/bin/ffmpeg',
                'ffprobe.binaries' => '/usr/bin/ffprobe',
            ]); 
        }
    }   

    public function storePurr(PurRequest $request)
    {
        try {
            set_time_limit(0);
            if ($request->hasFile('pur')) {
                $thumbnailPath = "";
                $file = $request->file('pur');
                $contents = fopen($file, 'rb');
                $fileName = time() .'-'. 'purr-file.'.$request->file('pur')->extension();

                $this->setS3Service();

                try {                   
                    $result = $this->s3Service->upload(config('aws.s3_bucket'),config('aws.s3_purr_video_folder') . $fileName,$contents);
                } catch (Exception $e) {
                    return response()->json([
                        'message' => 'Server Error! Can\'t store data. Please try again later.',
                        'errors' => $e->getMessage()
                    ], 400);
                }

                
                User::create([
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'pur' =>  config('aws.s3_purr_video_folder') . $fileName,
                    'thumbnail' => $thumbnailPath,
                    'cat_names' => $request->cat_names,
                    'agreementPromotion' => $request->agreementPromotion,
                    'agreementTC' => $request->agreementTC,
                ]);
            } else
                return response()->json('No purr file found', 400);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Server Error! Can\'t store data. Please try again later.',
                'errors' => $exception->getMessage()
            ],400);
        }

        return response()->json("data stored successfully", 200);
    }

    public function banners()
    {
        $bannersList = DB::table('banners')->where('banner_status', 0)->select('banner')->get(); 
        $banners = [];
        $this->setS3Service(); 
        foreach($bannersList as $banner) {    
            $key = $this->s3Service->getKeyFromS3Url($banner->banner,config('aws.s3_banners_folder'));           
            $presignedUrl = $this->s3Service->getSignedURL(config('aws.s3_bucket'),$key,config('aws.s3_url_lifetime'));      
            $banner->banner = $presignedUrl;
            $banners[] = $banner;
        }

        return response()->json(['banners' => $banners], 200);
    }

    public function featuredUser(Request $request)
    {
        $us = [];     
        $this->initializeFFMPEG(); 
        $this->setS3Service();
        $users = User::where('pur_status', '1')->select('id','firstname', 'lastname', 'pur', 'cat_names', 'thumbnail')->orderBy('id', 'desc')->get();

        foreach($users as $user) {  
            $fileName = 'thumbnail_' . $user->id . '.jpg';            
            $thumbnailPath =  config('aws.s3_purr_image_folder') . $fileName;           
            $key = $this->s3Service->getKeyFromS3Url($user->pur,config('aws.s3_purr_video_folder'));
            $presignedUrl = $this->s3Service->getSignedURL(config('aws.s3_bucket'),$key,config('aws.s3_url_lifetime'));  
            $response = $this->s3Service->doesObjectExist(config('aws.s3_bucket'), config('aws.s3_purr_image_folder') , $thumbnailPath);
           
           if(!$response){               
               $this->createThumbnail($presignedUrl,$thumbnailPath);
               Log::info('createThumbnail 1 : '. $thumbnailPath);
               if(file_exists(public_path($thumbnailPath))) {
                    $contents=file_get_contents(public_path($thumbnailPath));
                    $result = $this->s3Service->upload(config('aws.s3_bucket'),config('aws.s3_purr_image_folder') . $fileName,$contents);                
               }
           }

            $user->thumbnail = $this->s3Service->getSignedURL(config('aws.s3_bucket'),$thumbnailPath,config('aws.s3_url_lifetime'));      
            $user->pur       = $presignedUrl;
            $us[] = $user;
        }
       
        return response()->json(['featuredUsers' => $us], 200);
    }

    /**
     * Create the thumbnail image
     * 
     * @param  string  $path
     * @param  string  $imageName
     * @return boolen
     */
    private function createThumbnail($path,$imageName)
    {
        if(!$this->ffmpeg) {
            return false;
        }

        if(file_exists(public_path($imageName))) {
            return true;
        }

        $video = $this->ffmpeg->open($path);
        return $video->frame(TimeCode::fromSeconds(2))->save(public_path($imageName));
    }



    public function winnerOfTheMonth()
    {
        $user = User::where('pur_status', '2')
            ->select('firstname', 'lastname', 'pur', 'cat_names', 'thumbnail')->orderBy('id', 'desc')->first();
        return response()->json(['winnerOfTheMonth' => [$user]], 200);
    }

    public function previousWinners()
    {
        $users = PreviousWinner::select('name', 'cat_name', 'winningTime')->orderBy('id', 'desc')->limit(12)->get();
        return response()->json(['previousWinners' => $users], 200);
    }

    public function blogList()
    {
        $blogsList = Blog::select('id', 'title', 'slug', 'image')->get();
        $blogs = [];

        $this->setS3Service();  
        foreach($blogsList as $blog) {  
            $key = $this->s3Service->getKeyFromS3Url($blog->image,config('aws.s3_blogs_folder'));
            $presignedUrl = $this->s3Service->getSignedURL(config('aws.s3_bucket'),$key,config('aws.s3_url_lifetime'));      
            $blog->image = $presignedUrl;
            $blogs[]= $blog;
        }

        return response()->json(['blogs' => $blogs], 200);
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return response()->json(['blog' => $blog], 200);
    }

    public function products()
    {
        $productsList = Product::all();
        $this->setS3Service();  
        foreach($productsList as $product) {  
            $key = $this->s3Service->getKeyFromS3Url($product->image,config('aws.s3_products_folder'));
            $presignedUrl = $this->s3Service->getSignedURL(config('aws.s3_bucket'),$key,config('aws.s3_url_lifetime'));      
            $product->image = $presignedUrl;
            $products[]= $product;
        }
        return response()->json(['products' => $products], 200);
    }


    public function createFileObject($url)
    {
        $path_parts = pathinfo($url);

        $newPath = $path_parts['dirname'] . '/tmp-files/';
        if (!is_dir($newPath)) {
            mkdir($newPath, 0777);
        }

        $newUrl = $newPath . $path_parts['basename'];
        copy($url, $newUrl);
        $imgInfo = getimagesize($newUrl);

        $file = new UploadedFile(
            $newUrl,
            $path_parts['basename'],
            $imgInfo['mime'],
            filesize($url),
            TRUE
        );

        return $file;
    }
}
