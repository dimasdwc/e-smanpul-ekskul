<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterSiswa extends Model
{
    protected $table = 'master_siswa';
    protected $guarded = ['id'];
    //protected $fillable = ['nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat'];

   public function absensisiswa()
   {
   	return $this->hasOne('App\Models\AbsensiSiswa', 'siswa_id');
   }

   public function kelas()
   {
    return $this->belongTo('App\Models\MasterKelas', 'kelas_id');
   }
}
