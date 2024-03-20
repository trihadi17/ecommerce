<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    // digunakan keytype, karna default id dan primarykey itu int, jadi harus di inisialiasikan tipe datanya
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'users_id',
        'shipping_price',
        'total_price',
        'transaction_status',
        'bank',
        'va_number',
        'bill_key',
        'biller_code',
        'expire_time'
    ];

    public function user(){
        return $this->belongsTo(User::class,'users_id','id');
    }

    public function transactionDetail(){
        return $this->hasMany(TransactionDetail::class, 'transactions_id','id');
    }
}
