<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 
        'subscription_id',
        'plan_id',
        'no_allowed_analysis', 
        'no_allowed_audits', 
        'currency', 
        'amount',
        'interval',
        'product_id',
        'trial_start',
        'trial_end',
        'current_period_start',
        'current_period_end',
        'exp_month',
        'status',
        'created_at',
        'updated_at'
    ];
    public function analysis()
    {
        return $this->hasMany(Analysis::class);
    }
    public function audit()
    {
        return $this->hasMany(Audit::class);
    }
}
