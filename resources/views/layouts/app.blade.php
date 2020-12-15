<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
<body class="bg-gray-200">
<nav class="p-4 bg-teal-600 flex justify-between">
</nav>
<nav class="bg-gray-500 flex justify-between mb-6">
    <ul class="p-8 flex items-center">
        @auth
            <li class="hover:text-teal-800">
                <a href="{{ route('account') }}" class="p-3">Account</a>
            </li>
        @endauth
    </ul>
    <li class="p-6 xl:p-8 bg-teal-500 flex justify-center text-2xl text-center">
        My€Bank
    </li>
    <li class="text-2xl m-6 flex items-center">
        Internet bank
    </li>
    <ul class="flex items-center p-8">
        @auth
            <li>
                <a href="{{ route('account') }}" class="p-3 hover:text-teal-800">{{ auth()->user()->name }}</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="post" class="p-3 inline hover:text-teal-800">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @endauth
    </ul>
</nav>
@yield('content')
</body>
</head>
</html>
