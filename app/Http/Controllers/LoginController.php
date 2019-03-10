<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use File;
use Alert;
use App\User;
use App\Berkas;

class LoginController extends Controller
{
    public function home()
    {
      $ketentuan = Berkas::orderBy('id')->where('kategori', 0)->first();
      if(empty($ketentuan)){
        $ketentuan_temp = "";
      }
      else {
        $ketentuan_temp = $ketentuan->keterangan;
      }

      $pedoman = Berkas::orderBy('id')->where('kategori', 4)->first();
      if(empty($pedoman)){
        $pedoman_temp = "";
      }
      else {
        $pedoman_temp = $pedoman->nama_file;
      }
      return view('welcome', compact('ketentuan_temp','pedoman_temp'));
    }

    public function index()
    {
      $pedoman = Berkas::orderBy('id')->where('kategori', 4)->first();
      return view('login', 'pedoman');
    }

    public function login()
    {
      if(Auth::check()) {
        return redirect()->route('dashboard');
        // echo "Anda Telah Login";
      }
      else {
        return view('login');
      }
    }

    public function dologin(Request $request)
    {
      $user_data = $request->except('_token');

      if(Auth::attempt($user_data))
      {
        return redirect()->route('dashboard');
        // echo "Anda Telah Login";
      }
      else
      {
        Auth::logout();
        // return redirect()->route('login.index')->with('msg', 'Username atau Password Salah..!');
        Alert::error('Username atau Password Salah', 'Peringatan!')->persistent('Close');
        return redirect()->route('login.index');
      }
    }

    public function Logout()
    {
      if(Auth::check()) {
        Auth::logout();
        Alert::success('Terima Kasih...')->persistent('Close');
        return redirect()->route('login.home');
      }
      else {
        return view('login');
      }
    }

    public function download_pedoman()
    {
        $pedoman = Berkas::orderBy('id')->where('kategori', 4)->first();
        if(!empty($pedoman))
        {
            $path = $pedoman->lokasi;
            if(File::exists($path))  // mengecek folder
            {
              return response()->file($path);
            }
            else {
              return response()->view('exception.filenotfound', [], 404);
            }
        }
        else {
          return response()->view('exception.filenotfound', [], 404);
        }

    }
}
