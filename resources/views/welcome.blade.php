@extends('layouts.landing')

@section('content-landing')

    @include('partials.landing.top-navigation')

    <header id="bannerHero" class="hero">
        <div class="hero-container">
            <h1 class="hero-title">HELP BETTER. FASTER. TOGETHER.</h1>
            <h2 class="hero-subtitle">The indonesia's leading crowd funding, donation & helper platform</h2>
            <div class="action m-t-xl">
                <a href="#" class="btn btn-sm btn-primary">Make Donation</a>
                <a href="#" class="btn btn-sm btn-link">Start Funding</a>
            </div>
        </div>
    </header>


    <section id="campaign-featured" class="container m-t-lg">
        <div class="row">
            @include('partials.landing.campaigns-featured')
        </div>
    </section>

    <section id="campaign-newest" class="container" style="padding-bottom: 80px;">
        <div class="row">
            @include('partials.landing.campaigns-newset')
        </div>
    </section>


    <section class="bg-violet-light">
        <div class="container">
            <div class="row text-center py3 px3">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1 class="mb3">Where campaign come from</h1>
                    <div class="type-16 mb3 mt3">Each and every Kickstarter project is the independent creation of someone like you.
                        Want to know more about how projects happen, or start your own?</div>
                    <a href="#" class="btn btn-primary">Start Campaign</a>
                </div>
            </div>
        </div>
    </section>
    @include('partials.app_footer')
@endsection