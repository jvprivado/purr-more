<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class MediacomExport implements FromCollection
{
    public $start_date;
    public $end_date;
    public function __construct($start_date, $end_date){
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = User::whereBetween('created_at',[$this->start_date,$this->end_date])
            ->select('firstname','lastname','email','phone','created_at')
            ->get();
        $users = [];

        if(count($data)<=0){
            return collect([
                (object)['data'=>'No data found between the given date range']
            ]);
        }
        else{
            foreach ($data as $user){
                $users[] =[
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'created_at' => date('d-m-y', strtotime($user->created_at))
                ];
            }
            return collect([
                (object)$users
            ]);
        }
    }
}
