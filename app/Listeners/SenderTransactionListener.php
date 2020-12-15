<?php

namespace App\Listeners;

use App\Events\NewTransaction;
use App\Models\AccountTransaction;
use App\Repositories\CurrenciesRepository;

class SenderTransactionListener
{

    private $currenciesRepository;

    public function __construct(CurrenciesRepository $currenciesRepository)
    {
        $this->currenciesRepository = $currenciesRepository;
    }

    public function handle(NewTransaction $event)
    {
        $request = $event->request();

        $account = $event->account();

        $receiverAccount = $event->receiverAccount();

        $transaction = (new AccountTransaction())->fill([
            'account_id' => $account->id,
            'receiver_account' => $request->receiver_account,
            'payers_account' => $request->payers_account,
            'amount' => '-' . $request->amount * 100,
            'description' => $request->description,
        ]);

        $transaction->save();

        $account->update([
            'balance' => $account->balance - $request->amount * 100,
        ]);

        if ($account->currency != $receiverAccount->currency) {

            $senderCurrencyValue = $this->currenciesRepository->getBySymbol($account);

            $receiverCurrencyValue = $this->currenciesRepository->getBySymbol($receiverAccount);

            $transaction = (new AccountTransaction())->fill([
                'account_id' => $receiverAccount->id,
                'receiver_account' => $request->receiver_account,
                'payers_account' => $request->payers_account,
                'amount' => $request->amount / $senderCurrencyValue * $receiverCurrencyValue * 100,
                'description' => $request->description,
            ]);

            $transaction->save();

            $receiverAccount->update([
                'balance' =>
                    $receiverAccount->balance + $request->amount / $senderCurrencyValue * $receiverCurrencyValue * 100]);

        } elseif ($account->currency == $receiverAccount->currency) {

            $transfer = (new AccountTransaction())->fill([
                'account_id' => $receiverAccount->id,
                'receiver_account' => $request->receiver_account,
                'payers_account' => $request->payers_account,
                'amount' => $request->amount * 100,
                'description' => $request->description,

            ]);

            $transfer->save();

            $receiverAccount->update([
                'balance' => $receiverAccount->balance + $request->amount * 100]);

        }

    }
}
