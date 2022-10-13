<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function addBanner(){
        return view('admin.banner.add');
    }

    public function uploadBanner(Request $request){
        try {
            $path="";
            if ($request->hasFile('banner')) {
                $file = $request->file("banner");
                $contents = fopen($file, 'rb');
                $fileName = time() .'-'. 'banners.'.$request->file('banner')->extension();
                $this->setS3Service();             
                $result = $this->s3Service->upload(config('aws.s3_bucket'),config('aws.s3_banners_folder') . $fileName,$contents);
            }

            Banner::create([
                'banner' => config('aws.s3_banners_folder').$fileName,
            ]);
        }catch (\Exception $exception){
            return back()
                ->withErrors(['invalid' => 'Something Went Wrong Try Again']);
        }
        return redirect()->route('recentBanners');
    }

    public function recentBanners(){
        $bannersList = Banner::where('banner_status',0)->get();
        $banners = [];
        $this->setS3Service(); 
        foreach($bannersList as $banner) {    
            $key = $this->s3Service->getKeyFromS3Url($banner->banner,config('aws.s3_banners_folder'));           
            $presignedUrl = $this->s3Service->getSignedURL(config('aws.s3_bucket'),$key,config('aws.s3_url_lifetime'));      
            $banner->banner = $presignedUrl;
            $banners[] = $banner;
        }
        return view('admin.banner.recentBanners',compact('banners'));
    }

    public function makeOld($id){
        $this->changeStatus(1,$id);
        return back();
    }

    public function oldBanners(){
        $bannersList = Banner::where('banner_status',1)->get();
        $banners = [];
        $this->setS3Service(); 
        foreach($bannersList as $banner) {    
            $key = $this->s3Service->getKeyFromS3Url($banner->banner,config('aws.s3_banners_folder'));           
            $presignedUrl = $this->s3Service->getSignedURL(config('aws.s3_bucket'),$key,config('aws.s3_url_lifetime'));      
            $banner->banner = $presignedUrl;
            $banners[] = $banner;
        }

        return view('admin.banner.oldBanners',compact('banners'));
    }

    public function makeRecent($id){
        $this->changeStatus(0,$id);
        return back();
    }

    public function changeStatus($status, $id){
        $banner = Banner::where('id',$id)->first();
        $banner->banner_status = $status;
        $banner->save();
    }
}
