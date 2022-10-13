<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sagalbot\Encryptable\Encryptable;

class PreviousWinner extends Model
{
    use HasFactory,Encryptable;

    protected $fillable = [
        "name",
        "cat_name",
        "winningTime",
    ];

    protected $encryptable = [
        "name",
        "cat_name",
        "winningTime",
    ];
}
