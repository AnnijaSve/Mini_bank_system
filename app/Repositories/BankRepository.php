<?php

namespace App\Repositories;


use App\Models\Account;

class BankRepository implements CurrenciesRepository
{

    public function getBySymbol(Account $account): string
    {
        $input = file_get_contents('https://www.bank.lv/vk/ecb.xml');

        $service = new \Sabre\Xml\Service();

        $service->elementMap = [
            '{https://www.bank.lv/vk/ecb.xml}Currency' => 'Sabre\Xml\Element\KeyValue',
        ];

        $result = $service->parse($input);

        foreach ($result[1]['value'] as $item) {
            $name = $item['value'][0]['value'];
            $value = $item['value'][1]['value'];

            if ($name == $account->currency) {
                $currencyValue = $value;
            } elseif ($account->currency == "EUR") {
                $currencyValue = 1;
            }
        }

        return $currencyValue;
    }

}
