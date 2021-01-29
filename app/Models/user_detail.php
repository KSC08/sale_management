<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'customer',
        'div_id',
        'phone_number'
    ];
}
