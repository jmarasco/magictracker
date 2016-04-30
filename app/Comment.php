<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function item() {
      return $this->belongsToMany(Item::class);
    }
  
    public function user() {
      return $this->belongsToMany(User::class);
    }
}
