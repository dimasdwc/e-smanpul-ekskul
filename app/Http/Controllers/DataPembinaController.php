<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\MasterPembina;

class DataPembinaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('waka/pembina/index');
    }

    public function getDataPembina()
    {
    	$data_pembina = MasterPembina::get();
    	return DataTables::of($data_pembina)
    	->addColumn('jenis_kelamin', function($d){
    		if ($d->jenis_kelamin == 'L') {
    			return 'Laki-Laki';
    		} else {
    			return 'Perempuan';
    		}
    	})
    	->addColumn('aksi', function($d){
    		$link = url('/waka/pelatih/'.$d->id.'/detail');	
            return '
            <a href='.$link.'>
            <button type="submit" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                Lihat
            </button>
            '; 
    	})
    	->addIndexColumn()
    	->rawColumns(['jenis_kelamin', 'aksi'])
    	->toJson();
    }
}
