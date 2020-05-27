<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiSiswa extends Model
{
   protected $table = 'absensi_siswa';
   protected $fillable = ['tanggal', 'jam_absen', 'siswa_id', 'ekskul_id', 'pelatih_id', 'status'];

   public function master_siswa()
   {
   	return $this->belongsTo('App\Models\MasterSiswa', 'id');
   }

   public function master_ekskul()
   {
   	return $this->belongsTo('App\Models\MasterEkskul', 'id');
   }

   public function siswa_ekskul()
   {
      return $this->belongsTo('App\Models\MasterSiswa', 'siswa_id');
   }

   
}
