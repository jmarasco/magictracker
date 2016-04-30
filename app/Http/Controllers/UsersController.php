<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public function login() 
    {
    	$loginImages = array(
    		'magic-kingdom2.jpg',
    		'magic-kingdom3.jpg',
    		'magic-kingdom4.jpg',
    		'magic-kingdom6.jpg',
    		'magic-kingdom7.jpg'
    		);
    	$loginImg = $loginImages[array_rand($loginImages)];
        return view('login', compact('loginImg'));
    }
}