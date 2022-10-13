<?php

namespace App\Http\Controllers\admin;

use App\Exports\MediacomExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class CsvController extends Controller
{
    public function mediacomView(Request $request){
        return view('admin.csv.mediacom');
    }
    public function mediacom(Request $request){
        $start_date = Carbon::parse($request->start_date)
            ->toDateTimeString();

        $end_date = Carbon::parse($request->end_date)
            ->toDateTimeString();

        return Excel::download(new MediacomExport($start_date, $end_date), 'users.xlsx');

        redirect()->route('mediacomView');
    }
}
