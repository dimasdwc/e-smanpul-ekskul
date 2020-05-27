<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WakaController extends Controller
{
	public function __construct()
  	{
    	$this->middleware('auth');
  	}
  	
    public function index()
    {
    	return view('waka.index');
    }

    public function profil()
    {
    	return view('waka.profil.index');
    }
}
