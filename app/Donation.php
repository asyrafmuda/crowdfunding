<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Donation extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function campaign()
    {
        return $this->belongsTo('App\Campaign');
    }

    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }

    public function getDonationAmount($id, $donation)
    {
        $amount = self::all()
            ->where('campaign_id', $id)
            ->where('status', 2)
            ->sum('amount');

        $donated = ($amount / $donation) * 100;

        return ceil($donated);
    }


    public function getDonors($id)
    {
        return self::distinct()
            ->where('campaign_id', $id)
            ->where('status', 2)
            ->get(['email'])
            ->count();

    }

    /**
     *
     * @param $id
     * @return mixed
     */
    public function getDonated($id)
    {
        return self::all()
            ->where('campaign_id', $id)
            ->where('status', 2)
            ->sum('amount');
    }

    public function getUserDonation($id)
    {
        return self::all()
            ->where('user_id', $id);
    }

    public function getUserDonated($id)
    {
        return self::all()->where('user_id', $id)->get(['campaign_id']);
    }
}
