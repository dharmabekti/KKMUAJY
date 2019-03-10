<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'tbl_anggota';

    public function prodi(){
      return $this->belongsTo('App\Prodi','prodi_id','id');
    }

    public function pengusul(){
      return $this->belongsTo('App\User','id_pengusul','id');
    }
}
