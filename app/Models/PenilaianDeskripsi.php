<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenilaianDeskripsi extends Model
{
   protected $table = 'penilaian_deskripsi';
   protected $fillable = ['ekskul_id','isi_deskripsi'];
}
