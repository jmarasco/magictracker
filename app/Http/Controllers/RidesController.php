<?php

namespace App\Http\Controllers;

use Auth;
use App\Item;
use App\Ride;
use App\User;
use Illuminate\Http\Request;

class RidesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function check(Request $request) 
    {
    	// If the action is check
    	if($request['checkType'] == 'check') {

	    	// Get user and item models
	    	$user = Auth::user();
	    	$item = Item::find($request['itemId']);

	    	// Verify Item
	    	if(!$item) {
	    		return back();
	    	};

	    	// Create new ride
	    	$ride = new Ride;
	    	$ride->users = $user;
	    	$ride->items = $item;
	    	$ride->save;

	    	return back();
    	}

    	// If the action is uncheck
    }
}