<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiPelatih extends Model
{
    protected $table = 'absensi_pelatih';   
    protected $fillable = ['pelatih_id', 'tanggal', 'jam_masuk', 'jam_keluar', 'catatan'];

    public function absensi()
    {
    	return $this->belongsTo('App\Auth', 'pelatih_id');
    }
}
