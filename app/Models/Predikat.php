<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Predikat extends Model
{
   protected $table = 'detail_predikat';
   protected $fillable = ['predikat', 'keterangan'];
}
