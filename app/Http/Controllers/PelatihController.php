<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelatih;
use App\Models\AbsensiPelatih;
use App\Models\DetailPelatih;

class PelatihController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {        
        // $user_role = Auth::user()->role_id;
        // if($user_role == '1'){
        //     redirect('/pelatih');
        // }else{
        //     redirect('/');
        // }    	
    	return view('pelatih/index');
    }

    public function profil()
    {
        $pelatih_id = Auth::user()->id;
        $detail_pelatih = DetailPelatih::where('pelatih_id', $pelatih_id)->first();       
        return view('pelatih.profil.index', compact('detail_pelatih'));
    } 
}
