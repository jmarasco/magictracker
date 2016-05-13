<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * Get all of the comments for the item.
     */
    public function comments() 
    {
    	return $this->hasMany(Comment::class);
    }

    /**
     * Get the status of the item.
     */
    public function status() 
    {
    	return $this->belongsTo(Status::class);
    }

    /**
     * Get the category of the item.
     */
    public function category() 
    {
    	return $this->belongsTo(Category::class);
    }

    /**
     * Get the location of the item.
     */
    public function location() 
    {
    	return $this->belongsTo(Location::class);
    }

    /**
     * Get the item's child item.
     */
    public function children() 
    {
        return $this->hasMany('App\Item', 'parent_id', 'id');
    }

    /**
     * Get the item's parent item.
     */
    public function parent() 
    {
        return $this->belongsTo('App\Item', 'parent_id');
    }

    /**
     * Get all of the checks for the item.
     */
    public function checks() 
    {
        return $this->hasMany(Check::class);
    }

    // $this->join('checks', 'items.id', '=', 'checks.item_id')
    //     ->join('users', 'checks.user_id', '=', 'users.id')
    //     ->where('users.id', '=', Auth::user()->id)
    //     ->get()

}
