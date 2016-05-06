<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	public $timestamps = false;
    
    protected $table = 'status';

    /**
     * Get all the items for the status.
     */
    public function items() {
    	return $this->hasMany(Item::class);
    }
}
