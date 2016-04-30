<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function comments() {
    	return $this->belongsToMany(Comment::class);
    }

    public function status() {
    	return $this->belongsTo(Status::class);
    }

    public function category() {
    	return $this->belongsTo(Category::class);
    }

    public function location() {
    	return $this->belongsTo(Location::class);
    }

    public function children() {
        return $this->hasMany('App\Item', 'parent_id', 'id');
    }

    public function parent() {
        return $this->belongsTo('App\Item', 'parent_id');
    }

}
