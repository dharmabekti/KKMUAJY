<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = 'tbl_berkas_pkm';

    public function kat_berkas(){
      return $this->belongsTo('App\KategoriBerkas','kategori','id');
    }
}
