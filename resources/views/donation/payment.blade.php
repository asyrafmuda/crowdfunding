@extends('layouts.app')

@push('styles-app')
    <style>
        .campaign_list-progress.progress {
            height: 4px;
            margin-bottom: 20px;
        }
        .progress {
            overflow: hidden;
            height: 22px;
            margin-bottom: 22px;
            background-color: #f5f5f5;
            border-radius: 4px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1) !important;
        }
        .radio.radio-inline {
            min-width: 118px;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/plugins/iCheck/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}">
@endpush

@push('scripts-app')
    <script src="{{ asset('js/plugins/iCheck/iCheck.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
@endpush

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
                                <h3  class="campaign-blurb">{{ $campaign->blurb }}</h3>
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
                <div class="panel m-t-lg">
                    <div class="panel-heading">
                        <h3 class="no-margins">Payment Information</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            Your payment method will not be charged at this time.
                            If the project is successfully funded, your payment method will be
                            charged <strong>Rp. {{ str_replace(',', '.', number_format($data->donation)) }}</strong> when the project ends.
                        </p>

                    </div>
                </div>

                <form action="{{ route('donation.store') }}"  method="post">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="no-margins">Payment Method <small><i class="fa fa-lock"></i> Secure</small></h3>
                    </div>

                    <div class="panel-body">
                        @if(Auth::guest())
                            <p> You are visit as Guest, Please add your name and your email address and then select
                                a payment method.
                            </p>
                            <div class="form-group">
                                <label for="name">
                                    Your Name
                                </label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <label for="name">
                                    Your Email
                                </label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email Address">
                            </div>
                        @endif
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        <a style="display: block;" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            Bank Transfer</a>
                                        <div class="pull-right">
                                            @foreach($banks as $bank)
                                                {{--<img height="20px" src="{{ asset('storage/' . $bank->picture ) }}" alt="">--}}
                                            @endforeach
                                        </div>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        {{ csrf_field() }}


                                        <div class="form-group m-t-md m-b-md">
                                        @foreach($banks as $bank)

                                                <div class="radio radio-success radio-inline">
                                                    <input type="radio" name="bank" id="bank{{ $bank->short_name }}" value="{{ $bank->id }}" class="">
                                                    <label for="bank{{ $bank->short_name }}">
                                                        <div><img src="{{ asset('storage/' . $bank->picture) }}" alt="" height="20px;"></div>
                                                        <div class="text-muted m-t-xs">
                                                            <small>{{ $bank->bank_name }}</small>
                                                        </div>
                                                    </label>
                                                </div>

                                        @endforeach
                                        </div>

                                            <input type="hidden" name="_amount" value="{{ $data->donation }}">
                                            <input type="hidden" name="_campaign" value="{{ $campaign->id }}">
                                            <input type="hidden" name="_slug" value="{{ $campaign->slug }}">

                                    </div>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Donate Now
                        </button>
                    </div>

                </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="panel">
                        <div class="panel-heading" style="padding-bottom: 5px;">
                            <h4 class="m-t-lg m-b-none" style="font-weight: normal;">Your Donation Amount.</h4>
                        </div>
                        <div class="panel-body" style="padding-top: 0">
                            <h2 class="no-margins">Rp. {{ str_replace(',', '.', number_format($data->donation)) }}
                                <a href="{{ route('donation.new', [$campaign->id, $campaign->slug]) }}"><small style="font-size: 13px;">Edit</small></a>
                            </h2>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h3 class="m-t-n m-b-xs">Kickstarter is not a store.</h3>
                        <p class="" >
                            Kickstarter does not guarantee projects or investigate a creator's ability to complete
                            their project. It is the responsibility of the project creator to complete their
                            project as promised, and the claims of this project are theirs alone.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection