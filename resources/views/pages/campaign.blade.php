@extends('layouts.app')
@inject('donation', 'App\Donation')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p>
                    <img src="{{ asset('storage/' . $campaign->cover) }}" alt="{{ $campaign->title }}" width="100%">
                </p>
                <h3>{{ $campaign->title }}</h3>
                <p>
                    {{ $campaign->blurb }}
                </p>
                <p>
                    <b>By</b> {{ $campaign->user->name }}
                </p>

                <p>
                    {{ $campaign->description }}
                </p>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>information</b>
                    </div>
                    <div class="panel-body">
                        <b>Goal</b> Rp. {{ $campaign->funding_goal }} <br>
                        <b>Pledge</b> {{ $donation->getDonationAmount($campaign->id) }}
                    </div>
                </div>

                <a href="{{ route('donation.add', [$campaign->id, $campaign->slug]) }}" class="btn btn-success btn-block">Make Donation</a>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Donation List</b>
                    </div>
                    <div class="panel-body">
                        @foreach($donations as $donation)
                           @if($donation->status == 2)
                                Name : {{ ($donation->user_id > 0) ? $donation->user->name : $donation->name }} <br/>
                                Amount: Rp. {{ $donation->amount }}
                                <hr/>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
