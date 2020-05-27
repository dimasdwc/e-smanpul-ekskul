<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\Models\Pelatih;
use App\Models\AbsensiPelatih;
use App\Models\AbsensiSiswa;
use App\Models\MasterSiswa;
use App\Models\MasterEkskul;
use App\Models\DetailPelatih;
use App\Models\EkskulSiswa;

use Illuminate\Http\Request;

class AbsensiPelatihController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {           
        $pelatih_id = Auth::user()->id;
        $tanggal = date("Y-m-d");
        $cek_absensi = AbsensiPelatih::where(['pelatih_id' => $pelatih_id, 'tanggal' => $tanggal])
                        ->first();
        $data_absensi = AbsensiPelatih::where('pelatih_id', $pelatih_id)
                        ->orderBy('tanggal', 'DESC')                        
                        ->get();                 
        if (is_null($cek_absensi)) {
            $info = array(
                'status' => "Anda belum mengisi abensi (Klik 'Absen Masuk')",
                'btnAbsenMasuk' => "",
                'btnAbsenKeluar' => "disabled",
                'catatan_absensi' => "disabled"
            );
        } elseif ($cek_absensi->jam_keluar == NULL) {
            $info = array(
                'status' => "Jangan lupa untuk absen keluar (Klik 'Absen Keluar')",
                'btnAbsenMasuk' => "disabled",
                'btnAbsenKeluar' => "",
                'catatan_absensi' => ""
            );
        } else {
            $info = array(
                'status' => "Terima Kasih, Anda telah menyelesaikan absensi hari ini",
                'btnAbsenMasuk' => "disabled",
                'btnAbsenKeluar' => "disabled",
                'catatan_absensi' => "disabled"
            );
        }
        return view('pelatih/absensi_pelatih/index', compact('data_absensi', 'info'));
    }

    public function getAbsenPelatih()
    {    
        $pelatih_id = Auth::user()->id;
        $dataAbsensi = AbsensiPelatih::where('pelatih_id', $pelatih_id)->get();
        return DataTables::of($dataAbsensi)
            ->addIndexColumn()            
            ->toJson();       
    }

    public function tambah(Request $request)
    {
        $pelatih_id = Auth::user()->id;
        $tanggal = date("Y-m-d");
        $jam_masuk = date("H:i:s");
        $jam_keluar = date("H:i:s");
        $catatan = $request->catatan_absensi;        
        $absensi = new AbsensiPelatih;        
        if (isset($request->btnAbsenMasuk)) {
            $cek_double = $absensi->where(['tanggal' => $tanggal, 'pelatih_id' => $pelatih_id])->count();
            if ($cek_double > 0) {
                return redirect()->back();
            }
                $absensi->create([
                    'pelatih_id' => $pelatih_id,
                    'tanggal' => $tanggal,
                    'jam_masuk' => $jam_masuk,                    
                    'catatan' => $catatan
                ]);     
                return redirect('pelatih/absensi')->with('sukses','Anda berhasil absen hari ini');           
            // }            
        } 
        elseif (isset($request->btnAbsenKeluar)) {
            $absensi->where(['tanggal' => $tanggal, 'pelatih_id' => $pelatih_id])
                ->update([                                              
                    'jam_keluar' => $jam_keluar,                    
                    'catatan' => $catatan
                ]);
                return redirect('pelatih/absensi')->with('sukses','Anda berhasil absen hari ini'); 
        }
    }
}
