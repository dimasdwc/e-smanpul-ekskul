<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PenggunaController extends Controller
{
    public function index() 
    {
    	$users = DB::table('login_user')->get();

    	return view ('user/index', ['users' => $users]);
    	// return datatables::of(pengguna::query())->make(true);
    }
}
