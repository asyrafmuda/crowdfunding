<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Campaign;
use App\Donation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $donation_id
     * @param $user_email
     * @return \Illuminate\Http\Response
     */
    public function billing($campaign_id, $donation_id, $slug)
    {
        // Get donation by id.
        $donation = Donation::findOrFail($donation_id);

        if ($slug != $donation->campaign->slug || $campaign_id != $donation->campaign->id) {
            abort(404);
        }

        return view('donation.information')
           ->withDonation($donation);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $campaign_id
     * @return \Illuminate\Http\Response
     */
    public function addNew($campaign_id, $slug)
    {
        $campaign = Campaign::findOrFail($campaign_id);

        // Check if the slug in url doesn't match
        if ($slug !== $campaign->slug) {
            abort(404);
        }

        // Set the user id with statement, if this user is a guest
        // set the user id to '0' and if this as a user let
        // set the user id with their id.
        $user_id = (Auth::guest()) ? 0 : Auth::user()->id;

        return view('donation.add')
            ->withUserId($user_id)
            ->withCampaign($campaign);
    }

    /**
     * Show the form for choose the payment method
     *
     * @param $campaign_id
     * @param $slug
     * @param Request $request
     * @return mixed
     */
    public function payment($campaign_id, $slug, Request $request)
    {
        $this->validate($request, [
            'donation' => 'required|numeric'
        ]);

        $campaign = Campaign::findOrFail($campaign_id);

        $banks = Bank::all();

        if ($slug !== $campaign->slug) {
            abort(404);
        }

        return view('donation.payment')
            ->withCampaign($campaign)
            ->withBanks($banks)
            ->withData($request);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donation = new Donation;

        $donation->bank_id = $request->bank;
        $donation->user_id = (Auth::guest()) ? 0 : Auth::user()->id;
        $donation->campaign_id = $request->_campaign;
        $donation->amount = $request->_amount;
        $donation->name = (Auth::guest()) ? $request->name : Auth::user()->name;
        $donation->email = ((Auth::guest())) ? $request->email : Auth::user()->email;
        $donation->status = 0;
        $donation->payment_method = 1;
        $donation->end_donation = Carbon::now()->addDays(3);

        $donation->save();

        return redirect()->route('donation.billing', [$donation->campaign_id ,$donation->id, $request->_slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user, $campaign, $donation)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
