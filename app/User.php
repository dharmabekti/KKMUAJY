<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function prodi(){
      return $this->belongsTo('App\Prodi','prodi_id','id');
    }

    public function anggota(){
      return $this->hasMany('App\Anggota','id','id_pengusul');
    }

    public function role(){
      return $this->belongsTo('App\Role','role_id','role_id');
    }
}
