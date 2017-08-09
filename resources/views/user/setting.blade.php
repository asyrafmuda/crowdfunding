@extends('layouts.app')

@section('content-app')

    @include('partials.app.user_heading')

    <div style="background: #fff; padding: 20px 0 0 0;" class="">
        <div class="container">
            @include('partials.app_messages');
        </div>
    </div>

    <div style="background: #fff;min-height: 500px; padding: 0;" class="">
        <div class="container">
            <div class="col-lg-12">
                <div class="tabs-container">

                    <div class="tabs-left">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-6">
                                    <i class="fa fa-user-circle"></i>My Profile
                                </a></li>
                            <li class=""><a data-toggle="tab" href="#tab-7">
                                    <i class="fa fa-credit-card"></i>Bank Account</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-8">
                                    <i class="fa fa-lock"></i>Security</a></li>
                        </ul>
                        <div class="tab-content ">
                            <div id="tab-6" class="tab-pane active">
                                <div class="panel-body">

                                    <div class="col-lg-8">
                                        <p>Update your profile settings, username, picture, till your bio. Give others people
                                        to let you know about you more closer.</p>
                                        <form action="{{ route('user.profile.save') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}

                                            <div class="form-group form-group-sm">
                                               <div class="">
                                                   <label class="col-lg-2" for="user_picture">Picture</label>
                                                   <div class="col-lg-10">
                                                       <input type="file" name="user_picture"
                                                              id="user_picture" class="form-control"
                                                              value="{{ $user->picture }}">
                                                       <p style="padding-top: 8px; font-size: 11px;">
                                                           These words will help people find your project, so
                                                           choose them wisely! Your name will be searchable too.
                                                       </p>
                                                   </div>
                                               </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2" for="username">Username</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="username" id="username"
                                                               class="form-control" value="{{ $user->username }}">
                                                        <p style="padding-top: 8px; font-size: 11px;">
                                                            These words will help people find your project, so
                                                            choose them wisely! Your name will be searchable too.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2" for="user_job_title">Job Title</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="user_job_title" id="user_job_title"
                                                               class="form-control" value="{{ $user->job_title }}">
                                                        <p style="padding-top: 8px; font-size: 11px;">
                                                            These words will help people find your project, so
                                                            choose them wisely! Your name will be searchable too.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2" for="user_website">Website</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="user_website" id="user_website"
                                                               class="form-control" value="{{ $user->website }}">
                                                        <p style="padding-top: 8px; font-size: 11px;">
                                                            These words will help people find your project, so
                                                            choose them wisely! Your name will be searchable too.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2" for="user_bio">Bio</label>
                                                    <div class="col-lg-10">
                                                        <p style="padding-top: 8px; font-size: 11px;">
                                                            These words will help people find your project, so
                                                            choose them wisely! Your name will be searchable too.
                                                        </p>
                                                        <textarea name="user_bio" rows="5" id="user_bio" class="form-control">{{ $user->bio }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2"></label>
                                                    <div class="col-lg-10">
                                                        <button type="submit" class="btn btn-link btn-sm">
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                    <div class="col-lg-4">
                                        <strong>Let's Verified Your Account</strong>

                                        <p style="font-size: 12px;">
                                            A wonderful serenity has taken possession of my entire soul,
                                            like these sweet mornings of spring which.
                                            <a href="#">Verified Request</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-7" class="tab-pane">
                                <div class="panel-body">
                                    <div class="col-lg-8">
                                        <p>To make easy when you request withdraw for your campaign let's add your bank account data, don't worry it will keep secret for public .</p>
                                        <form action="{{ route('user.bank.save') }}" id="bank" method="POST" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}

                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2" for="user_bank_name">Bank</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="user_bank_name" id="user_bank_name"
                                                               class="form-control" value="{{ $user->bank_name }}">
                                                        <p style="padding-top: 8px; font-size: 11px;">
                                                            These words will help people find your project, so
                                                            choose them wisely! Your name will be searchable too.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2" for="user_bank_account">Account Name</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="user_bank_account" id="user_bank_account"
                                                               class="form-control" value="{{ $user->bank_account }}">
                                                        <p style="padding-top: 8px; font-size: 11px;">
                                                            These words will help people find your project, so
                                                            choose them wisely! Your name will be searchable too.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2" for="user_bank_number">Account Number</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="user_bank_number" id="user_bank_number"
                                                               class="form-control" value="{{ $user->bank_number }}">
                                                        <p style="padding-top: 8px; font-size: 11px;">
                                                            These words will help people find your project, so
                                                            choose them wisely! Your name will be searchable too.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2"></label>
                                                    <div class="col-lg-10">
                                                        <button type="submit" class="btn btn-link btn-sm">
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                    <div class="col-lg-4">
                                        <strong>Why It's Need?</strong>

                                        <p style="font-size: 12px;">
                                            A wonderful serenity has taken possession of my entire soul,
                                            like these sweet mornings of spring which.
                                            <a href="#">Learn More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-8" class="tab-pane">
                                <div class="panel-body">
                                    <div class="col-lg-8">
                                        <p>
                                            Keep your account secure, you can change your email, and your password if you feel your account was not secure anymore.
                                        </p>
                                        <form action="{{ route('user.security.save') }}" id="security" method="POST" class="form-horizontal">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}

                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2" for="user_email">Email</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="user_email" id="user_email"
                                                               class="form-control" value="{{ $user->email }}">
                                                        <p style="padding-top: 8px; font-size: 11px;">
                                                            These words will help people find your project, so
                                                            choose them wisely! Your name will be searchable too.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2" for="user_old_password">Old Password</label>
                                                    <div class="col-lg-10">
                                                        <input type="password" name="user_old_password" id="user_old_password"
                                                               class="form-control">
                                                        <p style="padding-top: 8px; font-size: 11px;">
                                                            These words will help people find your project.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2" for="user_new_password">New Password</label>
                                                    <div class="col-lg-10">
                                                        <input type="password" name="user_new_password" id="user_new_password"
                                                               class="form-control">
                                                        <p style="padding-top: 8px; font-size: 11px;">
                                                            These words will help people find your project.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2" for="user_website">Confirm Password</label>
                                                    <div class="col-lg-10">
                                                        <input type="password" name="user_website" id="user_website"
                                                               class="form-control">
                                                        <p style="padding-top: 8px; font-size: 11px;">
                                                            These words will help people find.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <div class="">
                                                    <label class="control-label col-lg-2"></label>
                                                    <div class="col-lg-10">
                                                        <button type="submit" class="btn btn-link btn-sm">
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                        <p style="font-size: 12px;"><a href="#">Deactivated My Account</a></p>
                                    </div>

                                    <div class="col-lg-4">
                                        <strong>Why It's Need?</strong>

                                        <p style="font-size: 12px;">
                                            A wonderful serenity has taken possession of my entire soul,
                                            like these sweet mornings of spring which.
                                            <a href="#">Learn More</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection