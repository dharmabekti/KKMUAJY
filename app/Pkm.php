<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pkm extends Model
{
    protected $table = 'tbl_pkm';

    public function bidangpkm(){
      return $this->belongsTo('App\BidangPKM','bidang_pkm','id');
    }

    public function pengusul(){
      return $this->belongsTo('App\User','id_pengusul','id');
    }
}
