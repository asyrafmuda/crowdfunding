@inject('donation', App\Donation)
@inject('campaign', App\Campaign)


<div class="container">
    <div class="row m-b-lg m-t-lg">
        <div class="col-md-7">

            <div class="profile-image">
                <img src="{{ asset('storage/' . $user->picture) }}" class="img-circle circle-border m-b-md" alt="profile">
            </div>
            <div class="profile-info">
                <div class="">
                    <div>
                        <h2 class="no-margins">
                            {{ ucwords($user->name) }}
                        </h2>
                        <h4>{{ $user->job_title }}</h4>
                        <small>
                            {{ $user->bio }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <table class="table small m-b-xs">
                <tbody>
                <tr>
                    <td>
                        <strong>{{ count($donation->getUserDonation($user->id)) }}</strong> Donation
                    </td>
                    <td>
                        <strong>{{ count($campaign->getUserCampaign($user->id)) }}</strong> Campaign
                    </td>

                </tr>
                <tr>
                    <td>
                        <strong>61</strong> Donated
                    </td>
                    <td>
                        <strong>Not Verified</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Data Joined</strong>
                    </td>
                    <td>
                        {{ date('d F Y', strtotime(Auth::user()->created_at)) }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-2">
            <small><strong>Your Belance</strong></small>
            <h2 class="no-margins">123.206.480 IDR</h2>
            <div id="sparkline1"></div>
        </div>
    </div>
</div>

<div style="background: #fff; border: 1px solid transparent; border-top-color: #e9e9e9; border-bottom-color: #e9e9e9;">
    <div class="container">
        <nav class="navbar">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Campaigns</a></li>
                <li><a href="#">Timeline</a></li>
                <li class="{{ Request::is('user/campaign/donated') ? 'active' : '' }}"><a href={{ route('user.campaign.donated') }}>Donated</a></li>
                <li class="{{ Request::is('user/account/settings') ? 'active' : '' }}"><a href="{{ route('user.setting') }}">Your Account</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Request Withdraw</a></li>
            </ul>
        </nav>
    </div>
</div>