<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EkskulAnggota extends Model
{
   protected $table = 'ekskul_anggota';
   protected $fillable = ['siswa_id', 'ekskul_id', 'pelatih_id', 'status', 'catatan'];

   public function absensisiswa()
   {
   	return $this->hasMany('App\Models\AbsensiSiswa', 'ekskul_id');
   }

   public function siswa()
   {
   	return $this->hasMany('App\Models\MasterSiswa', 'id');
   }

   public function siswa_ekskul()
   {
   	return $this->belongsTo('App\Models\MasterSiswa', 'siswa_id');
   }
}
