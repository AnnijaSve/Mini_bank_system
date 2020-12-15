<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserLogin;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('index', 'store');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }

        /** @var User $user */
        $user = auth()->user();

        event(new UserLogin($user));

        Session::flush();

        return redirect()->route('secure')->with('status', 'We sent to Your email secret key !');

    }

    public function secure()
    {
        if (session('status')) {
            return view('auth.secure');
        }
        return redirect()->route('login');
    }

    public function storeSecure(Request $request)
    {

        if (!auth()->attempt($request->only('secret_key', 'password'), $request->remember)) {
            return redirect()->route('login')->with('status', 'Invalid details');
        }

        return redirect()->route('account');

    }
}
