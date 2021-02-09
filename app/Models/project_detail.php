<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_detail extends Model
{
    protected $fillable = [
        'id',
        'pro_id',
        'pmname',
        'pmlname',
        'pmphone',
        'customer',
        'Payment',

        'operational_goals',
        'scope_detail1',
        'scope_detail2',
        'scope_detail3',
        'scope_detail4',
        'scope_detail5',
        'scope_detail6',

        'action_plan1',
        'action_plan_date2',
        'action_plan_date3',
        'action_plan4',
        'action_plan5',
        'action_plan6',

        'finance1',
        'finance2',
        'finance3',
        'finance4',
        'finance5',
        
        'performance1',
        'performance2',
        'Risk',
        'created_by',
        'update_by',
    ];
}
