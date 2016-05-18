<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use App\Location;
use Illuminate\Support\Facades\Request;
use Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class ItemsController extends Controller
{
	/**
	 * Variables to be passed to the view
	 */
	private $category = 'attractions';
	private $area = '';
	private $title;
	private $pageType = 'park';
	private $placeholder;
	private $address;
	private $sort = 'item_name';
	private $park;
	private $seasonal = false;
	private $location;

	/**
	 * @param string $category
	 * @param string $area
	 * @param Request $request
	 * @return mixed
   */
	public function magickingdom($category='attractions', $area='')
	{
		//Set Park variables
		$this->title = 'Magic Kingdom';
		$this->category = $category;
		$this->area = $area;
		$this->address = 'magic-kingdom';
		$this->pageType = 'park';
		$this->placeholder = 'magic-kingdom1';

		return $this->getParkPage();
	}

	/**
	 * @param string $category
	 * @param string $area
	 * @param Request $request
	 * @return mixed
   */
	public function epcot($category='attractions', $area='')
	{
		//Set Park variables
		$this->title = 'Epcot';
		$this->category = $category;
		$this->area = $area;
		$this->address = 'epcot';
		$this->pageType = 'park';
		$this->placeholder = 'epcot1';

		return $this->getParkPage();
	}

	/**
	 * @param string $category
	 * @param string $area
	 * @param Request $request
	 * @return mixed
   */
	public function hollywoodstudios($category='attractions', $area='')
	{
		//Set Park variables
		$this->title = 'Hollywood Studios';
		$this->category = $category;
		$this->area = $area;
		$this->address = 'hollywood-studios';
		$this->pageType = 'park';
		$this->placeholder = 'hollywood-studios1';

		return $this->getParkPage();
	}

	/**
	 * @param string $category
	 * @param string $area
	 * @param Request $request
	 * @return mixed
   */
	public function animalkingdom($category='attractions', $area='')
	{
		//Set Park variables
		$this->title = 'Animal Kingdom';
		$this->category = $category;
		$this->area = $area;
		$this->address = 'animal-kingdom';
		$this->pageType = 'park';
		$this->placeholder = 'animal-kingdom';

		return $this->getParkPage();
	}

	/**
	 * @param Request $request
	 * @return mixed
   */
	public function characters() 
	{
		//Set variables
		$this->title = 'Characters';
		$this->address = 'characters';
		$this->pageType = 'character';
		$this->placeholder = 'Portrait_placeholder';

		return $this->getCharacterPage();
	}

	/**
	 * @param string $category
	 * @param string $location
	 * @param Request $request
	 * @return mixed
   */
	public function resorts($category='resort', $location='') 
	{
		//Set variables
		$this->title = 'Resorts';
		$this->category = $category;
		$this->location = $location;
		$this->address = 'resorts';
		$this->pageType = 'resort';
		$this->placeholder = 'Portrait_placeholder';

		return $this->getResortPage();
	}

	/**
	 * @param string $item
	 * @param Request $request
	 * @return mixed
   */
	public function show($item) 
	{
		$item = Item::findItemByName($item);

		// Reverse str_slug()
		// ucwords(str_replace('-', ' ', $str))

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

	protected function getParkPage()
	{	
		// Get Location from DB
		$this->park = Location::findLocationByName($this->title);

		$this->sort = Request::get('sort', 'item_name');
		// Change sort variable to table field name
		if ($this->sort == 'name') { $this->sort = 'item_name'; }

		// Verify $category and redirect to Attractions if invalid
		$parkCategories = array(
			'attraction',
			'attractions',
			'entertainment',
			'dining'
		);

		if (!in_array($this->category, $parkCategories)) 
    {
     	return redirect($this->address.'/attractions');
    }		

		// Fetch items collection
   	$items = $this->getParkItems();

		// Retrieve checked Items for page
 		$checkedItems = $this->userChecked($this->getParkItems(), 'items.id')->keyBy('id');

 		// Populate checked attribute of Items
 		$itemsWithChecks = $this->getItemUserChecks($items, $checkedItems);

 		// Paginate
 		$paginatedItems = $this->paginateItems($itemsWithChecks);

   	// Set Count variables
   	$attractionCount 	= $this->countByCategory('attractions');
   	$entertainmentCount = $this->countByCategory('entertainment');
   	$diningCount 		= $this->countByCategory('dining');
   	$totalCount 		= $attractionCount + $entertainmentCount + $diningCount;

    return view('parkItems', array(
    	'items'			=> $paginatedItems,
    	'address'		=> $this->address,
    	'category'		=> $this->category,
    	'pageType' 		=> $this->pageType,
    	'placeholder' 	=> $this->placeholder,
    	'sort'			=> $this->sort,
    	'title' 		=> $this->title,
    	'total'			=> $totalCount,
    	'attractionCount' => $attractionCount,
    	'entertainmentCount' => $entertainmentCount,
    	'diningCount'	=> $diningCount,
    	'area'	=> $this->area
    	));
	}

	protected function getCharacterPage()
	{	
		// Get status parameter
		$status = Request::get('status', 'active');

		// Fetch items Collection
   	$items = $this->getCharacterItems($status);

   	// Set Count variables
   	$activeCount 	= $items->count();
 		
 		// Retrieve checked Items for page
 		$checkedItems = $this->userChecked($this->getCharacterItems($status))->keyBy('id');

 		// Populate checked attribute of Items
 		$itemsWithChecks = $this->getItemUserChecks($items, $checkedItems);

 		// Paginate
 		$paginatedItems = $this->paginateItems($itemsWithChecks);

    return view('characters', array(
    	'items'			=> $paginatedItems,
    	'address'		=> $this->address,
    	'pageType' 		=> $this->pageType,
    	'placeholder' 	=> $this->placeholder,
    	'title' 		=> $this->title,
    	'activeCount'	=> $activeCount,
    	));
	}

	protected function getResortPage()
	{	
		//Get sort parameter
		$originalSort = $this->sort = Request::get('sort', 'item_name');

		//set category to DB field
		if ($this->category == 'resorts') {$this->category = 'resort'; }

		$resortCategories = array(
		    'resort', 
		    'value',
		    'dining',
		    'moderate',
		    'deluxe',
		    'deluxe-villas'
	    );

	    if (!in_array($this->category, $resortCategories)) 
	    {
	     	return $this->pageNotFound();
	    }

		// Set sort parameter to unambiguous 'name'
		if ($this->category == 'dining') {
			if ($this->sort == 'item_name') {
				$this->sort = 'name';
			}
		// Fetch items collection, sort & paginate	
			$items = $this->getResortDiningItems();
		} else {
     	$items = $this->getResortItems();
     	}

   	if (!$items) {
   		return redirect()->route('resorts');
   	}

    // Retrieve checked Items for page
 		$checkedItems = $this->userChecked($this->getResortItems(), 'items.id')->keyBy('id');

 		// Populate checked attribute of Items
 		$itemsWithChecks = $this->getItemUserChecks($items, $checkedItems);

 		// Paginate
 		$paginatedItems = $this->paginateItems($itemsWithChecks);
 	
   	// Set Count variables
   	$resortsCount = $this->countByCategory('resort');
		$valueCount = $this->countByCategory('value');
		$moderateCount = $this->countByCategory('moderate');
		$deluxeCount = $this->countByCategory('deluxe');
		$deluxeVillasCount = $this->countByCategory('deluxe-villas');
		$resortDiningCount = $this->getResortDiningItems()->count();

    return view('resorts', array(
    	'items'			=> $paginatedItems,
    	'address'		=> $this->address,
    	'category'		=> $this->category,
    	'pageType' 		=> $this->pageType,
    	'placeholder' 	=> $this->placeholder,
    	'sort'			=> $originalSort,
    	'title' 		=> $this->title,
    	'resortsCount'	=> $resortsCount,
    	'valueCount'	=> $valueCount,
    	'moderateCount'	=> $moderateCount,
    	'deluxeCount'	=> $deluxeCount,
    	'deluxeVillasCount' => $deluxeVillasCount,
    	'resortDiningCount' => $resortDiningCount
    	));
	}

	protected function getParkItems($category='')
    {
        $category = Category::findCategoryByName($this->category);
        
        $items = Item::join('categories', 'items.category_id', '=', 'categories.id')
            ->join('status', 'items.status_id', '=', 'status.id')
            ->join('locations', 'items.location_id', '=', 'locations.id')
            ->select('items.id', 'item_name', 'locations.location', 'item_img')
            ->where([
                ['status.name', '=', 'Active'],
                ['items.seasonal', '=', $this->seasonal]
                ]);

        // To Do: Move SQL to Item Model with chained query methods
        // $items = Item::active()->nonseasonal()->inCategory($category->name)->inPark($this->park->id);

        $area = $this->area;

        if (!empty($area)) 
        {
            $area = Location::findLocationByName($area);

            if ($area == null) {
                return false;
            }

            $items->where('locations.location', '=', $area->location);
        } else {
            $items->inPark($this->park->id);
        }
            $items->where(function ($query) use ($category) 
            {
                $query->where('categories.parent_id', '=', $category->id)
                    ->orWhere('categories.name', '=', $category->name);
            });

        $items->sortBy($this->sort);

        return $items;
    }

    protected function getCharacterItems($status, $nonseasonal=true) 
    {
      // To add other characters replace active() with withStatus($status)
      return Item::active()->nonseasonal($nonseasonal)->inCategory('character')
      	->select('id', 'item_name', 'item_img')
      	->sortBy('item_name');
    }

    protected function getResortItems() 
    {
      if ($this->category == 'deluxe-villas') {
        $this->category = 'Deluxe Villas'; 
      }

      $category = Category::findCategoryByName($this->category);

      // Get all Resorts
      if($category->name == 'Resort') {
        $items = Item::join('categories', 'items.category_id', '=', 'categories.id')
          ->select('items.id as id', 'item_name', 'item_img')
          ->where('categories.parent_id', '=', $category->id);
      } 
      // Or get Resort by Type
      else {
          $items = Item::join('categories', 'items.category_id', '=', 'categories.id')
            ->join('status', 'items.status_id', '=', 'status.id')
            ->select('items.id as id', 'item_name', 'item_img')
            ->where([
              ['status.name', '=', 'Active'],
              ['categories.name', '=', $category->name],
              ['items.seasonal', '=', $this->seasonal]
              ])
            ->where(function ($query) use ($category) {
              $query->where('categories.parent_id', '=', $category->id)
                ->orWhere('categories.name', '=', $category->name);
              });
      }

      return $items;
    }

    protected function getResortDiningItems() 
    {
      if ($this->sort == 'name') { 
        $this->sort = 'items`.`item_name';
      } elseif ($this->sort == 'location') { 
        $this->sort = 'parentItems`.`item_name'; 
      }

      $items = Item::join('status', 'items.status_id', '=', 'status.id')
        ->join('items as parentItems', 'items.parent_id', '=', 'parentItems.id')
        ->select('items.id as id', 'items.item_name as item_name', 'parentItems.item_name as parent', 'items.item_img')
        ->where([
          ['status.name', '=', 'Active'],
          ['items.parent_id', '>', 0],
          ['items.seasonal', '=', 0]
          ]);

      if (!empty($this->location))
      {
        $resort = Item::findItemByName($this->location);

        if(!$resort)
        {
          return false;
        }

        $items->where('parentItems.item_name', '=', $resort->item_name);
      }

      return $items;
    }

    protected function countByCategory($category)  
    {
    	// Store original Category value
    	$originalCategory = $this->category;

    	// Set new Category value and get count
    	$this->category = $category;

    	// If we are counting park items
    	if ($this->pageType == 'park') {
	    	$count = $this->getParkItems()->count();
	    // Otherwise we are counting resorts
	    } else {
	    	$count = $this->getResortItems()->count();
	    }
    	// Restore original Category value
    	$this->category = $originalCategory;

    	return $count;
    }

    /**
     * Returns Items from a Collection that have been checked by the Auth User
     *
     * @param mixed $items
     * @param string $id = DB field
     */
    protected function userChecked($items, $id='id') 
    {
    	return $items->whereHas('checks', function($checksQuery) {
    		$checksQuery->whereHas('user', function($userQuery) {
    			$userQuery->where('id', Auth::user()->id);
    			});
    	})->select($id)->get();
    }

    /**
     * Populates the checked attribute of items in a collection 
     * by comparing to a second collection of checked items
     *
     * @param mixed $items $checkedItems
     */
    protected function getItemUserChecks($items, $checkedItems) 
	    {
	    	$itemsWithChecks = $items->get()->map(function($item) use ($checkedItems) {
	 			if ($checkedItems->search(function($checkedItem) use ($item) {
		  		return $checkedItem->id == $item->id;
		  		})) {
					$item->setCheckedAttribute(true);
					return $item;
				} else {
					$item->setCheckedAttribute(false);
					return $item;
				}
				});
				return $itemsWithChecks;
    }

    /**
     * Paginate items.
     *
     * @param mixed $items
     *
     * @return LengthAwarePaginator
     */
    protected function paginateItems($items, $perPage = 10)
    {
        $page = Request::get('page', 1);

        $offset = ($page * $perPage) - $perPage;

        $paginator = new LengthAwarePaginator(
            // $items = array_slice($items, $offset, $perPage, true),
        		$items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page
            // ['path' => $this->request->url(), 'query' => $this->request->query()]
        );

        return $paginator;
    }
}