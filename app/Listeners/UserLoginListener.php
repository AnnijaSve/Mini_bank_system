<?php

namespace App\Listeners;

use App\Events\UserLogin;
use App\Mail\UserSecretKey;
use Illuminate\Support\Facades\Mail;
use PragmaRX\Google2FA\Google2FA;

class UserLoginListener
{

    public function secureCode()
    {
        $google2fa = new Google2FA();

        return $google2fa->generateSecretKey();
    }

    public function handle(UserLogin $event)
    {
        $user = $event->user();

        $user->update([
            'secret_key' => $this->secureCode(),
        ]);

        Mail::to($user)->send(new UserSecretKey($user));
    }
}
