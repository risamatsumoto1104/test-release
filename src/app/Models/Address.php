<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // 主キー名を変更
    protected $primaryKey = 'address_id';

    protected $fillable = [
        'user_id',
        'postal_code',
        'address',
        'building',
    ];

    //　主：User(1)　⇔　従：address(1)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
