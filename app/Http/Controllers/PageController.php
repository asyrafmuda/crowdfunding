<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Donation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{

    public function index()
    {
        $campaigns_featured = Campaign::all()
            ->where('status', '3')
            ->sortByDesc('funding_goal')
            ->take(6);

        $campaigns_newest = Campaign::all()
            ->sortByDesc('funding_goal')
            ->take(6);


        return view('welcome')
            ->withCampaignsFeatured($campaigns_featured)
            ->withCampaignsNewest($campaigns_newest);
    }
    /**
     * Dashboard
     *
     * Dashboard is page for user overview
     * user need to login to access this page.
     *
     * @return mixed    View dashboard page
     */
    public function home()
    {
        $campaigns = Campaign::all()
            ->where('user_id', Auth::user()->id);

        $user = User::find(Auth::user()->id);

        return view('home')
            ->withCampaigns($campaigns)
            ->withUser($user);
    }

    /**
     * Explore
     *
     * This page is contain all campaigns has posted,
     * to explore by user or guest.
     *
     * @return mixed    View explore page
     */
    public function explore()
    {
        $campaigns = Campaign::all();


        return view('pages.explore')
            ->withCampaigns($campaigns);
    }

    /**
     * Campaign Detail
     *
     * Detail of campaign to see more details form the campaign and user
     * or guest can start make donation to this single campaign page.
     *
     * Find the campaign by id if the id cannot found in database
     * this page throw to the error 404 page.
     *
     * @param $campaignId   campaign id
     *
     * @return mixed View campaign single post with passing the datas
     */
    public function campaign($id, $slug)
    {
        // Find the campaign data
        // if it doesn't exists (fail) throw to error page
        $campaign = Campaign::findOrFail($id);

        // Checking if the slug doesn't match
        if ($slug != $campaign->slug) {
            return abort('404');
        }

        // Get all donations data where the donation for campaign id
        $donations = Donation::all()
            ->where('campaign_id', $id);

        return view('campaign.show')
            ->withCampaign($campaign)
            ->withDonations($donations);
    }
}
