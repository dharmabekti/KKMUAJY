<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Users\StoreRequest;
use Alert;
use Carbon\Carbon;
use App\User;
use App\Pkm;
use App\Prodi;
use App\Role;

class RegisterController extends Controller
{

    public function index()
    {
        return view('register.index');
    }

    public function store(StoreRequest $request)
    {
      try{
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->npm = $request->npm;
        $user->born_date = $request->born_date;
        $user->role_id = "PS"; // Peserta
        $user->email = $request->email;
        $user->username = $request->npm; // username default is npm
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->contact_number = $request->contact_number;
        $user->line_id = $request->line_id;
        $user->status = 1;
        $user->save();

        $pengusul = User::orderBy('id')->where('npm', $request->npm)->first();
        $proposal = new Pkm();
        $proposal->bidang_pkm = 1;
        $proposal->id_pengusul = $pengusul->id;
        $proposal->status = 0;
        $tahun = Carbon::now()->format('Y');
        $proposal->tahun_pengajuan = $tahun;
        $proposal->tahun_pendanaan = $tahun + 1;
        $proposal->save();

        Alert::success('Terima Kasih Telah Melakukan Registrasi. Silahkan Login untuk Melengkapi Data Diri...!', 'Register Sukses')->persistent('Close');
        return redirect()->route('login.index');

      }catch(\exception $e){
        Alert::error('Gagal Mendaftar', 'Error...!')->persistent('Close');
        return redirect()->route('login.index');
      }

    }

    public function index_pengguna()
    {
        $pengguna = User::orderBy('id')->whereNotIn('role_id',['PS'])->where('status', 1)->paginate(10);
        $prodi = Prodi::all();
        $role = Role::all();

        $list = ['pengguna', 'prodi', 'role'];
        return view('pengguna.index', compact($list));
    }

    public function detail_pengguna($id)
    {
        $pengguna = User::FindorFail($id);
        return view('pengguna.detail', compact('pengguna'));
    }

    public function store_pengguna(Request $request)
    {
      try{
        $pengguna = new User();
        $pengguna->first_name = $request->first_name;
        $pengguna->last_name = $request->last_name;
        $pengguna->npm = $request->npm;
        $pengguna->prodi_id = $request->prodi;
        $pengguna->role_id = $request->role;
        $pengguna->username = $request->npm; // username default is npm
        $pengguna->password = bcrypt($request->npm);
        $pengguna->status = 1;
        $pengguna->save();

        Alert::success('Pengguna Baru Berhasil Ditambahkan.', 'Register Sukses')->persistent('Close');
        return redirect()->route('pengguna.index');

      }catch(\exception $e){
        Alert::error('Gagal Menambahkan', 'Error...!')->persistent('Close');
        return redirect()->route('pengguna.index');
      }
    }

    public function edit_pengguna($id)
    {
        $pengguna = User::FindorFail($id);
        $prodi = Prodi::all();
        $role = Role::all();

        $list = ['pengguna', 'prodi', 'role'];
        return view('pengguna.update', compact($list));
    }

    public function update_pengguna(Request $request, $id)
    {
      try{
        $pengguna = User::FindorFail($id);
        $pengguna->first_name = $request->first_name;
        $pengguna->last_name = $request->last_name;
        $pengguna->npm = $request->npm;
        $pengguna->prodi_id = $request->prodi;
        $pengguna->born_date = $request->born_date;
        $pengguna->gender = $request->gender;
        $pengguna->role_id = $request->role;
        $pengguna->email = $request->email;
        $pengguna->address = $request->address;
        $pengguna->contact_number = $request->contact_number;
        $pengguna->line_id = $request->line_id;
        $pengguna->status = 1;
        $pengguna->save();

        Alert::success('Data Pengguna Berhasil Diperbarui', 'Sukses')->persistent('Close');
        return redirect()->route('pengguna.index');

      }catch(\exception $e){
        Alert::error('Gagal Memperbarui', 'Error...!')->persistent('Close');
        return redirect()->route('pengguna.index');
      }
    }

    public function reset_password_pengguna($id)
    {
      $pengguna = User::FindOrFail($id);
      $pengguna->password = bcrypt($pengguna->npm);
      $pengguna->save();

      Alert::success('Password Pengguna Berhasil Direset ke NPM / NIDN', 'SUKSES')->persistent('Close');
      return redirect()->route('pengguna.index');
    }

    public function destroy_pengguna($id)
    {
        $pengguna = User::FindOrFail($id);
        $pengguna->status = 0;
        $pengguna->save();

        Alert::success('Pengguna Berhasil Dihapus', 'SUKSES')->persistent('Close');
        return redirect()->route('pengguna.index');
    }

}
