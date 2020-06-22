<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Models\DetailPelatih;
use App\Models\AbsensiPelatih;
use App\Models\EkskulAnggota;

use App\User;

class DataPelatihController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$data_pelatih = User::with('detail_pelatih')->get();
    	return view('waka/pelatih/index', compact('data_pelatih'));
    }

    public function get_data_pelatih()
    {
    	$data_pelatih = User::with('detail_pelatih')->where('jabatan', 2)->get();
    	return DataTables::of($data_pelatih)
    	 ->addColumn('status', function($d){                            
            $status = $d->status;

			if ($status == "Aktif") {
		   		return "<span class='badge badge-pill badge-success'>$status</span>";
		   	} else {
		   		return "<span class='badge badge-pill badge-danger'>$status</span>";
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
    	->rawColumns(['status', 'aksi'])
    	->toJson();
    }

    public function tambah(Request $request)
    {    	
	    $nama_pelatih = $request->inputNamaPelatih;
	    $jenis_kelamin = $request->selectJenisKelamin;
	    $no_telepon = $request->inputNoTelepon;
	    $username = $request->inputUsername;
	    $password = $request->inputPassword;
	    // $data_pelatih = new User;
	    $data_pelatih = User::create([
	    	'role_id' => 2,
	    	'name' => $nama_pelatih,
	    	'jenis_kelamin' => $jenis_kelamin,
	    	'no_telepon' => $no_telepon,
	    	'username' => $username,
	    	'password' => Hash::make($password),
	    	'jabatan' => 2,
	    	'status' => 'Aktif',
	    	// 'status' => 'Aktif',
	    ]);	    
	    $id = $data_pelatih->id;
	    $detail_pelatih = DetailPelatih::create([
	    	'pelatih_id' => $id,
	    ]);
	    return redirect('waka/pelatih')->with('sukses', 'Anda berhasil menambahkan data baru');
    }

    public function detail($id)
    {
    	$pertemuan = AbsensiPelatih::where('pelatih_id', $id)->count();
    	$anggota = EkskulAnggota::where('pelatih_id', $id)->count();
    	$pelatih = User::with('detail_pelatih')->where('id', $id)->first();
    	return view('waka/pelatih/detail', compact('pelatih','pertemuan','anggota'));
    }

    public function getAbsenPelatih($id)
    {    
        $dataAbsensi = AbsensiPelatih::where('pelatih_id', $id)->get();
        return DataTables::of($dataAbsensi)
            ->addIndexColumn()
            ->toJson();     
    }
}
