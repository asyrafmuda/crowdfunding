@extends('layouts.app')

@inject('donation', App\Donation)

@section('content-app')

    <div class="container">
        <div class="row m-b-lg m-t-lg">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="m-t-xs text-center">
                            <div>
                                <h1 class="no-margins campaign-title">
                                    {{ $campaign->title }}
                                </h1>
                                <h3 class="campaign-blurb" class="m-t">{{ $campaign->blurb }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div style="background: #fff;min-height: 500px; 0;" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2>Support This Campaign</h2>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('donation.payment', [$campaign->id, $campaign->slug]) }}"
                                method="post">
                                {{ csrf_field() }}

                                <div class="form-group {{ $errors->has('donation') ? 'has-error' : '' }}">
                                    <label for="donation">Donation Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Rp.
                                        </span>
                                        <input type="text"
                                               name="donation"
                                               id="donation"
                                               autofocus
                                               class="form-control">
                                    </div>

                                    @if($errors->has('donation'))
                                        <p class="help-block">
                                            {{ $errors->first('donation') }}
                                        </p>
                                    @endif
                                    <p class="donation-help">
                                        Minimum donation amount is Rp. 20.000
                                    </p>
                                </div>

                                <input type="hidden" value="{{ $campaign->id }}" name="_campaign">
                                <button type="submit" class="btn btn-primary">
                                    Continue
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                    <div>
                        <h3 class="m-t-lg m-b-xs">Kickstarter is not a store.</h3>
                        <p>
                            Kickstarter does not guarantee projects or investigate a creator's ability to complete
                            their project. It is the responsibility of the project creator to complete their
                            project as promised, and the claims of this project are theirs alone.
                        </p>
                    </div>

                   <div>
                       <h3 class="m-t-lg m-b-xs"></h3>
                       <p class="">
                           You will support this campaign
                       </p>
                   </div>

                    <div>
                        <div class="" style="margin-bottom: 50px;">
                            <div class="section">
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
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection