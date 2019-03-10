<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;

class DashboardController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $user = User::all();
    $peserta = User::orderBy('id')->where('role_id','PS')->get();
    if(Auth::user()->status == 1 && Auth::user()->role_id == "PS")
    {
      return view('home_peserta');
    }
    else
    {
      return view('home', compact('user', 'peserta'));
    }
  }
}
