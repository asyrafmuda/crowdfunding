<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Donation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     *  This provide for user model
     *
     */
    private $user;



    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * User account
     *
     * Display form to update information about the user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userAccount()
    {
        $user = $this->user->findOrFail(Auth::user()->id);

        return view('user.setting')
            ->withUser($user);
    }

    public function profileSave(Request $request)
    {
        $user = $this->user->find(Auth::user()->id);

        $this->validate($request, [
           'username' => 'required'
        ]);

        // Uploading profile picture
        if ($request->hasFile('user_picture'))
        {
            Storage::delete($user->picture);

            $file = $request->file('user_picture');

            /* Storing images to disk */
            $filename = $file->store('images/profile/' , 'public');

            $user->picture = $filename;
        }

        $user->username = $request->username;
        $user->picture = $user->picture;
        $user->job_title = $request->user_job_title;
        $user->bio = $request->user_bio;
        $user->website = $request->user_website;

        $user->save();

        $request->session()->flash('success', 'You success update your profile!');

        return redirect()->route('user.setting');
    }

    public function bankSave(Request $request)
    {
        $user = $this->user->find(Auth::user()->id);

        $user->bank_name = $request->user_bank_name;
        $user->bank_account = $request->user_bank_account;
        $user->bank_number = $request->user_bank_number;

        $user->save();

        $request->session()->flash('success', 'You success update your bank account!');

        return redirect()->route('user.setting');
    }

    public function securitySave(Request $request)
    {
        $user = $this->user->find(Auth::user()->id);

        $user->email = $request->user_email;
        $user->password = bcrypt($request->user_new_password);

        $user->save();

        $request->session()->flash('success', 'You success update about your security');

        return redirect()->route('user.setting');
    }

    public function campaignDonated()
    {
        $model = new Donation();

        $donations = $model->where('user_id', Auth::user()->id)->get();

        $user = $this->user->findOrFail(Auth::user()->id);

        return view('user.donated')->withUser($user)->withDonations($donations);
    }


}
