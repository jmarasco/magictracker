<?php

namespace App\Http\Controllers;

use Auth;
use App\Item;
use App\Check;
use App\User;
use Illuminate\Http\Request;

class ChecksController extends Controller
{
    public function checkUncheck(Request $request) 
    {
      if (!Auth::user()) {
        return redirect()->route('login');
      }

      // Get Input parameters
    	$userId = Auth::user()->id;
      $itemId = $request->get('itemId');
      $checkType = $request->get('checkType');

      // Get Item
    	$item = Item::find($itemId);

    	// Verify Item
    	if(!$item) 
      {
    		return null;
    	};	    

      // If the action is check
      if ($checkType == 'check') 
      {
        $this->check($userId, $itemId);

      // If the action is uncheck
      } elseif ($checkType == 'uncheck') {
        
        $this->uncheck($item, $userId);

      // Otherwise the action is invalid
      } else {
        return null;
      }      
    }

    public function check($userId, $itemId) {
      // Create new check for User and Item
        $check = new Check;
        $check->user()->associate($userId);
        $check->item()->associate($itemId);

          // Save new check
        $check->save();
    }

    public function uncheck($item, $userId) {
      // Retrieve any checks associated with Item and User
      $check = $item->checks()->where('user_id', $userId);

      // Delete all selected checks
      $check->delete();
    }
}