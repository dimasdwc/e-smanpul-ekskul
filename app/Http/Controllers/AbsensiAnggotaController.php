<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\Models\AbsensiSiswa;
use App\Models\MasterSiswa;
use App\Models\MasterEkskul;
use App\Models\DetailPelatih;
use App\Models\EkskulSiswa;
use App\Models\EkskulAnggota;
use App\Models\MasterKelas;

use Illuminate\Http\Request;

class AbsensiAnggotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
   	    $pelatih_id = Auth::user()->id;
        $dataEkskul = MasterEkskul::all();
        $dataAnggota = EkskulAnggota::with('siswa_ekskul')->where('pelatih_id', $pelatih_id)->get();
        $dataPelatih = DetailPelatih::where('pelatih_id', $pelatih_id)->first();        
        $dataAbsensi = AbsensiSiswa::with('siswa_ekskul')->where('pelatih_id', $pelatih_id)
                        ->orderBy('tanggal', 'desc')
                        ->paginate(20);
        return view('pelatih.absensi_anggota.index', compact('dataSiswa', 'dataEkskul', 'dataPelatih', 'dataAnggota', 'dataAbsensi'));
    }

    public function tabel_absensi_anggota()
    {   
        $pelatih_id = Auth::user()->id;
        $data_anggota = EkskulAnggota::where('pelatih_id', $pelatih_id)->get();         
        
        return DataTables::of($data_anggota)
            ->addColumn('nama_lengkap', function($d){                  
            $data_anggota = EkskulAnggota::with('siswa_ekskul')->where('id', $d->id)->first();
            return $data_anggota->siswa_ekskul->nama_lengkap;
            })
            ->addColumn('kelas', function($d){                 
            $data_anggota = EkskulAnggota::with('siswa_ekskul')->where('id', $d->id)->first();
            $kelas_id = $data_anggota->siswa_ekskul->kelas_id;
            $kelas = MasterKelas::with('tingkat', 'jurusan')->where('id', $kelas_id)->first();
            return $data_kelas = $kelas->tingkat->tingkat.' '.$kelas->jurusan->jurusan.' '.$kelas->kelas;
            })
            ->addColumn('aksi', function($d){              
            return '
                <form action="/pelatih/absensi-anggota" method="POST">
                     '.csrf_field().'
                    <input type="hidden" name="siswa_id" value='.$d->siswa_id.'>
                    <input type="hidden" name="ekskul_id" value='.$d->ekskul_id.'>
                    <div class="d-inline flex">
                        <button type="submit" name="btnStatus" value="Hadir" class="btn btn-success btn-sm d-inline">H</button>
                        <button type="submit" name="btnStatus" value="Tidak Hadir" class="btn btn-warning btn-sm d-inline">TH</button>
                    </div>
                </form> ';
            })         
            ->addIndexColumn()
            ->rawColumns(['nama_lengkap','kelas','aksi'])
            ->toJson();
        // ->make(true);
    }

    public function tabel_riwayat_absensi_anggota()
    {
        $pelatih_id = Auth::user()->id;
        $dataAbsensi = AbsensiSiswa::where('pelatih_id', $pelatih_id)->get();
        
        return DataTables::of($dataAbsensi)
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
            ->addColumn('aksi', function($d){              
            return '                                  
                    <button type="submit" name="btnStatus" value="Tidak Hadir" class="btn btn-danger btn-sm d-inline">Hapus</button>
                    ';
            })         
            ->addIndexColumn()
            ->rawColumns(['nama_lengkap','kelas','aksi'])
            ->toJson();
    }

    public function tambah(Request $request)
    {
        //return$request;
        $pelatih_id = Auth::user()->id;
        $siswa_id = $request->siswa_id;
        $ekskul_id = $request->ekskul_id;
        $tanggal = date("Y-m-d");
        $waktu = date("H:i:s");
        $status = $request->btnStatus;
        $absensi_anggota = new AbsensiSiswa;

        $absensi_anggota->create([
            'pelatih_id' => $pelatih_id,
            'siswa_id' => $siswa_id,
            'ekskul_id' => $ekskul_id,
            'tanggal' => $tanggal,
            'jam_absen' => $waktu,
            'status' => $status,
        ]);
          return redirect('pelatih/absensi-anggota')->with('sukses','Berhasil melakukan absensi anggota');
    }
}
