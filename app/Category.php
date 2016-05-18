<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'categories';
	
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * Get all items for the category.
     */
    public function items() 
    {
    	return $this->hasMany(Item::class);
    }

    /**
     * Get Category by name
     * @param string $name
     * @return Builder
     */
    public static function findCategoryByName($name)
    {
    	return Category::where('name', '=', $name)->first();
    }
}