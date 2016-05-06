<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Get the item for the comment through comment_item.
     */
    public function item() {
      return $this->belongsToMany(Item::class);
    }
  
    /**
     * Get the user for the comment through item_user.
     */
    public function user() {
      return $this->belongsToMany(User::class);
    }
}