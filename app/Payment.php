<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 
        'description', 
        'currency', 
        'amount',
        'zip',
        'brand',
        'country',
        'exp_month',
        'exp_year'
    ];
}
