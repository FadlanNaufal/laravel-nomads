<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id','users_id','additional_visa','transaction_total','transaction_status'
    ];

    public function details(){
        return $this->hasMany('App\TransactionDetails','transactions_id','id');
    }

    public function tp(){
        return $this->belongsTo('App\TravelPackages','travel_packages_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','users_id','id');
    }
}
