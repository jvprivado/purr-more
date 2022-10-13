<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCreateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function addBlog(){
        return view('admin.blog.add');
    }

    public function uploadBlog(BlogCreateRequest $request){
        try {           
            if ($request->hasFile("image")) {  
                $file = $request->file("image");
                $contents = fopen($file, 'rb');
                $fileName = time() .'-'. 'blogs.'.$request->file('image')->extension();
                $this->setS3Service();             
                $result = $this->s3Service->upload(config('aws.s3_bucket'),config('aws.s3_blogs_folder') . $fileName,$contents);
            }           

            Blog::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'image' => config('aws.s3_blogs_folder').$fileName,
                'description' => $request->description,
                'creationTime' => date('d/m/y')
            ]);
        }catch (\Exception $exception){
            return back()
                ->withErrors(['invalid' => 'Something Went Wrong Try Again']);
        }
        return redirect()->route('blogList');
    }

    public function blogList(){
        $blogList = Blog::all();

        $blogs = [];
        $this->setS3Service();  

        foreach($blogList as $blog) {  
            $key = $this->s3Service->getKeyFromS3Url($blog->image,config('aws.s3_products_folder'));
            $presignedUrl = $this->s3Service->getSignedURL(config('aws.s3_bucket'),$key,config('aws.s3_blogs_folder'));      
            $blog->image = $presignedUrl;         
            $blogs[]= $blog;
        }

        return view('admin.blog.list', compact('blogs'));
    }

    public function editBlog($id){
        $blog = Blog::where('id',$id)->first();
        return view('admin.blog.edit',compact('blog'));
    }

    public function updateBlog($id, Request $request){
        $blog = Blog::find($id);

        $dataToUpdate = [];
        if($request->title!= null) {
            $dataToUpdate["title"] = $request->title;
            $dataToUpdate["slug"] = Str::slug($request->title);
        }

        if($request->image!= null){
            $path="";
            if ($request->hasFile("image")) {
                $file = $request->file("image");
                $path = $file->store('blogs', 's3');
                Storage::disk('s3')->put($path, fopen($file, 'r+'), 'public');
            }
            $fileName = basename($path);
            $dataToUpdate["image"] = env('AWS_URL').'blogs/'.$fileName;
        }

        if($request->description!= null)
            $dataToUpdate["description"] = $request->description;

        $blog->update($dataToUpdate);
        return redirect()->route('blogList');
    }

    public function deleteBlog($id){
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blogList');
    }
}
