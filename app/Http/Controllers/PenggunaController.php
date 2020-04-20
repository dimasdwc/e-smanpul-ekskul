<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PenggunaController extends Controller
{
    public function index() 
    {
    	$pengguna = DB::table('pengguna')->get();

    	return view ('pengguna', ['pengguna' => $pengguna]);
    	// return datatables::of(pengguna::query())->make(true);
    }
}
