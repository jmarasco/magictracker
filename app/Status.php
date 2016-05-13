<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'status';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * Get all the items for the status.
     */
    public function items() {
    	return $this->hasMany(Item::class);
    }
}
