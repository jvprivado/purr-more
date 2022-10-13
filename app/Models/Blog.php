<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sagalbot\Encryptable\Encryptable;

class Blog extends Model
{
    use HasFactory,  Encryptable;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'creationTime'
    ];

    protected $encryptable = [
        'title',
        'image',
        'description',
        'creationTime'
    ];
}
