@extends('layouts.app')

{{--@inject('donation', App\Donation)--}}




@section('content-app')

    @include('partials.app.user_heading')



    <div class="wrapper-fluid no-margins" style="border: none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    @if($donations->isEmpty())
                        <div class="col-lg-12">Your don't have any donation</div>
                    @endif


                        @foreach($donations as $donation)
                            <div class="col-lg-4 section">
                                <div class="ibox-content">

                                    <div class="campaign-grid-img">
                                        <img src="{{ asset('storage/' . $donation->campaign->thumbnail ) }}" class="img-responsive">
                                    </div>
                                    <div class="campaign-grid-content">
                                        <p class="campaign-grid-category">Pengobatan</p>
                                        <p class="campaign-grid-title">
                                            <a href="{{ route('campaign.detail', [$donation->campaign->id, $donation->campaign->slug]) }}">{{ $donation->campaign->title }}</a>: <span class="campaign-grid-blurb">{{ $donation->campaign->blurb }}</span>
                                        </p>
                                        <div class="campaign-grid-user">
                                            <img src="{{ asset('storage/' . $donation->campaign->user->picture) }}" alt="" height="25px" width="25px;" class="img-circle">
                                            <span class="text-muted">By</span>
                                            {{ $donation->campaign->user->name }}
                                        </div>
                                    </div>
                                    <div class="campaign-grid-footer">
                                        <div class="campaign-grid-location">
                                            <a href="#"><i class="fa fa-map-marker"></i> {{ $donation->campaign->location }}</a>
                                        </div>
                                        <div class="campaign-grid-progress progress">
                                            <div class="progress-bar progress-bar-primary" role="progressbar"
                                                 aria-valuenow="{{  $donation->getDonationAmount($donation->campaign->id, $donation->campaign->funding_goal) }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" style="width: {{  $donation->getDonationAmount($donation->campaign->id, $donation->campaign->funding_goal)  }}%">
                                                <span class="sr-only">{{  $donation->getDonationAmount($donation->campaign->id, $donation->campaign->funding_goal)  }}% Complete (success)</span>
                                            </div>
                                        </div>
                                        <div class="campaign-grid-status">
                                            <ul class="nav nav-justified">
                                                <li>
                                                    <div class="stats-count">
                                                        <strong>
                                                            Rp. {{ str_replace(',','.', number_format($donation->amount)) }}
                                                        </strong>
                                                    </div>
                                                    <span class="stats-title">Your Donation</span>
                                                </li>
                                                <li>
                                                    <div class="stats-count">
                                                        <strong>Success</strong>
                                                    </div>
                                                    <span class="stats-title">Status</span>
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
@endsection
