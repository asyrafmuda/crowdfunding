<div class="navbar-wrapper">
    <nav class="navbar navbar-default {{ Request::is('/') ? 'navbar-fixed-top' : 'navbar-fixed-top navbar-scroll' }}" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">HOOPIE.ASIA</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="{{ Request::is('explore') ? 'active' : '' }}"><a class="page-scroll" href="{{ url('explore') }}">Explore</a></li>
                    <li class="{{ Request::is('youraction') ? 'active' : '' }}"><a class="page-scroll" href="{{ url('campaign/new') }}">Campaign</a></li>
                    <li class="{{ Request::is('foryou') ? 'active' : '' }}"><a class="page-scroll" href="{{ url('foryou') }}">For Bussines</a></li>
                @if(Auth::user())
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
                    @else
                        <li class="{{ Request::is('login') ? 'active' : '' }}"><a class="page-scroll" href="{{ url('login') }}">Login</a></li>
                        <li class="{{ Request::is('register') ? 'active' : '' }}"><a class="page-scroll" href="{{ url('register') }}">Sign Up</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>