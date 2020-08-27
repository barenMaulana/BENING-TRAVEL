<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class TransactionDetail extends Model
{
    use softDeletes;

    protected $fillable = [
        'transactions_id',
        'username',
        'is_visa',
        'doe_passport',
        'country'
    ];

    protected $hidden = [];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }
}
