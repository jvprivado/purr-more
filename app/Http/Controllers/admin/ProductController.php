<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function addProduct(){
        return view('admin.product.add');
    }

    public function uploadProduct(Request $request){
        try {           
            if ($request->hasFile("image")) {
                $file = $request->file("image");
                $contents = fopen($file, 'rb');
                $fileName = time() .'-'. 'products.'.$request->file('image')->extension();
                $this->setS3Service();             
                $result = $this->s3Service->upload(config('aws.s3_bucket'),config('aws.s3_products_folder') . $fileName,$contents);
            }           

            Product::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'image' => config('aws.s3_products_folder').$fileName,
                'link' => $request->link
            ]);
        }catch (\Exception $exception){
            return back()->withErrors(['invalid' => 'Something Went Wrong Try Again']);
        }
        return redirect()->route('productList');
    }

    public function productList(){
        $productsList = Product::all();
        $products = [];
        $this->setS3Service();  

        foreach($productsList as $product) {  
            $key = $this->s3Service->getKeyFromS3Url($product->image,config('aws.s3_products_folder'));
            $presignedUrl = $this->s3Service->getSignedURL(config('aws.s3_bucket'),$key,config('aws.s3_url_lifetime'));      
            $product->image = $presignedUrl;
            $products[]= $product;
        }

        return view('admin.product.list',compact('products'));
    }

    public function editProduct($id){
        $product = Product::where('id',$id)->first();
        return view('admin.product.edit',compact('product'));
    }

    public function updateProduct($id, Request $request){
        $product = Product::find($id);

        $dataToUpdate = [];
        if($request->title!= null)
            $dataToUpdate["title"] = $request->title;

        $dataToUpdate["subtitle"] = $request->subtitle;

        if($request->image!= null){           
            if ($request->hasFile("image")) {
                $file = $request->file("image");
                $contents = fopen($file, 'rb');
                $fileName = time() .'-'. 'products.'.$request->file('image')->extension();
                $this->setS3Service();             
                $result = $this->s3Service->upload(config('aws.s3_bucket'),config('aws.s3_products_folder') . $fileName,$contents);
            }           
            $dataToUpdate["image"] = config('aws.s3_products_folder') . $fileName;
        }

        if($request->link!= null)
            $dataToUpdate["link"] = $request->link;

        $product->update($dataToUpdate);
        return redirect()->route('productList');
    }
}
