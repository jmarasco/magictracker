<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use App\Location;
use Illuminate\Support\Facades\Request;
use App\Http\Requests;

class ItemsController extends Controller
{

	/**
	 * @param string $category
	 * @param Request $request
	 * @return mixed
     */
	public function magickingdom($category='attractions', $area='')
	{
		//Set Park variables
		$title = 'Magic Kingdom';
		$address = 'magic-kingdom';
		$pageType = 'park';
		$placeholder = 'magic-kingdom1';

		return $this->getParkPage($title, $category, $area, $address, $pageType, $placeholder);
	}

	public function epcot($category='attractions', $area='')
	{
		//Set Park variables
		$title = 'Epcot';
		$address = 'epcot';
		$pageType = 'park';
		$placeholder = 'epcot1';

		return $this->getParkPage($title, $category, $area, $address, $pageType, $placeholder);
	}

	public function hollywoodstudios($category='attractions', $area='')
	{
		//Set Park variables
		$title = 'Hollywood Studios';
		$address = 'hollywood-studios';
		$pageType = 'park';
		$placeholder = 'hollywood-studios1';

		return $this->getParkPage($title, $category, $area, $address, $pageType, $placeholder);
	}

	public function animalkingdom($category='attractions', $area='')
	{
		//Set Park variables
		$title = 'Animal Kingdom';
		$address = 'animal-kingdom';
		$pageType = 'park';
		$placeholder = 'animal-kingdom';

		return $this->getParkPage($title, $category, $area, $address, $pageType, $placeholder);
	}

	public function characters() 
	{
		//Set variables
		$title = 'Characters';
		$address = 'characters';
		$pageType = 'character';
		$placeholder = 'Portrait_placeholder';

		return $this->getCharacterPage($title, $address, $pageType, $placeholder);
	}

	public function resorts($category='resort', $location='') 
	{
		//Set variables
		$title = 'Resorts';
		$address = 'resorts';
		$pageType = 'resort';
		$placeholder = 'Portrait_placeholder';

		return $this->getResortPage($title, $category, $location, $address, $pageType, $placeholder);
	}

	public function show($item) 
	{
		$item = Item::where('item_name', '=', $item)->first();

		if (!$item) 
		{
			return $this->pageNotFound();
		}

		return view('items.show', array(
			'title'		=> $item->item_name,
			'park'		=> 0,
			'pageType'	=> 'item',
			'address'	=> 'items/'.$item->name,
			'placeholder' => 'magic-kingdom1',
			'items'		=> $item
		));
	}

	public function pageNotFound() 
	{
		return redirect()->route('404');
	}

	private function getParkPage($title, $category, $area, $address, $pageType, $placeholder)
	{	
		// Get Location from DB
		$park = Location::where('location', '=', $title)->first();

		$sort = Request::get('sort', 'item_name');
		// Change sort variable to table field name
		if ($sort == 'name') { $sort = 'item_name'; }

		// Verify $category is valid
		$parkCategories = array(
			'attraction',
			'attractions',
			'entertainment',
			'dining'
		);

	    if (!in_array($category, $parkCategories)) 
	    {
	     	return redirect($address.'/attractions');
	    }		

		// Fetch items collection & paginate
     	$items = $this->getParkItems($park, $category, $area, $sort);

     	if (!$items) 
     	{
			return $this->pageNotFound();
		}

		$items = $items->paginate(10);

     	// Set Count variables
     	$attractionCount 	= $this->getParkItems($park, 'attractions')->count();

     	$entertainmentCount = $this->getParkItems($park, 'entertainment')->count();

     	$diningCount 		= $this->getParkItems($park, 'dining')->count();

     	$totalCount 		= $attractionCount + $entertainmentCount + $diningCount;

	    return view('parkItems', array(
	    	'items'			=> $items,
	    	'address'		=> $address,
	    	'category'		=> $category,
	    	'pageType' 		=> $pageType,
	    	'placeholder' 	=> $placeholder,
	    	'sort'			=> $sort,
	    	'title' 		=> $title,
	    	'total'			=> $totalCount,
	    	'attractionCount' => $attractionCount,
	    	'entertainmentCount' => $entertainmentCount,
	    	'diningCount'	=> $diningCount
	    	));
	}

	private function getCharacterPage($title, $address, $pageType, $placeholder)
	{	
		// Get status parameter
		$status = Request::get('status', 'active');

		// Fetch items collection & paginate
     	$items = $this->getCharacterItems($status)->paginate(10);

     	// Set Count variables
     	$activeCount 	= $this->getCharacterItems($status)->count();
 		// dd($items);
	    return view('characters', array(
	    	'items'			=> $items,
	    	'address'		=> $address,
	    	'pageType' 		=> $pageType,
	    	'placeholder' 	=> $placeholder,
	    	'title' 		=> $title,
	    	'activeCount'	=> $activeCount,
	    	));
	}

