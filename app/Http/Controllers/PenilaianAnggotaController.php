<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelatih;
use App\Models\EkskulAnggota;
use App\Models\AbsensiSiswa;
use App\Models\DetailPelatih;
use App\Models\TahunAjaran;
use App\Models\PenilaianDeskripsi;
use App\Models\Predikat;
use App\Models\PenilaianAnggota;
use App\Models\MasterKelas;
use Yajra\Datatables\Datatables;

class PenilaianAnggotaController extends Controller
{
    public function __construct()
  	{
    	$this->middleware('auth');
  	}
  
	public function index()
	{
		return view('pelatih/penilaian/index');
	}

  	public function get_penilaian_anggota()
  	{
   		$pelatih_id = Auth::user()->id;
		  $data_anggota = EkskulAnggota::where('pelatih_id', $pelatih_id)->get();       	
   		return DataTables::of($data_anggota)
    	->addColumn('nama_lengkap', function($d){	        		
        $data_anggota = EkskulAnggota::with('siswa_ekskul')->where('siswa_id', $d->siswa_id)->first();	
        return $data_anggota->siswa_ekskul->nama_lengkap;
    	})

    	->addColumn('jenis_kelamin', function($d){
        $data_anggota = EkskulAnggota::with('siswa_ekskul')->where('siswa_id', $d->siswa_id)->first();
        return $data_anggota->siswa_ekskul->jenis_kelamin;
    	})

    	->addColumn('kelas', function($d){       
        $data_anggota = EkskulAnggota::with('siswa_ekskul')->where('siswa_id', $d->siswa_id)->first();        
        $kelas_id = $data_anggota->siswa_ekskul->kelas_id;
        $kelas = MasterKelas::with('tingkat', 'jurusan')->where('id', $kelas_id)->first();
        return $data_kelas = $kelas->tingkat->tingkat.' '.$kelas->jurusan->jurusan.' '.$kelas->kelas;
    	})

    	->addColumn('aksi', function($d){	        		
       return '<a href="/pelatih/'.$d->siswa_id.'/penilaian-anggota" class="btn btn-success btn-sm ">Pilih</a>';
    	})  

    	->addIndexColumn()
    	->rawColumns(['nama_lengkap','jenis_kelamin','kelas','aksi'])
    	->toJson();
  	}

  	public function tambah($id)
  	{
	    $data_pelatih = Auth::user();
	   	$data_anggota = EkskulAnggota::with('siswa_ekskul')->where('siswa_id', $id)->first();  
	    $data_ekskul = DetailPelatih::with('ekskul')->where('pelatih_id', $data_pelatih->id)->first();
	    $tahun_ajaran = TahunAjaran::where('status', 'Aktif')->first();
	    $data_deskripsi = PenilaianDeskripsi::where('ekskul_id', $data_ekskul->ekskul_id)->get();
	    $data_predikat = Predikat::get();

	    /* Menampilkan kelas siswa terdiri atas tingkat-kelas-jurusan */
      $kelas_id = $data_anggota->siswa_ekskul->kelas_id;
      $kelas = MasterKelas::with('tingkat', 'jurusan')->where('id', $kelas_id)->first();
      $kelas_siswa = $kelas->tingkat->tingkat.' '.$kelas->jurusan->jurusan.' '.$kelas->kelas;

   	
   		return view('pelatih/penilaian/tambah', compact('data_anggota', 'kelas_siswa', 'data_pelatih', 'data_ekskul', 'tahun_ajaran', 'data_deskripsi', 'data_predikat'));
  	}

  	public function store(Request $request)
  	{
      	$data_pelatih = Auth::user();
      	// $data_anggota = EkskulAnggota::with('siswa_ekskul')->where('siswa_id', $id)->first();             
      	$data_ekskul = DetailPelatih::with('ekskul')->where('pelatih_id', $data_pelatih->id)->first();
        $data_ekskul->ekskul->id;
     	  $tahun_ajaran = TahunAjaran::where('status', 'Aktif')->first();
      	$penilaian_anggota = new PenilaianAnggota;
      	// return$request->all();
      	$penilaian_anggota->create([          
          	'siswa_id' => $request->siswa_id,
          	'ekskul_id' => $data_ekskul->ekskul->id,
          	'tahun_ajaran_id' => $tahun_ajaran->id,
          	'deskripsi' => $request->deskripsi_penilaian,
          	'predikat_id' => $request->predikat,
        ]);
        return redirect('pelatih/penilaian')->with('sukses','Berhasil melakukan tambah penilaian anggota');
  	}

  	public function getRiwayatRenilaian()
  	{
	    $pelatih_id = Auth::user()->id;
	    $pelatih_ekskul = DetailPelatih::with('ekskul')->where('pelatih_id', $pelatih_id)->first();
	    $ekskul_id = $pelatih_ekskul->ekskul_id;    
	    $data_penilaian = PenilaianAnggota::with('master_siswa', 'master_ekskul', 'tahun_ajaran')->where('ekskul_id', $ekskul_id)->get();

	    return DataTables::of($data_penilaian)
      ->addColumn('nama_lengkap', function($d){              
        $data_anggota = EkskulAnggota::with('siswa_ekskul')->where('siswa_id', $d->siswa_id)->first();            
      return $data_anggota->siswa_ekskul->nama_lengkap;
    	})
    	->addColumn('kelas', function($d){              
      	$data_anggota = EkskulAnggota::with('siswa_ekskul')->where('siswa_id', $d->siswa_id)->first();        
        $kelas_id = $data_anggota->siswa_ekskul->kelas_id;
        $kelas = MasterKelas::with('tingkat', 'jurusan')->where('id', $kelas_id)->first();
        return $data_kelas = $kelas->tingkat->tingkat.' '.$kelas->jurusan->jurusan.' '.$kelas->kelas;      	
    	})

    	->addColumn('tahun_ajaran', function($d){              
        $data_anggota = PenilaianAnggota::with('tahun_ajaran')->where('tahun_ajaran_id', $d->tahun_ajaran_id)->first();
        $tahun_ajaran = $data_anggota->tahun_ajaran->tahun_ajaran;
        $semester = $data_anggota->tahun_ajaran->semester;
        return $tahun_ajaran."<br><b>".$semester."</b>";
    	})

    	->addColumn('predikat', function($d){              
      	$data_predikat = Predikat::where('id', $d->predikat_id)->first();
      	$predikat = $data_predikat->predikat;
      	$keterangan = $data_predikat->keterangan;
        	return $predikat."<br><b>".$keterangan."</b>";
     	})

     	->addColumn('aksi', function($d){              
       		return '<a href="/pelatih/'.$d->id.'/hapus-penilaian" class="btn btn-danger btn-sm ">Hapus</a>';
      })
	    ->addIndexColumn()
	    ->rawColumns(['nama_lengkap', 'kelas', 'tahun_ajaran', 'predikat', 'aksi'])
	    ->toJson();     
  	}

 	 public function hapus($id)
  	{
	    $data_penilaian = PenilaianAnggota::find($id);
	    $data_penilaian->delete();
	    return redirect('/pelatih/penilaian')->with('sukses','Data berhasil dihapus!');
  	}
}
