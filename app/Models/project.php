<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = [
        'id',
        'code',
        'name',
        'pro_status',
        'pro_type',
        'detail',
        'created_by',
        'update_by',
    ];
}
