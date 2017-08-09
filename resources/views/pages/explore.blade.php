@extends('layouts.app')

{{-- Inject Donation Class Model --}}
@inject('donation', 'App\Donation')


@section('content-app')

    <div class="container">
        <div class="row m-b-lg m-t-lg">
            <div class="col-md-12">
                <div class="col-md-8 col-md-offset-2">
                    <div class="">
                        <div class="text-center">
                            <div>
                                <h2 class="no-margins">
                                    Explore All Campaigns.
                                </h2>
                                <h4>Let's Start make a movement</h4>
                                <small>
                                    There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form Ipsum available.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <dvi class="col-md-12 m-b m-t-sm">
                <div class="col-md-8 col-md-offset-2">

                </div>
            </dvi>
        </div>
    </div>


    <div class="wrapper-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <div class="row">
                       <div class="col-md-12 m-b-lg">
                           <h2 style="margin-bottom: 0;">Discover Campaigns</h2>
                           <div>There are many variations of passages of Lorem Ipsum a</div>
                       </div>
                   </div>
                    <div class="row">
                        @foreach($campaigns as $campaign)
                            <div class="col-lg-4 section">
                                <div class="ibox-content">

                                    <div class="campaign-grid-img">
                                        <img src="{{ asset('storage/' . $campaign->thumbnail ) }}" class="img-responsive">
                                    </div>
                                    <div class="campaign-grid-content">
                                        <p class="campaign-grid-category">Pengobatan</p>
                                        <p class="campaign-grid-title">
                                            <a href="{{ route('campaign.detail', [$campaign->id, $campaign->slug]) }}">{{ $campaign->title }}</a>: <span class="campaign-grid-blurb">{{ $campaign->blurb }}</span>
                                        </p>
                                        <div class="campaign-grid-user">
                                            <img src="{{ asset('storage/' . $campaign->user->picture) }}" alt="" height="25px" width="25px;" class="img-circle">
                                            <span class="text-muted">By</span>
                                            {{ $campaign->user->name }}
                                        </div>
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
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection
