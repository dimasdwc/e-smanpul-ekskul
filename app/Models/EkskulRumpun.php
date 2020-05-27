<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EkskulRumpun extends Model
{
   protected $table = 'ekskul_rumpun';
   protected $fillable = ['nama_rumpun'];
   
   public function masterekskul()
   {
   	// Berhasil -  rumpun ekskul memiliki banyak ekskul
   	return $this->hasMany('App\Models\MasterEkskul', 'rumpun_id');
   }
}
