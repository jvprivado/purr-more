<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
class AdminCntroller extends Controller
{    

    public function index(){
        return view('admin.index');
    }

    public function allEntrant(){
        $entrants = User::where('user_status','0')->where('pur_status','0')->orderBy('id', 'desc')->get();
        return view('admin.allEntrant',compact('entrants'));
    }

    public function featuredUserList(){
        $entrants = User::where('pur_status','1')->orWhere('winningTime','!=', null)->get();
        return view('admin.featuredUserList',compact('entrants'));
    }


    public function makeFeaturedUser($id){
        $this->changeStatus($id,1);
        return redirect()->route('featuredUserList');
    }

    public function softDeleteFeaturedUser($id){
        User::find($id)->delete();

        return redirect()->route('featuredUserList');
    }

    public function makeWinnerOfTheMonth($id){
        $existWinner = User::where('pur_status','2')->first();
        if ($existWinner != null){
            $this->changeStatus($existWinner->id,3);
        }
        $entrant = User::find($id);
        $entrant->pur_status = 2;
        $entrant->winningTime = date("F Y");
        $entrant->save();
        return redirect()->back();
    }

    public function makePreviousWinner($id){
        $this->changeStatus($id,3);
        return redirect()->route('previousWinnerList');
    }

    public function changeStatus($id, $status){
        $entrant = User::find($id);
        $entrant->pur_status = $status;
        $entrant->save();
    }

    public function previewPurr($id){

        $entrant = User::find($id);        
        $this->setS3Service();  
        $key = $this->s3Service->getKeyFromS3Url($entrant->pur,config('aws.s3_purr_video_folder'));
        $presignedUrl = $this->s3Service->getSignedURL(config('aws.s3_bucket'),$key,config('aws.s3_url_lifetime'));     
        $entrant->pur = $presignedUrl;
        
        return view('admin.purrFile',compact('entrant'));
    }

}
