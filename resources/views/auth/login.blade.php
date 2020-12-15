@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <h1 class="text-2xl m-6 flex items-center">
            Log in
        </h1>
    </div>
    <div class="flex justify-center">
        <nav class="w-4/12 bg-gray-400 flex justify-between mb-6">
            <li class="w-2/8 p-2 bg-teal-500 flex justify-center text-medium text-center">
                ① Email and password
            </li>
            <li class=" p-2 inline text-medium text-center">
                ➤
            </li>
            <li class="w-2/8 p-2 inline text-medium text-center">
                ② Secure key
            </li>
            <li class=" p-2 inline text-medium text-center">
                ➤
            </li>
            <li class="w-2/8 p-2 inline text-medium text-center">
                ③ Get started
            </li>
        </nav>
    </div>
    <div class="flex justify-center">
        <div class="w-4/12 bg-gray-300 p-6 rounded-lg">
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    Email
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email "
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                           value="{{ old('email') }}">
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    Password
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                           value="">
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-teal-600 text-white px-4 py-3 rounded font-medium w-full mb-4">Login
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection




