<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TransactionDetails extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transactions_id','username','nationality','is_visa','doe_passport'
    ];

    public function transaction(){
        return $this->belongsTo('App\Transaction','transactions_id','id');
    }
}
