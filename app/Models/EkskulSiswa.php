<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EkskulSiswa extends Model
{
   protected $table = 'ekskul_siswa';
   protected $fillable = ['siswa_id', 'ekskul_id', 'catatan'];
     
   public function absensisiswa()
   {
   	return $this->hasMany(AbsensiSiswa::class);
   }
}
