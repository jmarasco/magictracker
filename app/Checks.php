<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    /**
     * Get the user for the check through check_user.
     */
    public function users() {
    	return $this->belongsToMany(User::class);
    }

    /**
     * Get the item for the check through check_item.
     */
    public function items() {
    	return $this->belongsToMany(Item::class);
    }
}
