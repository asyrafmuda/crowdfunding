<div class="row border-bottom white-bg">
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <i class="fa fa-reorder"></i>
            </button>
            <a href="/" class="navbar-brand">Hoopie.asia</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('explore') ? 'active' : '' }}">
                    <a aria-expanded="false" role="button" href="{{ route('explore') }}">
                        <i class="fa fa-globe"></i> Explore
                    </a>
                </li>
                <li>
                    <a aria-expanded="false" role="button" href="#">
                        Product for Charity </a>
                </li>
                <li>
                    <a aria-expanded="false" role="button" href="#">
                        Event </a>
                </li>
                <li>
                    <a aria-expanded="false" role="button" href="{{ route('user.campaign.new') }}">
                        Start Action </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                @if(Auth::guest())

                    <li class="{{ Request::is('login') ? 'active' : '' }}">
                        <a aria-expanded="false" role="button" href="{{ route('login') }}">
                            Log In </a>
                    </li>
                    <li class="{{ Request::is('register') ? 'active' : '' }}">
                        <a aria-expanded="false" role="button" href="{{ route('register') }}">
                            Sign Up </a>
                    </li>

                @else
                    <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="{{ route('home') }}">Campaigns</a></li>
                            <li><a href="{{ route('user.setting') }}">Your Profile</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                @endif

            </ul>
        </div>
    </nav>
</div>