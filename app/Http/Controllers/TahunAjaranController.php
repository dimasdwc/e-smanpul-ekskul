<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\TahunAjaran;

class TahunAjaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$data_tahun_ajaran = TahunAjaran::all();
    	$tahun_ajaran = TahunAjaran::where('status', '1')->first();
    	return view('waka/tahun_ajaran/index', compact('tahun_ajaran', 'data_tahun_ajaran'));
    }
    public function getDataTahunAjaran()
    {
    	// $tahun_ajaran = TahunAjaran::where('status', 1)->first();
    	$tahun_ajaran = TahunAjaran::get();
    	return DataTables::of($tahun_ajaran)
    	->addColumn('status', function($d){                            
            $aktif = url('guru/ujian/update-status/'.$d->id.'/1' );
            $nonaktif = url('guru/ujian/update-status/'.$d->id.'/0' );
            if($d->status==1){
                return '
                <a href="'.$nonaktif.'"><button type="button" class="btn btn-success" style="width: 50%" title="klik untuk nonaktifkan">Aktif</button></a>
                        ';
            }elseif($d->status==0){
                return '
                <a href="'.$aktif.'"><button type="button" class="btn btn-danger" style="width: 50%" title="Klik untuk aktifkan">Tidak Aktif</button></a>
                        ';
            }else{
            	return 'a';
            }
		})
		->addColumn('aksi', function($d){
            $link = url('/waka/pelatih/'.$d->id.'/detail');	
            return '
            <a href='.$link.'>
            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data">
                Hapus
            </button>
            ';            
        })
			->addIndexColumn()
			->rawColumns(['status', 'aksi'])
    		->toJson();
    }
}
