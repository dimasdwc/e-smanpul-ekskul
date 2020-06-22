<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\MasterSiswa;
use App\Models\MasterEkskul;

class DataSiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        $data_siswa = MasterSiswa::all();
        return view('waka/siswa/index', ['data_siswa' => $data_siswa]);                
    }

    public function getDataSiswa()
    {    
        $data_siswa = MasterSiswa::select('master_siswa.*');       
        return \DataTables::eloquent($data_siswa)
        -> addColumn('aksi', function($d){
            $link = url('/siswa/'.$d->id.'/hapus');
            return '
            <a href="/siswa/'.$d->id.'/ubah" class="btn btn-success btn-sm ">Edit</a>    
            <a href="'.$link.'">
                <button type="button" class="btn btn-danger waves-effect waves-light btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus data ini" data-original-title="Delete">
                    Hapus
                </button>
            </a>           
            ';            
        })        
        ->rawColumns(['aksi'])
        ->toJson();        
    }

    public function tambah(Request $request)
    {
        MasterSiswa::create($request->all());
        return redirect('/siswa')->with('sukses', 'Data berhasil ditambahkan!');
        //return $request->all();
    }  

    public function ubah($id)
    {
        $siswa  = MasterSiswa::find($id);
        return view('waka/siswa/ubah', ['siswa' => $siswa]);
    }  

    public function update(Request $request, $id)
    {
       $siswa  = MasterSiswa::find($id);
       $siswa->update($request->all());
       return redirect('/siswa')->with('sukses','Data berhasil diubah!');
    }

    public function hapus($id)
    {
        $siswa  = MasterSiswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses','Data berhasil dihapus!');
    }
}
