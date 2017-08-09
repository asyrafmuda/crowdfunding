@extends('layouts.app')

@section('content-app')
<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-6">
            <h2 class="font-bold">Welcome to IN+</h2>
            <p>
                Perfectly designed and precisely prepared admin theme with
                over 50 pages with extra new web app views.
            </p>
            <p>
                Lorem Ipsum is simply dummy text of the printing and t
                ypesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s.
            </p>
            <p>
                When an unknown printer took a galley of type and scrambled it
                to make a type specimen book.
            </p>
            <p>
                <small>
                    It has survived not only five centuries, but also
                    the leap into electronic typesetting, remaining
                    essentially unchanged.
                </small>
            </p>
        </div>

        <div class="col-md-6">
            <div class="ibox-title">
                <h5>Already Have Account</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal"
                        role="form"
                        method="POST"
                        action="{{ route('login') }}">

                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="email"
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Your Email"
                                    required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>
                                        {{ $errors->first('email') }}
                                    </strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group  {{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="password"
                                    type="password"
                                    class="form-control"
                                    placeholder="Password"
                                    name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>
                                        {{ $errors->first('password') }}
                                    </strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit"
                                    class="btn btn-primary block full-width m-b">
                                Login
                            </button>

                            <a class="" href="{{ route('password.request') }}">
                                <small>Forgot Your Password?</small>
                            </a>

                            <p class="text-muted text-center">
                                <small>Do not have an account?</small>
                            </p>
                            <a class="btn btn-sm btn-white btn-block"
                                href="{{ route('register') }}">
                                Create an account</a>
                        </div>
                    </div>
                </form>
                <p class="m-t">
                    <small>All rights reserved hoopie.asia &copy; {{ date('Y') }}</small>
                </p>
            </div>
        </div>



    </div>

    <hr/>
    <div class="row">
        <div class="col-md-6">
            Hoopie.asia
        </div>
        <div class="col-md-6 text-right">
           <small>© {{ date('Y') }}</small>
        </div>
    </div>
</div>
@endsection
