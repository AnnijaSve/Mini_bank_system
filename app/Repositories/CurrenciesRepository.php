<?php

namespace App\Repositories;

use App\Models\Account;

interface CurrenciesRepository
{
    public function getBySymbol(Account $account): string;
}
