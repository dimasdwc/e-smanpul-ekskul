<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPelatih extends Model
{
    protected $table = 'detail_pelatih';
    protected $guarded = ['id'];

    public function pelatih()
    {
   	//setiap detail_pelatih dimiliki oleh user
   	return $this->belongsTo('App\User', 'id');
    }
    public function ekskul()
    {
   	//setiap ekskul dimiliki oleh user
   	return $this->belongsTo('App\Models\MasterEkskul', 'ekskul_id');
    }

}
