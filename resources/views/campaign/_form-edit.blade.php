@extends('layouts.app')

@push('styles-app')
    <link rel="stylesheet" href="{{ asset('css/plugins/summernote/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/summernote/summernote-bs3.css') }}">

    <style>
        .top-navigation .wrapper.wrapper-content {
            padding: 0 !important;
        }
        #page-wrapper {
            padding: 0 !important;
            min-height: 0px !important;
        }
        .nav-tabs {
            border-bottom: 1px solid transparent; !important;
        }
        .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
            border-color: transparent !important;
        }
        .nav-tabs > li > a:hover {
            border-color: transparent !important;
        }
        .nav-submit-campaign {
            float: right !important;
        }
    </style>
@endpush

@push('scripts-app')
    <script src="{{ asset('js/plugins/summernote/summernote.min.js') }}"></script>
@endpush

@section('content-app')

    <div class="container">
        <div class="row m-b-lg m-t-lg">
            <div class="col-md-6">

                <div class="profile-image text-center">
                    <i class="fa fa-paper-plane-o" style="padding-top: 15px;font-size: 60px"></i>
                </div>
                <div class="profile-info">
                    <div class="">
                        <div>
                            <h2 class="no-margins">
                                Let’s get up todate.
                            </h2>
                            <h4>Edit This Campaign</h4>
                            <small>
                                There are many variations of passages of Lorem Ipsum available, but the majority
                                have suffered alteration in some form Ipsum available.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>

    <form action="{{ route('user.campaign.update', [$campaign->id, $campaign->slug]) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        {{ csrf_field()  }}
        {{ method_field('PUT') }}

        <div class="tab-container">

            <div style="background: #fff; border: 1px solid transparent; border-bottom-color: #e9e9e9; border-top-color: #e9e9e9;">
                <div class="container">
                    <nav class="navbar">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab-basics" data-toggle="tab">Basic</a>
                            </li>
                            <li>
                                <a href="#tab-story" data-toggle="tab">Campaign Detail</a>
                            </li>
                            <li>
                                <a href="#tab-rewards" data-toggle="tab">Rewards</a>
                            </li>
                            <li class="nav-submit-campaign">
                                <a href="{{ route('home') }}">Back</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="tab-content">
                <div style="background: #fff;" class="">
                    <div class="container">
                        @include('partials.app_messages')
                    </div>
                </div>
                <div class="tab-pane active" id="tab-basics">
                    <div style="background: #fff;min-height: 500px; padding: 40px 0;" class="">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group form-group-sm {{ $errors->has('campaign_image') ? 'has-error' : '' }}">
                                        <label class="col-sm-2 control-label"
                                               for="campaign_image">Campaign image</label>

                                        <div class="col-sm-9">
                                            <input type="file" class="form-control"
                                                   id="campaign_image" name="campaign_image">
                                            <p style="padding-top: 8px;">
                                                This is the first thing that people will see when
                                                they come across your project. Choose an image that’s
                                                crisp and text-free.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm {{ $errors->has('campaign_title') ? 'has-error' : '' }}">
                                        <label class="col-sm-2 control-label"
                                               for="campaign_title">Campaign title</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                   placeholder="Your campaign title"
                                                   id="campaign_title"
                                                   name="campaign_title"
                                                   value="{{ $campaign->title }}">

                                            <p style="padding-top: 8px;">
                                                These words will help people find your project, so
                                                choose them wisely! Your name will be searchable too.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm {{ $errors->has('campaign_short_blurb') ? 'has-error' : '' }}">
                                        <label class="col-sm-2 control-label"
                                               for="short_blurb">Short blurb</label>

                                        <div class="col-sm-9">
                                                    <textarea name="campaign_short_blurb"
                                                              placeholder="Short description"
                                                              id="short_blurb"
                                                              class="form-control"
                                                              rows="3">{{ $campaign->blurb }}</textarea>

                                            <p style="padding-top: 8px;">
                                                Give people a sense of what you’re doing. Skip
                                                “Help me” and focus on what you’re making.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm {{ $errors->has('campaign_location') ? 'has-error' : '' }}">
                                        <label class="col-sm-2 control-label" for="campaign_location">
                                            Campaign location
                                        </label>

                                        <div class="col-sm-9">
                                            <div class="input-group m-b">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-map-marker"></i>
                                                        </span>
                                                <input type="text"
                                                       id="campaign_location"
                                                       name="campaign_location"
                                                       placeholder="Your campaign location"
                                                       value="{{  $campaign->location  }}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm {{ $errors->has('campaign_duration') ? 'has-error' : '' }}">
                                        <label class="col-sm-2 control-label">Campaign duration</label>
                                        <div class="col-sm-9">
                                            <div class="form-inline">
                                                <label for="number_of_days" style="margin-right: 10px;">
                                                    Number Of day left
                                                </label>
                                                <input id="number_of_days"
                                                       type="text"
                                                       name="campaign_duration"
                                                       placeholder="Up to 60 Days"
                                                       value="{{ \Carbon\Carbon::parse($campaign->duration)->diffInDays()  }}"
                                                       class="form-control">

                                            </div>

                                            <p style="padding-top: 5px;">
                                                Projects with shorter durations have higher success rates.
                                                You won’t be able to adjust your duration after you launch
                                            </p>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm {{ $errors->has('campaign_funding_goal') ? 'has-error' : '' }}">
                                        <label class="col-sm-2 control-label" for="campaign_funding_goal">
                                            Funding goal
                                        </label>
                                        <div class="col-sm-9">
                                            <div class="input-group m-b">
                                                <span class="input-group-addon">Rp.</span>
                                                <input type="text"
                                                       id="campaign_funding_goal"
                                                       name="campaign_funding_goal"
                                                       placeholder="Funding goal"
                                                       value="{{ $campaign->funding_goal }}"
                                                       class="form-control">
                                            </div>
                                            <p style="padding-top: 8px;">
                                                It’s okay to raise more than your goal, but if your goal
                                                isn’t met, nomoney will be collected. Your goal
                                                should reflect the minimum amount of funds you
                                                need to complete your project and send out rewards,
                                                and include a buffer for payments processing fees.
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="">
                                        <strong>Campaign Status</strong>
                                        <br>
                                        <small>
                                            Select a status for this campaign. You can
                                            <strong>featured</strong> this campaign Select a status for
                                            this campaign so that it can be easily seen by the user.
                                        </small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-story">
                    <div style="background: #fff;min-height: 500px; padding: 40px 0;" class="">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group form-group-sm {{ $errors->has('campaign_video') ? 'has-error' : '' }}">
                                        <label class="col-sm-2 control-label" for="campaign_video">
                                            Campaign video
                                        </label>
                                        <div class="col-sm-5">
                                            <input type="file"
                                                   class="form-control"
                                                   id="campaign_video"
                                                   name="campaign_video"
                                                   value="{{ old('campaign_video')  }}">

                                            <p style="padding-top: 8px;">
                                                Have fun – add a video! Projects with a video have a
                                                much higher chance of success.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-sm{{ $errors->has('campaign_description') ? 'has-error' : '' }}">
                                        <label class="col-sm-2 control-label" for="campaign_description">
                                            Campaign Description
                                        </label>
                                        <div class="col-sm-9">

                                            <p style="">
                                                Use your project description to share more about what you’re
                                                raising funds to do and how you plan to pull it off.
                                                It’s up to you to make the case for your project.
                                            </p>

                                            <textarea name="campaign_description"
                                                      id="campaign_description"
                                                      placeholder="Campaign Details"
                                                      class="summernote form-control">{{ $campaign->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-9">

                                            <button class="btn btn-success" type="submit">
                                                Submit Campaign
                                            </button>

                                            <a href="{{ route('home') }}" class="btn btn-link">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="">
                                        <strong>Campaign Status</strong>
                                        <br>
                                        <small>
                                            Select a status for this campaign. You can
                                            <strong>featured</strong> this campaign Select a status for
                                            this campaign so that it can be easily seen by the user.
                                        </small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection

