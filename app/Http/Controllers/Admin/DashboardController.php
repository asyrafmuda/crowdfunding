<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Bank;
use App\Campaign;
use App\Donation;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $campaigns = new Campaign();
        $users = new User();
        $banks = new Bank();
        $donations = new Donation();

        return view('admin.index')
            ->withCampaigns($campaigns)
            ->withUsers($users)
            ->withBanks($banks)
            ->withDonations($donations);
    }
}
