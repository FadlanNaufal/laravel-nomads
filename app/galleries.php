<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class galleries extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id','image'
    ];

    public function travel_packages(){
        return $this->belongsTo('App\TravelPackages','travel_packages_id','id');
    }
}
