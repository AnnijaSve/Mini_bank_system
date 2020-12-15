<?php

namespace App\Http\Controllers\Transactions;

use App\Events\NewTransaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Account;


class TransactionsController extends Controller
{
    public function index(Account $account)
    {
        $rand = rand(1000, 9999);

        return view('transactions.index', [
            'account' => $account,
            'rand' => $rand

        ]);
    }

    public function store(TransactionRequest $request, Account $account)
    {

        if ($request->rand === $request->check && $account->balance / 100 >= $request->amount) {

            $receiverAccount = Account::where('number', $request->get('receiver_account'))->first();

            event(new NewTransaction($request, $account, $receiverAccount));

            return redirect()->route('account');

        } elseif ($account->balance / 100 < $request->amount) {

            return back()->with('status', 'Not enough money');

        } else {

            return back()->with('status', 'Invalid code');
        }
    }

    public function history(Account $account)
    {

        return view('transactions.history', [
                'account' => $account,
            ]
        );

    }
}
