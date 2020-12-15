@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-gray-300 p-6 rounded-lg">
            @if (session('status'))
                <div class="p-4 mb-6 text-black text-2xl text-center">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('secure') }}" method="post">
                @csrf

                <div class="mb-4">
                    Secret key
                    <label for="secret_key" class="sr-only">Secret key</label>
                    <input type="text" name="secret_key" id="secret_key" placeholder="Secret key"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('secret_key') border-red-500 @enderror">
                    @error('secret_key')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    Password
                    <label for="password" class="sr-only">Password again</label>
                    <input type="password" name="password" id="password" placeholder="Re-enter Your password"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div>
                    <button type="submit" class="bg-teal-600 text-white px-4 py-3 rounded font-medium w-full">Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
