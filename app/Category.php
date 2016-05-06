<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	
    public $timestamps = false;
    
    /**
     * Get all items for the category.
     */
    public function items() {
    	return $this->hasMany(Item::class);
    }
}