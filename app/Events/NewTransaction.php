<?php

namespace App\Events;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewTransaction
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $request;
    private $account;
    private $receiverAccount;


    public function __construct(Request $request, Account $account, Account $receiverAccount)
    {
        $this->request = $request;
        $this->account = $account;
        $this->receiverAccount = $receiverAccount;
    }

    public function request(): Request
    {
        return $this->request;
    }

    public function account(): Account
    {
        return $this->account;
    }

    public function receiverAccount(): Account
    {
        return $this->receiverAccount;
    }
}
