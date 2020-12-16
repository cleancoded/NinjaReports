<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    
    protected $fillable = [
        'user_id', 'site_url','payment_id','status'
    ];
}
