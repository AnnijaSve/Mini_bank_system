<?php

namespace App\Http\Controllers;


class AccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        $user->load('accounts');

        return view('account', [
            'user' => $user
        ]);
    }
}
