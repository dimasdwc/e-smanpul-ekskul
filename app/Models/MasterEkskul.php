<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterEkskul extends Model
{	
	protected $table = 'master_ekskul';
   protected $fillable = ['no_ekskul','nama_ekskul', 'tempat_latihan', 'rumpun_id', 'pembina_id', 'status', 'profil_singkat'];
   
   public function pelatih()
   {
   	return $this->hasOne('App\Models\DetailPelatih', 'ekskul_id');
   }

   public function ekskulrumpun()
   {
   	return $this->belongsTo('App\Models\EkskulRumpun', 'rumpun_id');
   }
}