	private function getResortPage($title, $category, $location='', $address, $pageType, $placeholder)
	{	
		//Get sort parameter
		$sort = Request::get('sort', 'item_name');

		//set category to DB field
		if ($category == 'resorts') {$category = 'resort'; }

		$resortCategories = array(
		    'resort', 
		    'value',
		    'dining',
		    'moderate',
		    'deluxe',
		    'deluxe-villas'
	    );
	      
	    if (!in_array($category, $resortCategories)) 
	    {
	     	return $this->pageNotFound();
	    }

		// Fetch items collection, sort & paginate
		if ($category == 'dining') {
			$items = $this->getResortDiningItems($location, $sort);
		} else {
     	$items = $this->getResortItems($category, $sort);
     	}

     	if (!$items) {
     		return redirect()->route('resorts');
     	} 
     	
     	$items = $items->paginate(10);
     	
     	// Set Count variables
     	$resortsCount = $this->getResortItems('resort')->count();
		$valueCount = $this->getResortItems('value')->count();
		$moderateCount = $this->getResortItems('moderate')->count();
		$deluxeCount = $this->getResortItems('deluxe')->count();
		$deluxeVillasCount = $this->getResortItems('deluxe-villas')->count();
		$resortDiningCount = $this->getResortDiningItems()->count();

	    return view('resorts', array(
	    	'items'			=> $items,
	    	'address'		=> $address,
	    	'category'		=> $category,
	    	'pageType' 		=> $pageType,
	    	'placeholder' 	=> $placeholder,
	    	'sort'			=> $sort,
	    	'title' 		=> $title,
	    	'resortsCount'	=> $resortsCount,
	    	'valueCount'	=> $valueCount,
	    	'moderateCount'	=> $moderateCount,
	    	'deluxeCount'	=> $deluxeCount,
	    	'deluxeVillasCount' => $deluxeVillasCount,
	    	'resortDiningCount' => $resortDiningCount
	    	));
	}

	private function getParkItems($park, $category, $area='', $sort='item_name', $seasonal=0)
    {
        $category = Category::where('name', '=', $category)->first();
        
        $items = Item::join('categories', 'items.category_id', '=', 'categories.id')
            ->join('status', 'items.status_id', '=', 'status.id')
            ->join('locations', 'items.location_id', '=', 'locations.id')
            ->select('item_name', 'locations.location', 'item_img')
            ->where([
                ['status.name', '=', 'Active'],
                ['items.seasonal', '=', $seasonal]
                ]);

        if (!empty($area)) 
        {
            $area = Location::where('location', '=', $area)->first();

            if (!$area) 
            {
                return false;
            }

            $items->where('locations.location', '=', $area->location);
        } else {
            $items->where('locations.parent_loc', '=', $park->id);
        }
            $items->where(function ($query) use ($category) {
                $query->where('categories.parent_id', '=', $category->id)
                    ->orWhere('categories.name', '=', $category->name);
            })
            ->orderByRaw('TRIM(LEADING "a " FROM 
                    TRIM(LEADING "an " FROM 
                        TRIM(LEADING "the " FROM 
                            LOWER(`'.$sort.'`))))');

        return $items;
    }

    private function getCharacterItems($status, $seasonal=0) 
    {   
    	// $items = Category::where('name', '=', 'character')->with('items')->first()->items;

		// $category = Category::where('name', '=', 'character')->first();
  //   	$items = Item::where('category_id', '=', $category->id)
  //   	            ->orderByRaw('TRIM(LEADING "a " FROM 
  //                   TRIM(LEADING "an " FROM 
  //                       TRIM(LEADING "the " FROM 
  //                           LOWER(`item_name`))))');
		 		// dd($items);
        $items = Item::join('categories', 'items.category_id', '=', 'categories.id')
            ->join('status', 'items.status_id', '=', 'status.id')
            ->select('item_name', 'item_img')
            ->where([
                ['status.name', '=', 'Active'],
                ['categories.name', '=', 'character'],
                ['items.seasonal', '=', $seasonal]
                ])
            ->orderByRaw('TRIM(LEADING "a " FROM 
                    TRIM(LEADING "an " FROM 
                        TRIM(LEADING "the " FROM 
                            LOWER(`item_name`))))');

        return $items;
    }

    private function getResortItems($category, $sort='item_name', $status='Active', $seasonal=0) 
    {
         
        if ($category == 'deluxe-villas') 
        {
            $category = 'Deluxe Villas'; 
        }

        $category   = Category::where('name', '=', $category)->first();

        // Get all Resorts
        if($category->name == 'Resort') {
            $items = Item::join('categories', 'items.category_id', '=', 'categories.id')
                ->select('item_name', 'item_img')
                ->where('categories.parent_id', '=', $category->id);
        } 

        // Or get Resort by Type
        else {
            $items = Item::join('categories', 'items.category_id', '=', 'categories.id')
                ->join('status', 'items.status_id', '=', 'status.id')
                ->select('item_name', 'item_img')
                ->where([
                    ['status.name', '=', 'Active'],
                    ['categories.name', '=', $category->name],
                    ['items.seasonal', '=', $seasonal]
                    ])
                ->where(function ($query) use ($category) {
                    $query->where('categories.parent_id', '=', $category->id)
                        ->orWhere('categories.name', '=', $category->name);
                    });
        }

        $items->orderByRaw('TRIM(LEADING "a " FROM 
            TRIM(LEADING "an " FROM 
                TRIM(LEADING "the " FROM 
                    LOWER(`'.$sort.'`))))');

        return $items;
    }

    private function getResortDiningItems($location='', $sort='items.item_name') 
    {
        if ($sort == 'item_name') { 
            $sort = '`items`.`item_name`';
        } elseif ($sort == 'location') { 
            $sort = '`parentItems`.`item_name`'; 
        }

        $items = Item::join('status', 'items.status_id', '=', 'status.id')
            ->join('items as parentItems', 'items.parent_id', '=', 'parentItems.id')
            ->select('items.item_name as item_name', 'parentItems.item_name as parent', 'items.item_img')
            ->where([
                ['status.name', '=', 'Active'],
                ['items.parent_id', '>', 0],
                ['items.seasonal', '=', 0]
                ]);

        if (!empty($location))
        {
            $location = Item::where('item_name', '=', $location)->first();

            if(!$location)
            {
                return false;
            }

            $items->where('parentItems.item_name', '=', $location->item_name);
        } 
            $items->orderByRaw('TRIM(LEADING "a " FROM 
            TRIM(LEADING "an " FROM 
                TRIM(LEADING "the " FROM 
                    LOWER('.$sort.'))))');

        return $items;
    }
}
