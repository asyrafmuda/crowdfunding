<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|min:6'
        ]);

        // Attempt to log user in
        $login = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember);

        if ($login)
        {
            // If successful, then redirect to intended location
            return redirect()->intended(route('admin.dashboard'));
        }

        $errors = ['email' => trans('auth.failed')];

        // If unsuccessful, redirect back with form data
        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors($errors);
    }
}
