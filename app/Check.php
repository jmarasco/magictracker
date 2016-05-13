<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    /**
     * Get the user for the check through check_user.
     */
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    /**
     * Get the item for the check through check_item.
     */
    public function item() 
    {
    	return $this->belongsTo(Item::class);
    }
}