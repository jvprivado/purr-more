<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Sagalbot\Encryptable\Encryptable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Encryptable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'pur',
        'cat_names',
        'agreementPromotion',
        'agreementTC',
        'pur_status',
        'password',
        'user_status',
        'winningTime',
        'thumbnail'
    ];

    protected $encryptable = [
        'firstname',
        'lastname',
        'pur',
        'cat_names',
        'agreementPromotion',
        'agreementTC',
        'winningTime',
        'thumbnail'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
