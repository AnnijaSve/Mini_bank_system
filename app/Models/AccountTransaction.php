<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'receiver_account',
        'payers_account',
        'amount',
        'description',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class,'receiver_account', 'number');
    }



}
