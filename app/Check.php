<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    /**
     * Get the user for the check.
     */
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    /**
     * Get the item for the check.
     */
    public function item() 
    {
    	return $this->belongsTo(Item::class);
    }
}