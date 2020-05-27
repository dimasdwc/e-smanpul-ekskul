<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\MasterEkskul;
use App\Models\MasterPembina;
use App\Models\DetailPelatih;
use App\Models\EkskulRumpun;
use App\User;

class DataEkskulController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $data_pelatih = User::where('jabatan', 2)->get();
        $data_pembina = MasterPembina::all();
        $daftar_ekskul = MasterEkskul::all();
        $jumlah_ekskul = MasterEkskul::all()->count();
        $no_ekskul = $jumlah_ekskul + 1;
        $data_rumpun = EkskulRumpun::all();
        return view ('waka.ekskul.index', compact('data_pelatih', 'daftar_ekskul', 'data_pembina', 'data_rumpun', 'no_ekskul'));
    }

    public function tabel_tampil_ekskul()
    {
    	$data_ekskul = MasterEkskul::all();
    	return DataTables::of($data_ekskul)
		->addColumn('rumpun', function($d){                  
            $data_rumpun = MasterEkskul::with('ekskulrumpun')->where('rumpun_id', $d->rumpun_id)->first();
            return $data_rumpun->ekskulrumpun->nama_rumpun;
        })
        // ->addColumn('nama_pelatih', function($d){                  
        //     $data_pelatih = DetailPelatih::with('pelatih')->where('ekskul_id', $d->id)->first();
        //     return $data_pelatih->pelatih->name;             
        // })
        ->addColumn('nama_pembina', function($d){                            
            $data_pembina = MasterPembina::with('ekskul_pembina')->where('id', $d->pembina_id)->first();
            return $data_pembina->nama_pembina;
        })
        ->addColumn('status', function($d){                            
            $status = $d->status;

			// if ($status == "Aktif") {
		   	// 	<span class="badge badge-pill badge-success">'.$status.'</span>
		   	// } else {
		   	// <span class="badge badge-pill badge-danger">'.$status.'</span>
		  	// }
            return '
            	<h6><span class="badge badge-pill badge-success">'.$status.'</span></h6>
            ';
        })
        ->addColumn('aksi', function($d){
            $link = url('/siswa/'.$d->id.'/hapus');
            return '
            <button type="submit" class="btn btn-neutral btn-icon btn-round text-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail">
                <i class="nc-icon nc-alert-circle-i"></i>
            </button>
            ';            
        })
        ->rawColumns(['rumpun','nama_pelatih','nama_pembina','status','aksi'])
		->toJson();

    }

    public function showRumpun()
    {    
        return view('waka/ekskul/show_rumpun');

    }

    public function detail($id)
    {
        $ekskul = Ekskul::find($id);
        $jumlah_anggota = AbsensiSiswa::count(); 
        $jumlah_pertemuan = AbsensiPelatih::count(); 
        return view('ekskul/detail', ['ekskul' => $ekskul, 'jumlah_anggota' => $jumlah_anggota]);        
    }

    public function tambah(Request $request)
    {
        $no_ekskul = $request->inputNoEkskul;
        $nama_ekskul = $request->inputNamaEkskul;
        $rumpun = $request->selectRumpun;
        // $pelatih = $request->selectPelatih;
        $pembina = $request->selectPembina;
        $tempat_latihan = $request->inputTempatLatihan;
        $status = 'Aktif';
        $ekskul = new MasterEkskul;
        $detail_pelatih = new DetailPelatih;

        $ekskul->create([
            'no_ekskul' => $no_ekskul,
            'nama_ekskul' => $nama_ekskul,
            'rumpun_id' => $rumpun,
            'pembina_id' => $pembina,
            // 'pelatih_id' => $pelatih,
            'tempat_latihan' => $tempat_latihan,
            'status' => $status,
        ]);

        // $detail_pelatih->create([
            
        // ]);

        return redirect('waka/ekskul')->with('sukses', 'Anda berhasil menambahkan data baru');
        // return$request;
    }
}
