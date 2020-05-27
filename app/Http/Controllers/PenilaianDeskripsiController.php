<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pelatih;
use App\Models\DetailPelatih;
use App\Models\PenilaianDeskripsi;

class PenilaianDeskripsiController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

   public function index()
   {
   	$pelatih_id = Auth::user()->id;
   	$data_pelatih = DetailPelatih::where('pelatih_id', $pelatih_id)->first();
   	$ekskul_id = $data_pelatih->ekskul_id;
   	$data_deskripsi = PenilaianDeskripsi::where('ekskul_id', $ekskul_id)->get();
   	return view('pelatih/deskripsi_nilai/index', compact('data_deskripsi'));
   }

	public function tambah(Request $request)
	{
	   $pelatih_id = Auth::user()->id;
   	$data_pelatih = DetailPelatih::where('pelatih_id', $pelatih_id)->first();
   	$ekskul_id = $data_pelatih->ekskul_id;
	   $deskripsi = new PenilaianDeskripsi;
	   $deskripsi->create([
        	'ekskul_id' => $ekskul_id,
        	'isi_deskripsi' => $request->deskripsi_penilaian,        
    	]);
	   return redirect('/pelatih/deskripsi')->with('sukses', 'Data deskripsi penilaian baru berhasil ditambahkan!');
	     
	}

	public function hapus($id)
  	{
    $data_deskripsi= PenilaianDeskripsi::find($id);
    $data_deskripsi->delete();
    return redirect('/pelatih/deskripsi')->with('sukses','Data berhasil dihapus!');
  	}
}
