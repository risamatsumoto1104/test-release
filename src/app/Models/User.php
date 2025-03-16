<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // 主キー名を変更
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name',
        'email',
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    //　主：User(1)　⇔　従：address(1)
    public function address()
    {
        return $this->hasOne(Address::class, 'user_id');
    }
}
