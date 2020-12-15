@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-10/12 bg-gray-400 text-center p-6 rounded-lg text-xl mb-12 ">
            Welcome, {{ $user->name }} !
        </div>
    </div>
    <div class="flex justify-center">
        <div class="w-7/12 p-6 bg-teal-600 text-white text-xl rounded-lg mb-10 text-center">
            Your accounts
        </div>
    </div>
    @foreach($user->accounts as $account)
        <div class="flex justify-center ">
            <div class="w-4/12 mb-4 bg-white text-left p-5 rounded-lg border-2">
                Balance for account {{ $account->number }} is {{ $account->currency}}: {{ $account->balance/100 }}
            </div>
            <div class=" p-2 py-5 ">
                <a href="{{ route('transaction.index', $account) }}"
                   class=" w-2/12 bg-gray-500 hover:bg-teal-500 text-white px-2 py-2 rounded font-medium w-full">
                    Make a transfer
                </a>
            </div>
            <div class=" p-2 py-5 ">
                <a href="{{ route('transaction.history', $account) }}"
                   class=" w-2/12 bg-gray-500 hover:bg-teal-500  text-white px-2 py-2 rounded font-medium w-full">
                    Account transactions
                </a>
            </div>
        </div>
    @endforeach
@endsection

