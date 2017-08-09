@extends('layouts.admin')
@section('content_admin_login')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">HP</h1>

            </div>
            <h3>Welcome to Administrator Login</h3>
            <p>Login in. To see it in action.</p>

            <form class="m-t" action="{{ route('admin.login.submit') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                    @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <div class="checkbox text-left">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>

            </form>
            <p class="m-t"> <small>Hoopie Tech Solution &copy; {{ date('Y') }}</small> </p>
        </div>
    </div>
@endsection
