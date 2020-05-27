<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterKelas extends Model
{
   	protected $table = 'master_kelas';
   	protected $fillable = ['tingkat_id', 'jurusan_id', 'kelas'];   
	
	public function tingkat()
   	{
   		return $this->belongsTo('App\Models\MasterTingkat', 'tingkat_id');
   	}

   	public function jurusan()
   	{
   		return $this->belongsTo('App\Models\MasterJurusan', 'jurusan_id');
   	}   	
}
