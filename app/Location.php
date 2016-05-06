<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $timestamps = false;
    
    /**
     * Get all of the items for the location.
     */
    public function items() {
    	return $this->hasMany(Item::class);
    }
}