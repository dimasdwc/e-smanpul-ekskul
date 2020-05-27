<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianAnggota extends Model
{
   protected $table = 'penilaian_anggota';
   protected $fillable = ['siswa_id','ekskul_id','tahun_ajaran_id','deskripsi','predikat_id'];

   public function master_siswa()
   {
   	return $this->belongsTo('App\Models\MasterSiswa', 'siswa_id');
   }

   public function master_ekskul()
   {
   	return $this->belongsTo('App\Models\MasterEkskul', 'ekskul_id');
   }

   public function tahun_ajaran()
   {
   	return $this->belongsTo('App\Models\TahunAjaran', 'tahun_ajaran_id');
   }

}
