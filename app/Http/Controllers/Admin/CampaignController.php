<?php

namespace App\Http\Controllers\Admin;

use App\Campaign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class CampaignController extends Controller
{

    /**
     * This model builder
     *
     * @var mixed Model
     */
    private $campaign;

    /**
     * This a user who was create
     * campaign and campaign belong to this user
     *
     * @var integer $user_id
     */
    private $user_id;

    /**
     * This duration of campaign
     *
     * @var mixed Date
     */
    private $duration;

    /**
     * Slug for the campaign is unique for url
     *
     * @var string slug
     */
    private $slug;

    /**
     * Return integer to get status code
     *
     * @var integer
     */
    private $status;

    /**
     * Campaign Title
     *
     * @var string
     */
    private $title;

    /**
     * This is short description for the campaign.
     *
     * @var string
     */
    private $blurb;

    /**
     * This campaign's description
     *
     * @var mixed
     */
    private $description;

    /**
     * This a campaign location
     *
     * @var string
     */
    private $location;

    /**
     * This is funding goal for the campaign
     *
     * @var integer
     */
    private $funding_goal;

    /**
     * Image cover for the campaign
     *
     * @var mixed
     */
    private $thumbnail;

    public function __construct()
    {
        $this->middleware('auth:admin');

        // Set campaign model
        $this->setCampaign(new Campaign());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = $this->campaign->all();
        
        $campaigns_featured = $this->campaign->where('status', '3')->get();
        $campaigns_funded = $this->campaign->where('status', '2')->get();
        $campaigns_trashed = $this->campaign->where('status', '0')->get();

        return view('admin.campaign.index')
            ->withCampaigns($campaigns)
            ->withCampaignsFeatured($campaigns_featured)
            ->withCampaignsFunded($campaigns_funded)
            ->withCampaignsTrashed($campaigns_trashed);
    }

    public function editList()
    {
        $campaigns = $this->campaign->all();

        return view('admin.campaign.edit')
            ->withCampaigns($campaigns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campaign._form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $this->validator($request);

        // Init for attributes value
        $this->bindRequest($request);

        // Upload the image
        if($request->hasFile('campaign_image')) {

            $file = $request->file('campaign_image');

            /* Storing images to disk */
            $filename = $file->storePublicly('images' , 'public');

            /* Storing image path to the database */
            $this->thumbnail = $filename;
        }

        $this->saveData();

        $request->session()->flash('success', 'Your campaign has been successful created!');

        return redirect()
            ->route('admin.campaign.new')
            ->withInput($request->only([
                'campaign_image',
                'campaign_title',
                'campaign_short_blurb',
                'campaign_location',
                'campaign_duration',
                'campaign_funding_goal',
                'campaign_description',
            ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug)
    {
        $campaign = $this->getSingleCampaign($id, $slug);

        return view('admin.campaign.show')
            ->withCampaign($campaign);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $slug)
    {
        $campaign = $this->getSingleCampaign($id, $slug);

        return view('admin.campaign._form')
            ->withCampaign($campaign);
    }

    /**
     * Get a single resource.
     *
     * @param $id
     * @param $slug
     * @return mixed
     */
    public function getSingleCampaign($id, $slug)
    {
        $campaign = $this->campaign->findOrFail($id);

        if(empty($this->user_id))
        {
            $this->user_id = Auth::user()->id;
        }

        if ($slug !== $campaign->slug) {
            abort(404);
        }

        return $campaign;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @param  string   $slug
     * @return bool
     */
    public function update(Request $request, $id, $slug)
    {
        // Validate the request data
        $this->validator($request);

        $this->bindRequest($request);

        $update = $this->updateData($request, $id, $slug);

        $request->session()
            ->flash('success', 'You\'ve success update your campaign. ');

        return redirect()
            ->route('admin.campaign.show', [$update->id, $update->slug]);
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


    /**
     * Bind the request data into each variable.
     *
     * @param $request
     */
    public function bindRequest($request)
    {
        // Init user id
        $this->setUserId(Auth::user()->id);

        // Set for duration
        $this->setDuration($request->campaign_duration);

        // Set for campaign slug
        $this->setSlug($request->campaign_title);

        // Set for status
        $this->setStatus($request->_status);

        // Set title
        $this->setTitle($request->campaign_title);

        // Set blurb
        $this->setBlurb($request->campaign_short_blurb);

        // Set Description
        $this->setDescription($request->campaign_description);

        // Set campaign location by the request
        $this->setLocation($request->campaign_location);

        // Set the funding goal for the campaign
        $this->setFundingGoal($request->campaign_funding_goal);

        // Set the image.
        $this->setThumbnail($request->campaign_image);
    }

    /**
     * Save the campaign data to created and it
     * will storing into database.
     *
     * @return mixed
     */
    private function saveData()
    {
        return $this->campaign->create([
            'slug'          => $this->slug,
            'user_id'       => $this->user_id,
            'title'         => $this->title,
            'blurb'         => $this->blurb,
            'description'   => $this->description,
            'location'      => $this->location,
            'duration'      => $this->duration,
            'funding_goal'  => $this->funding_goal,
            'thumbnail'     => $this->thumbnail,
            'status'        => $this->status,
        ]);
    }

    /**
     * Update function for campaign, including the image upload
     * set for the new one.
     *
     * @param Request $request
     * @param $id
     * @param $slug
     * @return mixed
     */
    private function updateData(Request $request, $id, $slug)
    {
        // Bind the request data to attribute
        $campaign = $this->campaign->find($id);

        // Upload the image
        if($request->hasFile('campaign_image')) {

            Storage::delete($campaign->thumbnail);

            $file = $request->file('campaign_image');

            /* Storing images to disk */
            $filename = $file->storePublicly('images' , 'public');

            /* Storing image path to the database */
            $campaign->thumbnail = $filename;
        }

        $campaign->title = $this->title;
        $campaign->user_id = $this->user_id;
        $campaign->slug = $this->slug;
        $campaign->blurb = $this->blurb;
        $campaign->description = $this->description;
        $campaign->location = $this->location;
        $campaign->duration = $this->duration;
        $campaign->funding_goal = $this->funding_goal;
        $campaign->status = $this->status;

        $campaign->save();

        return $campaign;
    }


    /**
     * Get slug campaign
     *
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the campaign slug
     *
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        // Make slug for the campaign
        $slug_split = explode(' ', $slug);
        $slug = $this->getUserId() . rand(0, 999999). '-' . strtolower(implode('-', $slug_split));

        $this->slug = $slug;
    }

    /**
     * Validator for form campaign on
     * create and update
     *
     * @param Request $data
     */
    private function validator($data)
    {
        $this->validate($data, [
            'campaign_image' => 'image',
            'campaign_title' => 'required|max:255',
            'campaign_short_blurb' => 'required|max:135',
            'campaign_location' => 'required',
            'campaign_duration' => 'required',
            'campaign_funding_goal' => 'required',
            'campaign_description' => 'required|min:135'
        ]);
    }

    /**
     * Get campaign model
     *
     * @return Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * Set campaign model
     *
     * @param Campaign $campaign
     */
    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * Get user id, its user who created this campaign
     *
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set user id for campaign
     *
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Get duration campaign
     *
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set duration campaign, it setting by Carbon.
     *
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $duration = Carbon::now()->addDays($duration);

        $this->duration = $duration;
    }

    /**
     * Get Status
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status, it will switch form string into integer
     *
     * @param mixed $status
     * @return int
     */
    public function setStatus($status)
    {

        switch ($status)
        {
            case 'featured':
                $status = 3;
                break;

            default:
                // Code 1 sign for campaign is live.
                $status = 1;
                break;
        }

        return $this->status = $status;
    }

    /**
     * Set title for campaign.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Set blurb, this is short description
     *
     * @param string $blurb
     */
    public function setBlurb($blurb)
    {
        $this->blurb = $blurb;
    }

    /**
     * Set details, or description for campaign
     *
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Set campaign location
     *
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Set funding goal
     *
     * @param mixed $funding_goal
     */
    public function setFundingGoal($funding_goal)
    {
        $this->funding_goal = $funding_goal;
    }

    /**
     * Set thumbnail
     *
     * @param mixed $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

}
