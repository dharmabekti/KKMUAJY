<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Pengusul\UploadRequest;
use Carbon\Carbon;
use File;
use Alert;
use App\User;
use App\Prodi;
use App\Anggota;
use App\BidangPKM;
use App\Pkm;

class PengusulController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id_pengusul = Auth::User()->id;
        $prodi = Prodi::all();
        $bidang_pkm = BidangPKM::orderBy('id')->where('status',1)->get();
        //$anggota = Anggota::orderBy('id')->where('id_pengusul', '')->get();
        $proposal = Pkm::orderBy('id')->where('id_pengusul', $id_pengusul)->paginate(5);
        $proposal2 = Pkm::orderBy('id')->where('id_pengusul', $id_pengusul)->first();
        $tgl = Carbon::now()->format('Y');

        $cek_proposal = Pkm::orderBy('id')->where('id_pengusul', $id_pengusul)
                      ->where('tahun_pengajuan', $tgl)
                      ->where('tahun_pendanaan', $tgl+1)->first();

        if(!empty($proposal2)){
          $anggota = Anggota::orderBy('id')->where('id_proposal', $proposal2->id)->paginate(5);
        }
        else {
          $anggota = Anggota::orderBy('id')->where('id_proposal', 0)->paginate(5);
        }
        $list = ['prodi', 'bidang_pkm', 'proposal', 'proposal2', 'cek_proposal', 'anggota'];
        return view('pengusul.index', compact($list));
    }

    public function store(Request $request)
    {
        $pengusul = User::FindOrFail(Auth::User()->id);
        $pengusul->first_name = $request->first_name;
        $pengusul->last_name = $request->last_name;
        $pengusul->npm = $request->npm;
        $pengusul->prodi_id = $request->prodi;
        $pengusul->gender = $request->gender;
        $pengusul->born_date = $request->born_date;
        $pengusul->address = $request->address;
        $pengusul->username = $request->username;
        $pengusul->email = $request->email;
        $pengusul->contact_number = $request->contact_number;
        $pengusul->line_id = $request->line_id;
        $pengusul->save();

        Alert::success('Identitas Pengusul Telah Diperbarui', 'SUKSES')->persistent('Close');
        if(Auth::User()->role_id == "PS")
        {
          return redirect()->route('pengusul.index');
        }
        else {
          return redirect()->route('pengaturan.index');
        }
    }

    public function input_bidang_pkm(Request $request)
    {
      $proposal = new Pkm();
      $proposal->bidang_pkm = $request->bidang_pkm;
      $proposal->id_pengusul = Auth::User()->id;
      $proposal->status = 0;
      $proposal->tahun_pengajuan = $request->tahun_pengajuan;
      if($request->bidang_pkm == 6 || $request->bidang_pkm == 7){
        $proposal->tahun_pendanaan = $request->tahun_pengajuan;
      }
      else{
        $proposal->tahun_pendanaan = $request->tahun_pendanaan;
      }

      $cek_proposal = Pkm::orderBy('id')->where('id_pengusul', Auth::User()->id)
                    ->where('tahun_pengajuan', $request->tahun_pengajuan)
                    ->where('tahun_pendanaan', $request->tahun_pendanaan)->first();

      if(!empty($cek_proposal)){
        Alert::warning('Hanya Dapat Mengambil 1 Bidang', 'PERINGATAN')->persistent('Close');
        return redirect()->route('pengusul.index');
      }
      else {
        $proposal->save();
        Alert::success('Bidang PKM Telah Dimasukkan', 'SUKSES')->persistent('Close');
        return redirect()->route('pengusul.index');
      }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $proposal = Pkm::FindOrFail($id);
        $proposal->bidang_pkm = $request->bidang_pkm;
        $proposal->judul_pkm = $request->judul_pkm;
        $proposal->save();

        Alert::success('Bidang PKM Telah Diperbarui', 'SUKSES')->persistent('Close');
        return redirect()->route('pengusul.index');
    }

    public function upload(UploadRequest $request, $id)
    {
        $proposal = Pkm::FindOrFail($id);
        $bidang_pkm = BidangPKM::FindOrFail($proposal->bidang_pkm);
        $pengusul = User::FindOrFail($proposal->id_pengusul);

        $path = 'uploads/PKM/Pengajuan ' . $proposal->tahun_pengajuan . ' - Pendanaan ' . $proposal->tahun_pendanaan . '/' . $bidang_pkm->singkatan . '/' ;   // lokasi penyimpanan folder
        if(!File::exists($path))  // membuat folder jika belum tersedia
        {
            File::makeDirectory($path, 0777, true, true);
        }

        if(File::exists($path))
        {
            if($request->hasFile('filePKM'))
            {
              if(isset($proposal->file_pkm))
              {
                File::delete($proposal->file_pkm);
              }

              $file = Input::file('filePKM');
              $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
              $name = $bidang_pkm->singkatan . ' _ ' . $pengusul->npm . '.' . $extension;

              $proposal->file_pkm = $path . $name;
              $file->move($path, $name);
            }
        }
        $proposal->save();

        Alert::success('Proposal Berhasil Diupload', 'SUKSES')->persistent('Close');
        return redirect()->route('pengusul.index');
    }

    public function store_anggota(Request $request)
    {
        $id_pengusul = Auth::User()->id;

        $anggota = new Anggota();
        $anggota->id_pengusul = $id_pengusul;
        $anggota->id_proposal = $request->id_proposal;
        $anggota->fullname = $request->fullname;
        $anggota->npm = $request->npm;
        $anggota->prodi_id = $request->prodi;
        $anggota->status = 1;

        $cek_anggota = Anggota::orderBy('id')->where('id_pengusul',$id_pengusul)->where('id_proposal', $request->id_proposal)->get();
        if($cek_anggota->count() < 4)
          $anggota->save();

        Alert::success('Anggota Baru Telah Ditambahkan', 'SUKSES')->persistent('Close');
        return redirect()->route('pengusul.index');
    }

    public function destroy($id)
    {
        $anggota = Anggota::FindOrFail($id);
        $temp = $anggota->fullname;
        $anggota->delete();

        Alert::error('Anggota: "' . $temp . '" Berhasil Dihapus' , 'SUKSES')->persistent('Close');
        return redirect()->route('pengusul.index');
    }

    public function store_dosen(Request $request)
    {
        $proposal = Pkm::FindOrFail($request->id_proposal);
        $proposal->dosen_pembimbing = $request->nama_dosen;
        $proposal->nidn = $request->nidn;
        $proposal->prodi_id = $request->prodi;
        $proposal->alamat = $request->alamat;
        $proposal->email = $request->email;
        $proposal->no_telp = $request->no_telp;
        $proposal->save();

        Alert::success('Identitas Dosen Telah Diperbarui', 'SUKSES')->persistent('Close');
        return redirect()->route('pengusul.index');
    }

    public function readfile($id)
    {
        $proposal = Pkm::FindOrFail($id);
        $path = $proposal->file_pkm;
        if(File::exists($path))  // mengecek folder
        {
          return response()->download($path);
        }
        else {
          return response()->view('exception.filenotfound', [], 404);
        }
    }

    public function simbelmawa()
    {
      return view('pengusul.simbelmawa');
    }

    public function profil()
    {
      return view('pengusul.profil');
    }

    public function reset_password()
    {
      $peserta = User::FindOrFail(Auth::User()->id);
      $peserta->password = bcrypt($request->password);
      $peserta->save();

      Alert::success('Password Berhasil Direset', 'SUKSES')->persistent('Close');
      return redirect()->route('pengusul.profil');
    }
}
