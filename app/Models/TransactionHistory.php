<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    protected $fillable =[
        'transactions_id',
        'status',
        'payload'
    ];
}
