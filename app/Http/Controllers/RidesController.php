<?php

namespace App\Http\Controllers;

use Auth;
use App\Item;
use Illuminate\Http\Request;

class RidesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function check(Request $request) 
    {
    	$user = Auth::user();
    	$item = Item::find($request['itemId']);
    	dd($item);
    }
}
