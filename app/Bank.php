<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'bank_code', 'bank_name', 'short_name', 'branch', 'account_number', 'account_name', 'picture'
    ];

    public function donation()
    {
        return $this->hasMany('App\Donation');
    }
}
