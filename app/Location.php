<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * Get all of the Items for the Location.
     */
    public function items() 
    {
    	return $this->hasMany(Item::class);
    }

    /**
     * Get a Location's parent Location
     */
    public function parent() 
    {
    	return $this->hasOne(Location::class);
    }
}