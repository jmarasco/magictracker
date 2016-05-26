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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'checked',
        'url'
    ];
    
    /**
     * RELATIONS
     */

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
     * Get the item's child items.
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

    /**
     * SETTERS AND GETTERS
     */

    /**
     * Gets Checked status.
     *
     * @return mixed
     */
    public function getCheckedAttribute()
    {
        return $this->attributes['checked'] == 'unchecked';
    }

    /**
     * Sets Checked status.
     *
     * @return mixed
     */
    public function setCheckedAttribute($value)
    {
        $this->attributes['checked'] = $value;
    }

    /**
     * Gets Url attribute.
     *
     * @return mixed
     */
    public function getUrlAttribute()
    {
        $url = "/items/" . str_slug($this->item_name);
        return $url;
    }

    /**
     * QUERIES
     */

    /**
     * Get Item by name
     * @param string $name
     * @return Illuminate/Database/Eloquent/Builder
     */
    public static function findItemByName($name)
    {
        return Item::where('item_name', '=', $name)->first();
    }

    /**
     * Get all Items with Active Status
     * @return Illuminate/Database/Eloquent/Builder
     */
    public static function scopeActive($query) 
    {
        return $query->whereHas('status', function($query) {
            $query->where('name', '=', 'Active');
        });
    }

    /**
     * Get all Items with indicated Status
     * @return Illuminate/Database/Eloquent/Builder
     */
    public static function scopeWithStatus($query, $status) 
    {
        return $query->whereHas('status', function($query) use ($status) {
            $query->where('name', $status);
        });
    }

    /**
     * Get all Items in indicated Category
     * @param string
     * @return Illuminate/Database/Eloquent/Builder
     */
    public static function scopeInCategory($query, $name) 
    {
        $category = Category::findCategoryByName($name);

        return $query->whereHas('category', function($query) use ($category) {
            $query->where('name', $category->name)
                ->orWhere('parent_id', $category->id);
        });
    }

    /**
     * Get all seasonal/nonseasonal Items
     * @param bool
     * Default nonseasonal
     * @return Illuminate/Database/Eloquent/Builder
     */
    public static function scopeNonseasonal($query, $seasonal = true) 
    {
        return $query->where('seasonal', '!=', $seasonal);
    }

    /**
     * Get all Items from a park
     * @param int Park id
     * @return Illuminate/Database/Eloquent/Builder
     */
    public static function scopeInPark($query, $parkId) 
    {
        return $query->whereHas('location', function($query) use ($parkId) {
            $query->where('parent_loc', $parkId);
        });

        // To Do: Return Location field with park items
        // return $query->with(array('location'=>function($query) use ($parkId) {
        //     $query->select('id', 'location')
        //         ->where('parent_loc', $parkId);
        // }));
    }

    /**
     * Sort query result
     * @param string
     * @return Illuminate/Database/Eloquent/Builder
     */
    public static function scopeSortBy($query, $sort) 
    {
        // Set sort variable to table field name
        if ($sort == 'name') { 
            $sort = 'item_name'; 
        }

        return $query->orderByRaw('TRIM(LEADING "a " FROM 
                    TRIM(LEADING "an " FROM 
                        TRIM(LEADING "the " FROM 
                            LOWER(`'.strtolower($sort).'`))))');
    }
  
    public static function scopeWithUserChecks($query, $id) {
      return $query->whereHas('checks', function($checksQuery) use ($id) {
        $checksQuery->whereHas('user', function($userQuery) use ($id) {
          $userQuery->where('id', 4);
        });
      });
    }

    /**
     * Gets the The accessors to append to the model's array form.
     *
     * @return array
     */
    public function getAppends()
    {
        return $this->appends;
    }
}