<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPembina extends Model
{
    protected $table = 'master_pembina';
    protected $fillable = ['nama_pembina', 'jabatan', 'jenis_kelamin', 'no_telepon'];

    public function ekskul_pembina()
   	{
   		return $this->hasOne('App\Models\MasterEkskul', 'pembina_id');
   	}
}
