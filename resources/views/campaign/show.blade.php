@extends('layouts.app')

@inject('donation', 'App\Donation')

@section('content-app')
    <div class="single-campaign-wrapper">

        <div class="container-fluid single-campaign-header">
                <div class="row m-b-lg m-t-lg">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="profile-image">
                                    <img src="{{ asset('storage/' . $campaign->user->picture) }}" alt="" class="img-circle">
                                    <div class="profile-username">
                                        <span class="text-muted">by</span> {{ $campaign->user->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="m-t-xs">
                                    <h1 class="no-margins">
                                        {{ $campaign->title }}
                                    </h1>
                                    <h3 class="m-t">{{ $campaign->blurb }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 m-t-lg">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="{{ asset('storage/' . $campaign->thumbnail) }}" alt="" class="img-responsive">
                                <div class="campaign-info">
                                    <div class="campaign-grid-location">
                                        <a href="#">
                                            <div class="inline-flex mr1 justify-center">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            {{ $campaign->location }}
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="campaign-grid-progress progress">
                                    <div class="progress-bar progress-bar-primary" role="progressbar"
                                         aria-valuenow="{{  $donation->getDonationAmount($campaign->id, $campaign->funding_goal) }}"
                                         aria-valuemin="0"
                                         aria-valuemax="100" style="width: {{  $donation->getDonationAmount($campaign->id, $campaign->funding_goal)  }}%">
                                        <span class="sr-only">{{  $donation->getDonationAmount($campaign->id, $campaign->funding_goal)  }}% Complete (success)</span>
                                    </div>
                                </div>
                                <div class="campaign-single-stats m-b-sm">
                                    <h1 class="text-primary m-b-xs m-t-sm">
                                        Rp. {{ str_replace(',', '.', number_format($donation->getDonated($campaign->id))) }}
                                    </h1>
                                    <p class="text-muted">Donation of Rp. <strong>{{ number_format($campaign->funding_goal) }}</strong> goal.</p>
                                </div>
                                <div class="campaign-single-stats small m-b-sm">
                                    <h1 class="m-b-xs m-t-sm">
                                        {{ $donation->getDonationAmount($campaign->id, $campaign->funding_goal)   }} %
                                    </h1>
                                    <p class="text-muted">Funded</p>
                                </div>
                                <div class="campaign-single-stats small">
                                    <h1 class="m-b-xs m-t-sm">
                                        {{ $donation->getDonors($campaign->id) }}
                                    </h1>
                                    <p class="text-muted">Donators</p>
                                </div>
                                <div class="campaign-single-stats small m-b-lg">
                                    <h1 class="m-b-xs m-t-sm">
                                        {{ \Carbon\Carbon::parse($campaign->duration)->diffInDays() }}
                                    </h1>
                                    <p class="text-muted">Days to go</p>
                                </div>
                                <div class="campaign-single-action">
                                    <div class="campaign-single-donation">
                                        <a href="{{ route('donation.new', [$campaign->id, $campaign->slug]) }}" class="btn btn-lg btn-primary btn-block">Donated Now</a>
                                    </div>
                                    <p>This campaign is suspicious? <a href="#">Report This Campaign</a></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <div class="wrapper-fluid">

            <div class="single-campaign-content">
                <div class="tab-container">

                    <div class="single-campaign-nav">
                        <div class="container">
                            <nav class="navbar">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab-detail" data-toggle="tab">Campaign</a>
                                    </li>
                                    <li>
                                        <a href="#tab-update" data-toggle="tab">Updates</a>
                                    </li>
                                    <li>
                                        <a href="#tab-donation" data-toggle="tab">Donation</a>
                                    </li>
                                    <li>
                                        <a href="#tab-comments" data-toggle="tab">Comments</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-detail">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h2 class="title-campaign-description">About Campaign</h2>
                                                <div class="campaign-description">
                                                    {!! $campaign->description !!}
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="campaign-side-panel">
                                                    <h2 class="title-side-panel">Campaign Update</h2>
                                                    <div class="feed-activity-list">
                                                        <div class="feed-element">
                                                            <div class="media-body ">

                                                                <strong>Lorem Ipsum is simply dummy text of the printing typesetting</strong><br>
                                                                <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                                <div class="well">
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                                    Over the years.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="feed-element">
                                                            <div class="media-body ">

                                                                <strong>Lorem Ipsum is simply dummy text</strong><br>
                                                                <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                                <div class="well">
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                                    Over the years.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="feed-element">
                                                            <div class="media-body ">

                                                                <strong> Lorem Ipsum is simply dummy text of the</strong><br>
                                                                <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                                <div class="well">
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                                    Over the years.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="campaign-side-panel">
                                                    <h2 class="title-side-panel">Donators</h2>
                                                    <div class="feed-activity-list">
                                                        <div class="feed-element">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="{{ asset('img/a2.jpg') }}">
                                                            </a>
                                                            <div class="media-body ">
                                                                <small class="pull-right">2h ago</small>
                                                                <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                                <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                                <div class="well">
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                                    Over the years.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="feed-element">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="{{ asset('img/a6.jpg') }}">
                                                            </a>
                                                            <div class="media-body ">
                                                                <small class="pull-right">2h ago</small>
                                                                <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                                <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                                <div class="well">
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="feed-element">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="{{ asset('img/a7.jpg') }}">
                                                            </a>
                                                            <div class="media-body ">
                                                                <small class="pull-right">2h ago</small>
                                                                <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                                <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                                <div class="well">
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-update">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2 class="title-campaign-description">Updates from this campaign</h2>
                                        <div class="feed-activity-list">
                                            <div class="feed-element">
                                                <div class="media-body ">

                                                    <strong>Lorem Ipsum is simply dummy text of the printing typesetting</strong><br>
                                                    <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                        Over the years.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <div class="media-body ">

                                                    <strong>Lorem Ipsum is simply dummy text</strong><br>
                                                    <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                        Over the years.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <div class="media-body ">

                                                    <strong> Lorem Ipsum is simply dummy text of the</strong><br>
                                                    <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                        Over the years.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="campaign-side-panel row section">
                                            <div class="ibox2-content" style="position: relative; height: 250px;">
                                                <div class="campaign-grid-content">
                                                    <p class="campaign-grid-title">
                                                        <a href="{{ route('campaign.detail', [$campaign->id, $campaign->slug]) }}">{{ $campaign->title }}</a>: <span class="campaign-grid-blurb">{{ $campaign->blurb }}</span>
                                                    </p>
                                                </div>
                                                <div class="campaign-grid-footer">
                                                    <div class="campaign-grid-location">
                                                        <a href="#"><i class="fa fa-map-marker"></i> {{ $campaign->location }}</a>
                                                    </div>
                                                    <div class="campaign-grid-progress progress">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar"
                                                             aria-valuenow="{{  $donation->getDonationAmount($campaign->id, $campaign->funding_goal) }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100" style="width: {{  $donation->getDonationAmount($campaign->id, $campaign->funding_goal)  }}%">
                                                            <span class="sr-only">{{  $donation->getDonationAmount($campaign->id, $campaign->funding_goal)  }}% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                    <div class="campaign-grid-status">
                                                        <ul class="nav nav-justified">
                                                            <li>
                                                                <div class="stats-count">
                                                                    <strong>
                                                                        {{  $donation->getDonationAmount($campaign->id, $campaign->funding_goal)}} %
                                                                    </strong>
                                                                </div>
                                                                <span class="stats-title">funded</span>
                                                            </li>
                                                            <li>
                                                                <div class="stats-count">
                                                                    <strong>
                                                                        Rp. {{ str_replace(',', '.', number_format($donation->getDonated($campaign->id))) }}
                                                                    </strong>
                                                                </div>
                                                                <span class="stats-title">pledged</span>
                                                            </li>
                                                            <li>
                                                                <div class="stats-count">
                                                                    <strong>
                                                                        {{ Carbon\Carbon::parse($campaign->duration)->diffInDays() }}
                                                                    </strong>
                                                                </div>
                                                                <span class="stats-title">days to go</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a href="#" class="btn btn-primary btn-sm btn-block" style="margin-top: 10px; padding: 5px;">Donate Now</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="campaign-side-panel">
                                            <h2 class="title-side-panel">Donators</h2>
                                            <div class="feed-activity-list">
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="{{ asset('img/a2.jpg') }}">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">2h ago</small>
                                                        <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                        <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                        <div class="well">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                            Over the years.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="{{ asset('img/a6.jpg') }}">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">2h ago</small>
                                                        <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                        <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                        <div class="well">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="{{ asset('img/a7.jpg') }}">
                                                    </a>
                                                    <div class="media-body ">
                                                        <small class="pull-right">2h ago</small>
                                                        <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                        <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                        <div class="well">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-donation">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2 class="title-campaign-description">Donors This Campaign</h2>
                                        <div class="feed-activity-list">
                                            <div class="feed-element">
                                                <a href="#" class="pull-left">
                                                    <img alt="image" class="img-circle" src="{{ asset('img/a2.jpg') }}">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="pull-right">2h ago</small>
                                                    <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                    <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                        Over the years.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <a href="#" class="pull-left">
                                                    <img alt="image" class="img-circle" src="{{ asset('img/a6.jpg') }}">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="pull-right">2h ago</small>
                                                    <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                    <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <a href="#" class="pull-left">
                                                    <img alt="image" class="img-circle" src="{{ asset('img/a7.jpg') }}">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="pull-right">2h ago</small>
                                                    <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                    <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <a href="#" class="pull-left">
                                                    <img alt="image" class="img-circle" src="{{ asset('img/a2.jpg') }}">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="pull-right">2h ago</small>
                                                    <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                    <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                        Over the years.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <a href="#" class="pull-left">
                                                    <img alt="image" class="img-circle" src="{{ asset('img/a6.jpg') }}">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="pull-right">2h ago</small>
                                                    <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                    <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <a href="#" class="pull-left">
                                                    <img alt="image" class="img-circle" src="{{ asset('img/a7.jpg') }}">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="pull-right">2h ago</small>
                                                    <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                    <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <a href="#" class="pull-left">
                                                    <img alt="image" class="img-circle" src="{{ asset('img/a2.jpg') }}">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="pull-right">2h ago</small>
                                                    <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                    <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                        Over the years.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <a href="#" class="pull-left">
                                                    <img alt="image" class="img-circle" src="{{ asset('img/a6.jpg') }}">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="pull-right">2h ago</small>
                                                    <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                    <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="feed-element">
                                                <a href="#" class="pull-left">
                                                    <img alt="image" class="img-circle" src="{{ asset('img/a7.jpg') }}">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="pull-right">2h ago</small>
                                                    <strong>Mark Johnson</strong> donated via <strong>BRI</strong><br>
                                                    <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                    <div class="well">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="campaign-side-panel row section">
                                            <div class="ibox2-content" style="position: relative; height: 250px;">
                                                <div class="campaign-grid-content">
                                                    <p class="campaign-grid-title">
                                                        <a href="{{ route('campaign.detail', [$campaign->id, $campaign->slug]) }}">{{ $campaign->title }}</a>: <span class="campaign-grid-blurb">{{ $campaign->blurb }}</span>
                                                    </p>
                                                </div>
                                                <div class="campaign-grid-footer">
                                                    <div class="campaign-grid-location">
                                                        <a href="#"><i class="fa fa-map-marker"></i> {{ $campaign->location }}</a>
                                                    </div>
                                                    <div class="campaign-grid-progress progress">
                                                        <div class="progress-bar progress-bar-primary" role="progressbar"
                                                             aria-valuenow="{{  $donation->getDonationAmount($campaign->id, $campaign->funding_goal) }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100" style="width: {{  $donation->getDonationAmount($campaign->id, $campaign->funding_goal)  }}%">
                                                            <span class="sr-only">{{  $donation->getDonationAmount($campaign->id, $campaign->funding_goal)  }}% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                    <div class="campaign-grid-status">
                                                        <ul class="nav nav-justified">
                                                            <li>
                                                                <div class="stats-count">
                                                                    <strong>
                                                                        {{  $donation->getDonationAmount($campaign->id, $campaign->funding_goal)}} %
                                                                    </strong>
                                                                </div>
                                                                <span class="stats-title">funded</span>
                                                            </li>
                                                            <li>
                                                                <div class="stats-count">
                                                                    <strong>
                                                                        Rp. {{ str_replace(',', '.', number_format($donation->getDonated($campaign->id))) }}
                                                                    </strong>
                                                                </div>
                                                                <span class="stats-title">pledged</span>
                                                            </li>
                                                            <li>
                                                                <div class="stats-count">
                                                                    <strong>
                                                                        {{ Carbon\Carbon::parse($campaign->duration)->diffInDays() }}
                                                                    </strong>
                                                                </div>
                                                                <span class="stats-title">days to go</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <a href="#" class="btn btn-primary btn-sm btn-block" style="margin-top: 10px; padding: 5px;">Donate Now</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="campaign-side-panel">
                                            <h2 class="title-side-panel">Campaign Update</h2>
                                            <div class="feed-activity-list">
                                                <div class="feed-element">
                                                    <div class="media-body ">

                                                        <strong>Lorem Ipsum is simply dummy text of the printing typesetting</strong><br>
                                                        <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                        <div class="well">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                            Over the years.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <div class="media-body ">

                                                        <strong>Lorem Ipsum is simply dummy text</strong><br>
                                                        <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                        <div class="well">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                            Over the years.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <div class="media-body ">

                                                        <strong> Lorem Ipsum is simply dummy text of the</strong><br>
                                                        <small class="text-muted">Donation <strong>Rp. 200.000</strong></small>
                                                        <div class="well">
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                            Over the years.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab-comments">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        Some comments for this campaign
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