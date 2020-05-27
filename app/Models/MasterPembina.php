<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPembina extends Model
{
    protected $table = 'master_pembina';
    protected $fillable = ['nip','nama_pembina', 'jabatan'];

    public function ekskul_pembina()
   	{
   		return $this->hasOne('App\Models\MasterEkskul', 'pembina_id');
   	}
}
