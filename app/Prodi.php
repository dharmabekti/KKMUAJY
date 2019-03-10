<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'tbl_prodi';

    public function prodi(){
      return $this->belongsTo('App\Prodi','prodi_id','id');
    }
}
