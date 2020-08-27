<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id',
        'image'
    ];

    protected $hidden = [];

    // relasi antara gellery dengan travelPackages(model)
    public function travel_package()
    {
        return $this->belongsTo(travelPackages::class, 'travel_packages_id', 'id');
    }
}
