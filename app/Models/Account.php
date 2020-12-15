<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'number',
        'balance',
        'currency'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function accountTransactions()
    {
        return $this->hasMany(AccountTransaction::class, 'account_id', 'id');
    }
}
