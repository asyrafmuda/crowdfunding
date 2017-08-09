@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <img src="{{ asset('storage/' . $campaign->cover) }}" alt="{{ $campaign->title }}" width="100%">
                <h3>{{ $campaign->title }}</h3>
                <p>
                    <small>{{ $campaign->intro_text }}</small>  <br/>
                    <b> by</b> {{ $campaign->user->name }}
                </p>
                <br/>
                <p>
                    Pladge Goal <b>{{ $campaign->pledge_goal }}</b>
                </p>
                <p>
                   {{ $campaign->details }}
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <a href="{{ route('campaign.create', $campaign->user_id) }}" class="btn btn-default">Create New</a>
                    <a href="{{ route('campaign.edit', [$campaign->user_id, $campaign->id]) }}" class="btn btn-default">Edit</a>
                    <a href="{{ route('donation.add', [$campaign->user_id, $campaign->id]) }}" class="btn btn-danger">Donate</a>
                </p>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Total Rp. {{ $donation_amount }}</b>
                    </div>
                    <div class="panel-body">
                        <h4>Donator List</h4>
                        @foreach($donations as $donation)

                            Name : {{ ($donation->user_id > 0) ? $donation->user->name : $donation->name }} <br/>
                            Amount: Rp. {{ $donation->amount }}
                            <hr/>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection