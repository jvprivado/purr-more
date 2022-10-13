<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PreviousWinner;
use Illuminate\Http\Request;

class PreviousWinnerController extends Controller
{
    public function addPreviousWinner(){
        return view('admin.previousWinner.add');
    }

    public function uploadPreviousWinner(Request $request){
        try {
            PreviousWinner::create([
                "name" => $request->name,
                "cat_name" => $request->cat_name,
                "winningTime" =>  date("F Y"),
            ]);
        }catch (\Exception $exception){
            return back()
                ->withErrors(['invalid' => 'Something Went Wrong Try Again'.$exception->getMessage()]);
        }
        return redirect()->route('previousWinnerList');
    }

    public function previousWinnerList(){
        $entrants = PreviousWinner::all();
        return view('admin.previousWinner.list',compact('entrants'));
    }

    public function editPreviousWinner($id){
        $winner = PreviousWinner::where('id',$id)->first();
        return view('admin.previousWinner.edit',compact('winner'));
    }

    public function updatePreviousWinner($id, Request $request){
        $winner = PreviousWinner::find($id);

        $dataToUpdate = [];
        if($request->name!= null)
            $dataToUpdate["name"] = $request->name;

        if($request->cat_name!= null)
            $dataToUpdate["cat_name"] = $request->cat_name;

        if($request->winningTime!= null)
            $dataToUpdate["winningTime"] = $request->winningTime;

        $winner->update($dataToUpdate);

        return redirect()->route('previousWinnerList');
    }

    public function deletePreviousWinner($id){
        $blog = PreviousWinner::find($id);
        $blog->delete();
        return redirect()->route('previousWinnerList');
    }
}
