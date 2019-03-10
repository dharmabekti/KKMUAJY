<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Pengusul\UploadRequest;
use Carbon\Carbon;
use File;
use Alert;
use App\BidangPKM;
use App\Prodi;
use App\Role;
use App\KategoriBerkas;

class PengaturanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $prodi = Prodi::orderBy('id')->paginate(5);
        $kategori_berkas = KategoriBerkas::orderBy('id')->paginate(6);
        $bidang_pkm = BidangPKM::orderBy('id')->paginate(10);
        $role = Role::orderBy('id')->paginate(10);

        return view('pengaturan.index', compact('prodi','bidang_pkm','kategori_berkas', 'role'));
    }

    public function aktifkan($id)
    {
        $aktif = BidangPKM::FIndorFail($id);
        if($aktif->status == 0)  $aktif->status = 1;
        else $aktif->status =0;

        $aktif->save();

        // Alert::success('Password Berhasil Direset', 'SUKSES')->persistent('Close');
        return redirect()->route('pengaturan.index');
    }

    public function store_berkas(Request $request)
    {
        $kategori_baru = new KategoriBerkas();
        $kategori_baru->nama_kategori = $request->nama_kategori;
        $kategori_baru->save();

        Alert::success('Kategori Berkas PKM Baru Berhasil Ditambahkan', 'SUKSES')->persistent('Close');
        return redirect()->route('pengaturan.index');
    }

    public function destroy_kategori($id)
    {
      $kategori_berkas = KategoriBerkas::FIndorFail($id);
      $kategori_berkas->delete();

      Alert::success('Kategori Berkas PKM Berhasil Dihapus', 'SUKSES')->persistent('Close');
      return redirect()->route('pengaturan.index');
    }

    public function store_prodi(Request $request)
    {
        $prodi_baru = new Prodi();
        $prodi_baru->prodi_name = $request->nama_prodi;
        $prodi_baru->fakultas_name = $request->nama_fakultas;
        $prodi_baru->singkatan = $request->singkatan;
        $prodi_baru->save();

        Alert::success('Prodi Baru Berhasil Ditambahkan', 'SUKSES')->persistent('Close');
        return redirect()->route('pengaturan.index');
    }

    public function destroy_prodi($id)
    {
      $prodi = Prodi::FIndorFail($id);
      $prodi->delete();

      Alert::success('Prodi Berhasil Dihapus', 'SUKSES')->persistent('Close');
      return redirect()->route('pengaturan.index');
    }

    public function store_role(Request $request)
    {
        $role_baru = new Role();
        $role_baru->role_id = $request->role_id;
        $role_baru->role_name = $request->nama_role;
        $role_baru->save();

        Alert::success('Role Baru Berhasil Ditambahkan', 'SUKSES')->persistent('Close');
        return redirect()->route('pengaturan.index');
    }

    public function destroy_role($id)
    {
      $role = Role::FIndorFail($id);
      $role->delete();

      Alert::success('Role Berhasil Dihapus', 'SUKSES')->persistent('Close');
      return redirect()->route('pengaturan.index');
    }

    public function profil()
    {
      $prodi = Prodi::all();
      return view('pengaturan.profil', compact('prodi'));
    }

}
