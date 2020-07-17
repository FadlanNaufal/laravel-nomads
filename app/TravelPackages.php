<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackages extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','slug','location','about','featured_event',
        'languages','foods','departure_date','duration','type','price'
    ];

    public function Gallery(){
        return $this->hasMany('App\galleries','travel_packages_id','id');
    }
}
