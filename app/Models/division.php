<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class division extends Model
{
    protected $fillable = [
        'id',
        'fullName',
        'shortName',
        'dep_id'
    ];
}
