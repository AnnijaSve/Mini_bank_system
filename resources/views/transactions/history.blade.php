@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-teal-600 text-white text-center p-6 rounded-lg text-xl">
            Transactions history
        </div>
    </div>
    <div class="w-2/3 py-4 mx-auto">
        <div class="shadow overflow-hidden rounded border-b border-gray-200 ">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-500 text-white">
                <tr>
                    <th class="w-1/4 text-center py-3 px-4 uppercase font-semibold text-sm">Date</th>
                    <th class="w-1/4 text-center py-3 px-4 uppercase font-semibold text-sm">Account</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Description</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Amount</th>
                </tr>
                </thead>
                <tbody class="text-gray-700">
                @foreach($account->accountTransactions as $transaction )
                    <tr>
                        <td class="w-1/3 text-center py-3 px-4">{{ $transaction->created_at }}</td>
                        <td class="w-1/3 text-center py-3 px-4">
                            @if($transaction->amount < 0)
                                {{$transaction->receiver_account}}
                            @else
                                {{$transaction->payers_account}}
                            @endif
                        </td>
                        <td class="text-left py-3 px-4"><a
                                class="hover:text-blue-500"></a>{{ $transaction->description }}</td>
                        <td class="text-center py-3 px-4">
                            @if($transaction->amount < 0)
                                <a class="text-red-500">{{ $transaction->amount/100 }} {{$account->currency}}</a>
                            @else
                                <a class="text-green-500">{{ $transaction->amount/100 }} {{$account->currency}}</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
