<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelatih;
use App\Models\EkskulAnggota;
use App\Models\AbsensiSiswa;
use App\Models\MasterSiswa;
use App\Models\DetailPelatih;
use App\Models\TahunAjaran;
use App\Models\PenilaianDeskripsi;
use App\Models\Predikat;
use App\Models\PenilaianAnggota;
use App\Models\MasterKelas;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;

class DataAnggotaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  { 
    return view('pelatih/data_anggota/index', compact('anggota'));
  }

  public function tabel_anggota()
  {   
  	$pelatih_id = Auth::user()->id;
 		$data_anggota = EkskulAnggota::where('pelatih_id', $pelatih_id)->get();       	
  	return DataTables::of($data_anggota)
    	-> addColumn('nama_lengkap', function($d){	        		
        $data_anggota = EkskulAnggota::with('siswa_ekskul')->where('id', $d->id)->first();	            
        return $data_anggota->siswa_ekskul->nama_lengkap;
    	})
    	-> addColumn('jenis_kelamin', function($d){	        		
        $data_anggota = EkskulAnggota::with('siswa_ekskul')->where('id', $d->id)->first();	            
        return $data_anggota->siswa_ekskul->jenis_kelamin;
    	}) 
    	-> addColumn('kelas', function($d){	        		       
        $data_anggota = EkskulAnggota::with('siswa_ekskul')->where('id', $d->id)->first();
        $kelas_id = $data_anggota->siswa_ekskul->kelas_id;
        $kelas = MasterKelas::with('tingkat', 'jurusan')->where('id', $kelas_id)->first();
        return $data_kelas = $kelas->tingkat->tingkat.' '.$kelas->jurusan->jurusan.' '.$kelas->kelas;
    	}) 	
    	-> addColumn('detail', function($d){	        		
       return '<a href="/pelatih/'.$d->siswa_id.'/detail-anggota" class="btn btn-success btn-sm ">Detail</a>'
        ;
    	}) 
    	->addIndexColumn()
    	->rawColumns(['nama_lengkap','jenis_kelamin','kelas','detail'])
    	->toJson();
   }

  public function detail($siswa_id)
  {	    
 	  $pelatih_id = Auth::user()->id;
    $data_anggota = EkskulAnggota::with('siswa_ekskul')->where('siswa_id', $siswa_id)->first();   
    $data_absen_anggota = AbsensiSiswa::where('siswa_id', $siswa_id)
    									->where('pelatih_id', $pelatih_id)
    									->get();    
    $kelas_id = $data_anggota->siswa_ekskul->kelas_id;
    $kelas = MasterKelas::with('tingkat', 'jurusan')->where('id', $kelas_id)->first();
    $kelas_siswa = $kelas->tingkat->tingkat.' '.$kelas->jurusan->jurusan.' '.$kelas->kelas;
    return view('pelatih/data_anggota/detail', compact('data_anggota', 'kelas_siswa', 'data_absen_anggota'));
  }

  public function getDataAnggotaBaru()
  {    
    $data_siswa = MasterSiswa::all();
    return DataTables::of($data_siswa)
    ->addColumn('kelas', function($d){        
        $kelas = MasterKelas::with('tingkat', 'jurusan')->where('id', $d->kelas_id)->first();
        return $kelas->tingkat->tingkat.' '.$kelas->jurusan->jurusan.' '.$kelas->kelas;
      })
    ->addColumn('aksi', function($d){           
        return '
        <a href="/pelatih/'.$d->id.'/tambah-anggota" class="btn btn-success btn-sm ">Pilih</a>                
        ';            
    })        
    ->rawColumns(['kelas','aksi'])
    ->toJson();               
  }

  public function tambah_anggota($id)
  {
    $pelatih_id = Auth::user()->id; //ambil pelatih ID
    //$siswa = MasterSiswa::where('id', $id)->first();  
    $dataPelatih = DetailPelatih::where('pelatih_id', $pelatih_id)->first(); 
    $ekskul_id = $dataPelatih->ekskul->id; //ambil Ekskul ID
    $dataAnggota = new EkskulAnggota;
    $dataAnggota->create([
        'siswa_id' => $id,
        'pelatih_id' => $pelatih_id,
        'ekskul_id' => $ekskul_id,
        'status' => 'Aktif',
    ]);     
    return redirect('pelatih/anggota')->with('sukses','Anda berhasil menambahkan anggota baru');
  }

  public function getRiwayatAbsensi($siswa_id)
    {        
        $pelatih_id = Auth::user()->id;
        $dataAbsensi = AbsensiSiswa::where('siswa_id', $siswa_id)
                      ->where('pelatih_id', $pelatih_id)
                      ->get(); 
        
        return DataTables::of($dataAbsensi)
          ->addColumn('aksi', function($d){              
          return '                                  
                  <button type="submit" name="btnStatus" value="Tidak Hadir" class="btn btn-danger btn-sm d-inline">Hapus</button>
                  ';
          })         
          ->addIndexColumn()
          ->rawColumns(['aksi'])
          ->toJson();
    }

  public function getRiwayatPenilaian($siswa_id)
  {
    $pelatih_id = Auth::user()->id;
    $pelatih_ekskul = DetailPelatih::with('ekskul')->where('pelatih_id', $pelatih_id)->first();  
    $ekskul_id = $pelatih_ekskul->ekskul_id;    
    $data_penilaian = PenilaianAnggota::where('siswa_id', $siswa_id)
                                      ->where('ekskul_id', $ekskul_id)
                                      ->get();

    return DataTables::of($data_penilaian)
      -> addColumn('nama_lengkap', function($d){              
        $data_anggota = EkskulAnggota::with('siswa_ekskul')->where('siswa_id', $d->siswa_id)->first();     
        return $data_anggota->siswa_ekskul->nama_lengkap;
      })
      -> addColumn('kelas', function($d){
        $data_anggota = EkskulAnggota::with('siswa_ekskul')->where('siswa_id', $d->siswa_id)->first();
        $kelas_id = $data_anggota->siswa_ekskul->kelas_id;
        $kelas = MasterKelas::with('tingkat', 'jurusan')->where('id', $kelas_id)->first();
        return $data_kelas = $kelas->tingkat->tingkat.' '.$kelas->jurusan->jurusan.' '.$kelas->kelas;
      })
      -> addColumn('tahun_ajaran', function($d){              
        $data_anggota = PenilaianAnggota::with('tahun_ajaran')->where('tahun_ajaran_id', $d->tahun_ajaran_id)->first();
        $tahun_ajaran = $data_anggota->tahun_ajaran->tahun_ajaran;
        $semester = $data_anggota->tahun_ajaran->semester;
        return $tahun_ajaran."<br><b>".$semester."</b>";
      })
      -> addColumn('predikat', function($d){              
        $data_predikat = Predikat::where('id', $d->predikat_id)->first();
        $predikat = $data_predikat->predikat;
        $keterangan = $data_predikat->keterangan;
        return $predikat."<br><b>".$keterangan."</b>";
      })
      -> addColumn('aksi', function($d){              
       return '<a href="/pelatih/'.$d->id.'/hapus-penilaian" class="btn btn-danger btn-sm ">Hapus</a>'
        ;
      })
      ->addIndexColumn()
      ->rawColumns(['nama_lengkap', 'kelas', 'tahun_ajaran', 'predikat', 'aksi'])
      ->toJson();     
  }
}
