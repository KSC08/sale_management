<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable =['vis_name',
    'vis_lname','ID_card','phone','vis_email',
    'vis_doc','vis_image','vis_creator','vis_editor'];
}


