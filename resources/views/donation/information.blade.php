@extends('layouts.app')

@section('content-app')

    <div class="container">
        <div class="row m-b-lg m-t-lg">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="m-t-xs text-center">
                            <div>
                                <h1 class="no-margins campaign-title">
                                    {{ $donation->campaign->title }}
                                </h1>
                                <h3 class="campaign-blurb m-t">{{ $donation->campaign->blurb }}</h3>
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
                            <h3 class="no-margins">Payment Instructions</h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                Your payment method will not be charged at this time.
                                If the project is successfully funded, your payment method will be
                                charged <strong>Rp. {{ str_replace(',', '.', number_format($donation->amount)) }}</strong> when the project ends.
                            </p>

                            <div class="col-md-12 m-t-lg">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <strong>Payment ID</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <div class="row">
                                            #0988726
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <span>Donation Campaign</span>
                                        </div>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <div class="row">
                                            0988726
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <span>Your Name</span>
                                        </div>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <div class="row">
                                            {{ $donation->name }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <span>Your Email</span>
                                        </div>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <div class="row">
                                            {{ $donation->email }}
                                        </div>
                                    </div>
                                </div>


                                <div class="row m-t-md text-center">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <h3>Transfer Amount</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <span>Your Donation Amount</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <div class="row">
                                            <span>Rp. {{ str_replace(',', '.', number_format($donation->amount)) }}</span>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <span>Admin Charge</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-right" style="border-bottom: 1px solid #ddd ">
                                        <div class="row">
                                            <span>Rp. {{ str_replace(',', '.', number_format(2500)) }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-t-sm">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <h3>Total Transfer</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <div class="row">
                                            <h3>Rp. {{ str_replace(',', '.', number_format(2500 + $donation->amount))  }}</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="">
                                        <p>
                                            Please make transfer to {{ $donation->bank->bank_name }}, before
                                            {{ date('d F Y ', strtotime($donation->end_donation)) }}
                                            and time {{ date('g:i:s A', strtotime($donation->end_donation)) }}
                                            , or your donation will canceled by system.
                                        </p>
                                    </div>
                                </div>

                                <div class="row m-t-lg">
                                    <div class="col-md-12">
                                        <div class="row m-b-sm">
                                            <h4>
                                                Transfer to {{ $donation->bank->bank_name }}
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="row">
                                                            Bank Name
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        {{ $donation->bank->bank_name }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="row">
                                                            <strong>Rekening Number</strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <strong>{{ $donation->bank->account_number }}</strong>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="row">
                                                            Account Name
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{ $donation->bank->account_name }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="row">
                                                            Branch
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        {{ $donation->bank->branch }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <img src="{{ asset('storage/' . $donation->bank->picture) }}" alt="" class="img-responsive">
                                            </div>
                                            <div class="col-md-11 m-t-xl">
                                                <div class="row">
                                                    <a href="{{ route('explore') }}" class="btn btn-primary btn-block">Donate Other Campaign</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="panel">
                            <div class="panel-heading" style="padding-bottom: 5px;">
                                <h4 class="m-t-lg m-b-none" style="font-weight: normal;">Your Transfer Amount.</h4>
                            </div>
                            <div class="panel-body" style="padding-top: 0">
                                <h2 class="no-margins">Rp. {{ str_replace(',', '.', number_format($donation->amount + 2500)) }}</h2>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h3 class="m-t-n m-b-xs">Kickstarter is not a store.</h3>
                            <p >
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