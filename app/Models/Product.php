<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sagalbot\Encryptable\Encryptable;

class Product extends Model
{
    use HasFactory, Encryptable;

    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'link',
    ];
    protected $encryptable = [ 'title', 'subtitle', 'image', 'link' ];
}
