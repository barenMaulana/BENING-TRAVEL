<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class travelPackages extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'location',
        'slug',
        'about',
        'featured_event',
        'language', 'foods',
        'departure_date',
        'duration',
        'seat',
        'price',
    ];

    protected  $hidden = [];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'travel_packages_id', 'id');
    }
}
