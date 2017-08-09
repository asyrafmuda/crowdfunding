<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{

    protected $fillable = [
        'slug', 'user_id', 'title', 'description', 'blurb', 'location', 'duration',
        'thumbnail', 'funding_goal', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function donation()
    {
        return $this->hasMany('App\Donation');
    }

    public function donationApprovedNewest()
    {
        return $this->hasMany('App\Donation')
            ->where('status', 2)
            ->take(3)
            ->orderByDesc('created_at');
    }


    public function getUserCampaign($id)
    {
        return self::all()->where('user_id', $id);
    }
}
