@extends('layouts.admin')

@php
    if (Request::is("internal/campaigns/new"))
    {
        $request= Request::is("internal/campaigns/new");
    }
    else {
        $request= Request::is("internal/campaigns/$campaign->id/edit/$campaign-slug");
    }
@endphp



@section('page-heading')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2> Start Create Campaign</h2>
            <span>Let's make a movement to help another people.</span>
        </div>

        <div class="col-lg-2" style="padding-top: 35px;">

        </div>
    </div>
@endsection

@section('content')


    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">

                @if($request)
                    <form action="{{ route('admin.campaign.save') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @else
                            <form action="{{ route('admin.campaign.update', [$campaign->id, $campaign->slug]) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @endif
                {{ csrf_field() }}


                <div class="tabs-container">

                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"> Basic </a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">Campaign Details</a></li>
                        </ul>
                    </div>

                    <div class="tab-content col-lg-12">
                        <div id="tab-1" class="tab-pane active">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="row" style="padding-top: 15px;">
                                        <div class="col-md-9">
                                            <div class="form-group form-group-sm {{ $errors->has('campaign_image') ? 'has-error' : '' }}">
                                                <label class="col-sm-3 control-label"
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
                                                <label class="col-sm-3 control-label"
                                                for="campaign_title">Campaign title</label>

                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                           placeholder="Your campaign title"
                                                           id="campaign_title"
                                                           name="campaign_title"
                                                           value="{{ ($request) ?  old('campaign_title') : $campaign->title }}">

                                                    <p style="padding-top: 8px;">
                                                        These words will help people find your project, so
                                                        choose them wisely! Your name will be searchable too.
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm {{ $errors->has('campaign_short_blurb') ? 'has-error' : '' }}">
                                                <label class="col-sm-3 control-label"
                                                for="short_blurb">Short blurb</label>

                                                <div class="col-sm-9">
                                                    <textarea name="campaign_short_blurb"
                                                              placeholder="Short description"
                                                              id="short_blurb"
                                                              class="form-control"
                                                              rows="3">{{ ($request) ?  old('campaign_short_blurb') : $campaign->blurb }}</textarea>

                                                    <p style="padding-top: 8px;">
                                                        Give people a sense of what you’re doing. Skip
                                                        “Help me” and focus on what you’re making.
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm {{ $errors->has('campaign_location') ? 'has-error' : '' }}">
                                                <label class="col-sm-3 control-label" for="campaign_location">
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
                                                               value="{{ ($request) ?  old('campaign_location') : $campaign->location }}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm {{ $errors->has('campaign_duration') ? 'has-error' : '' }}">
                                                <label class="col-sm-3 control-label">Campaign duration</label>
                                                <div class="col-sm-9">
                                                    <div class="form-inline">
                                                        <label for="number_of_days" style="margin-right: 10px;">
                                                            Number Of day
                                                        </label>
                                                        <input id="number_of_days"
                                                               type="text"
                                                               name="campaign_duration"
                                                               placeholder="Up to 60 Days"
                                                               value="{{ ($request) ?  old('campaign_duration') : '' }}"
                                                               class="form-control">

                                                    </div>
                                                    <span>
                                                        Your last duration will end at
                                                        <strong>
                                                            {{ ($request) ?  '' : $campaign->duration }}
                                                        </strong>

                                                    </span>
                                                    <p style="padding-top: 5px;">
                                                        Projects with shorter durations have higher success rates.
                                                        You won’t be able to adjust your duration after you launch
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm {{ $errors->has('campaign_funding_goal') ? 'has-error' : '' }}">
                                                <label class="col-sm-3 control-label" for="campaign_funding_goal">
                                                    Funding goal
                                                </label>
                                                <div class="col-sm-9">
                                                    <div class="input-group m-b">
                                                        <span class="input-group-addon">Rp.</span>
                                                        <input type="text"
                                                               id="campaign_funding_goal"
                                                               name="campaign_funding_goal"
                                                               placeholder="Funding goal"
                                                               value="{{ ($request) ?  old('campaign_funding_goal') : $campaign->funding_goal }}"
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

                                                <div class="radio">
                                                    <label for="statusDefault">
                                                        <input type="radio" name="_status" value="default"
                                                               id="statusDefault"
                                                                @if(!Request::is("internal/campaigns/new"))
                                                                    {{ ($campaign->status == 1 ) ? 'checked' : ''  }}
                                                                        @endif/>
                                                         Default
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="statusFeatured">
                                                        <input type="radio" name="_status" value="featured"
                                                               id="statusFeatured"
                                                        @if(!Request::is("internal/campaigns/new"))
                                                                {{ ($campaign->status == 3 ) ? 'checked' : ''  }}
                                                                @endif/>
                                                        Featured
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="tab-2" class="tab-pane">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="row" style="padding-top: 15px;">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-sm {{ $errors->has('campaign_video') ? 'has-error' : '' }}">
                                                <label class="col-sm-2 control-label" for="campaign_video">
                                                    Campaign video
                                                </label>
                                                <div class="col-sm-5">
                                                    <input type="file"
                                                           class="form-control"
                                                           id="campaign_video"
                                                           name="campaign_video"
                                                           value="{{ ($request) ?  old('campaign_video') : $campaign->video }}">

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
                                                              class="summernote form-control">
                                                        {{ ($request) ?  old('campaign_description') : $campaign->description }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <label class="col-sm-2 control-label"></label>
                                                <div class="col-sm-9">

                                                    <button class="btn btn-success" type="submit">
                                                        Submit Campaign
                                                    </button>
                                                    @if(!$request)
                                                        {{ method_field('PUT') }}
                                                    @endif
                                                    <a href="{{ route('admin.campaign.list') }}" class="btn btn-link">
                                                        Cancel
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection

@push('scripts')
    <script src="{{ asset('js/plugins/summernote/summernote.min.js') }}"></script>
@endpush
