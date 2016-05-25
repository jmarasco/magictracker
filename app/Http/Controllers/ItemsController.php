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
   * Instantiate a new UserController instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
	 * Variables to be passed to the view
	 */
	private $category;
	private $area = '';
	private $title;
	private $pageType = 'park';
	private $placeholder;
	private $address;
	private $sort = 'item_name';
	private $park;
	private $seasonal = false;
	private $location;
  private $parkCategories = array (
          'attractions',
          'entertainment',
          'dining'
          );
  private $resortCategories = array (
          'resort', 
          'value',
          'dining',
          'moderate',
          'deluxe',
          'deluxe-villas'
          );

	/**
	 * @param string $category
	 * @param string $area
	 * @param Request $request
	 * @return mixed
   */
	public function magickingdom($area='')
	{
		//Set Park variables
		$this->title = 'Magic Kingdom';
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
	public function epcot($area='')
	{
		//Set Park variables
		$this->title = 'Epcot';
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
	public function hollywoodstudios($area='')
	{
		//Set Park variables
		$this->title = 'Hollywood Studios';
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
	public function animalkingdom($area='')
	{
		//Set Park variables
		$this->title = 'Animal Kingdom';
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

	/**
   * PAGE FUNCTIONS
   */

  protected function getParkPage()
	{	
		// Get Park from DB
		$this->park = Location::findLocationByName($this->title);

		$this->sort = Request::get('sort', 'item_name');
		// Change sort variable to table field name
		if ($this->sort == 'name') { $this->sort = 'item_name'; }

    $count = $this->countEachParkCategory();

    // Check area parameter and fetch items and counts accordingly
    $area = $this->area;
    if ($area) {
      $items = $this->getParkAreaItems();
      $areaCount = $this->countEachParkCategory($area);
      $attractionCount = $areaCount['attractions'];
      $entertainmentCount = $areaCount['entertainment'];
      $diningCount = $areaCount['dining'];
      $totalAreaCount = $areaCount['attractions'] + $areaCount['entertainment'] + $areaCount['dining'];
    } else {
     	$items = $this->getParkItems();
      $attractionCount = $count['attractions'];
      $entertainmentCount = $count['entertainment'];
      $diningCount = $count['dining'];
      $totalAreaCount = $count['attractions'] + $count['entertainment'] + $count['dining'];
    }

    // Check category parameter and filter if present
    $category = $this->category = Request::get('category');
      if($category) {
        $items = $this->getCategoryItems($category, $items);
      }

		// Retrieve checked Items for page and count
 		$checkedItems = $this->userChecked($this->getParkItems(), 'items.id')->keyBy('id');

 		// Populate checked attribute of Items
 		$itemsWithChecks = $this->getItemUserChecks($items, $checkedItems);

 		// Paginate
 		$paginatedItems = $this->paginateItems($itemsWithChecks);

   	// Set total count variable
    $totalCheckedCount  = $checkedItems->count();

    return view('parkItems', array(
    	'items'			=> $paginatedItems,
    	'address'		=> $this->address,
    	'category'	=> $this->category,
      'area'      => $area,
    	'pageType' 	=> $this->pageType,
    	'placeholder'	=> $this->placeholder,
    	'sort'			=> $this->sort,
    	'title' 		=> $this->title,
      'total' => $totalAreaCount,
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

   	// Retrieve checked Items for page
 		$checkedItems = $this->userChecked($this->getCharacterItems($status))->keyBy('id');

    // Set Count variables
    $activeCount  = $items->count();
    $checkedCount = $checkedItems->count();
    
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
      'checkedCount' => $checkedCount
    	));
	}

	protected function getResortPage()
	{	
		//Get sort parameter
		$originalSort = $this->sort = Request::get('sort', 'item_name');

    $category = $this->category;
		//set category to DB field
		if ($category == 'resorts') {$category = 'resort'; }

	    if (!in_array($category, $this->resortCategories)) 
	    {
	     	return $this->pageNotFound();
	    }

		// Set sort parameter to unambiguous 'name'
		if ($category == 'dining') {
			if ($this->sort == 'item_name') {
				$this->sort = 'name';
			}
		// Fetch items collection, sort & paginate	
			$items = $this->getResortDiningItems();
		} elseif ($category == 'resort') {
     	$items = $this->getResortItems();
   	} else {
      $items = $this->getResortCategoryItems($category);
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
    $count = $this->countEachResortCategory();

    return view('resorts', array(
    	'items'			=> $paginatedItems,
    	'address'		=> $this->address,
    	'category'		=> $category,
    	'pageType' 		=> $this->pageType,
    	'placeholder' 	=> $this->placeholder,
    	'sort'			=> $originalSort,
    	'title' 		=> $this->title,
    	'resortsCount'	=> $count['resort'],
    	'valueCount'	=> $count['value'],
    	'moderateCount'	=> $count['moderate'],
    	'deluxeCount'	=> $count['deluxe'],
    	'deluxeVillasCount' => $count['deluxe-villas'],
    	'resortDiningCount' => $count['dining']
    	));
	}

	protected function getParkItems($area='')
    {
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

      $items->inPark($this->park->id)
            ->sortBy($this->sort);

      return $items;
    }

    protected function getParkAreaItems() 
    {
      //Get area parameter and verify it against the DB
      $area = $this->area;

      if (!empty($area)) 
      {
        $area = Location::findLocationByName($area);

        if ($area == null) {
          return false;
        }
      }

      // Get all Park Items & filter by area
      $items = $this->getParkItems()->where('locations.location', '=', $area->location);

      return $items;
    }

    /**
     * Filter Items by category
     * @param string $categoryName
     * @param mixed $items
     * @return Illuminate/Database/Eloquent/Builder
     */
    protected function getCategoryItems($categoryName, $items) 
    {
      if ($categoryName == 'resorts') {
        $categoryName = 'resort';
      }

      if ($categoryName == 'deluxe-villas') {
        $categoryName = 'Deluxe Villas';  
      }

      // Verify category
      $category = Category::findCategoryByName($categoryName);
      if(!$category) {
        return $items;
      }

      // Return $items filtered by category
      return $items->where(function ($query) use ($category) {
        $query->where('categories.parent_id', '=', $category->id)
          ->orWhere('categories.name', '=', $category->name);
      });
    }

    protected function getCharacterItems($status, $nonseasonal=true) 
    {
      // To add other characters replace active() with withStatus($status)
      return Item::active()->nonseasonal($nonseasonal)->inCategory('character')
      	->select('id', 'item_name', 'item_img')
      	->sortBy('item_name');
    }

    protected function getResortItems($categoryName='resort') 
    {
      $category = Category::findCategoryByName($categoryName);

      $items = Item::join('categories', 'items.category_id', '=', 'categories.id')
        ->select('items.id as id', 'item_name', 'item_img')
        ->where('categories.parent_id', '=', $category->id);

      return $items;
    }

    protected function getResortCategoryItems($categoryName='resort') 
    {
      if ($categoryName == 'deluxe-villas') {
        $categoryName = 'Deluxe Villas'; 
      }

      $category = Category::findCategoryByName($categoryName);

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

      return $items;
    }

    protected function getResortDiningItems() 
    {
      $sort = 'items`.`item_name';
      if ($this->sort == 'name') { 
        $sort = 'items`.`item_name';
      } elseif ($this->sort == 'location') { 
        $sort = 'parentItems`.`item_name'; 
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

      return $items->sortBy($sort);
    }

    /**
     * Counts Park items by category
     * @param string $category
     * @param mixed $items
     * @return int
     */
    protected function countByCategory($category, $items)  
    {
      return $this->getCategoryItems($category, $items)->count();
    }

    /**
     * Counts Park items by category
     * @param array $categories
     * @param string $area
     * @param mixed $items
     * @return array
     */
    protected function countEachParkCategory($area='')  
    {
      $count = array();

      foreach ($this->parkCategories as $category) {
        if($area){
          $items = $this->getParkAreaItems();
        } else {
          $items = $this->getParkItems();
        }
        $count[$category] = $this->countByCategory($category, $items);
      }

      return $count;
    }

    /**
     * Counts Resort items by category
     * @param mixed $items
     * @return array
     */
    protected function countEachResortCategory()  
    {
      $count = array();

      foreach ($this->resortCategories as $category) {
        if($category == 'dining') {
          $count[$category] = $this->getResortDiningItems()->count();
        } elseif ($category == 'resort') {
          $count[$category] = $this->getResortItems()->count();
        } else {
          $items = $this->getResortCategoryItems($category);
          $count[$category] = $this->countByCategory($category, $items);
        }
      }

      return $count;
    }

    /**
     * Returns Items from a Collection that have been checked by the Auth User
     *
     * @param mixed $items
     * @param string $id = DB field
     * @return Illuminate/Database/Eloquent/Builder
     */
    protected function userChecked($items, $id='id') 
    {
      $userId = '';
      if (Auth::user()) {
        $userId = Auth::user()->id;
      }

    	return $items->whereHas('checks', function($checksQuery) use ($userId) {
    		$checksQuery->whereHas('user', function($userQuery) use ($userId) {
    			$userQuery->where('id', $userId);
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
      $page,
      ['path' => Request::url(), 'query' => Request::query()]
    );

    return $paginator;
  }

  public function pageNotFound() 
  {
    return redirect()->route('404');
  }
}