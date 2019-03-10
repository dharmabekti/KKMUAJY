<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Http\Requests\Pengusul\UploadRequest;
use File;
use Alert;
use App\User;
use App\Prodi;
use App\Anggota;
use App\BidangPKM;
use App\Pkm;

class PesertaController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }

    public function index()
    {
        $tgl = Carbon::now()->format('Y');
        $tahun = Pkm::orderBy('tahun_pengajuan','desc')->select('tahun_pengajuan')->distinct()->get();
        $proposal = Pkm::orderBy('bidang_pkm')->where('tahun_pengajuan', $tgl)->where('status', 0)->paginate(10);
        $anggota = Anggota::All();
        if(empty($proposal)){
          $count = 0;
          $filter = "";
        }
        else {
          $count = $proposal->count();
          $filter = $tgl;
        }

        $list = ['proposal', 'anggota', 'count', 'tahun', 'filter'];
        return view('peserta.index', compact($list));
    }

    public function store_anggota(Request $request)
    {
        $anggota = new Anggota();
        $anggota->id_pengusul = $request->id_pengusul;
        $anggota->id_proposal = $request->id_proposal;
        $anggota->fullname = $request->fullname;
        $anggota->npm = $request->npm;
        $anggota->prodi_id = $request->prodi;
        $anggota->status = 1;

        $cek_anggota = Anggota::orderBy('id')->where('id_pengusul',$request->id_pengusul)->where('id_proposal', $request->id_proposal)->get();
        if($cek_anggota->count() < 4)
          $anggota->save();

        Alert::success('Anggota Baru Berhasil Ditambahkan', 'SUKSES')->persistent('Close');
        return redirect()->route('peserta.show', ['id' => $request->id_proposal]);
    }

    public function show($id)
    {
        $peserta = Pkm::FindOrFail($id);
        $prodi = Prodi::all();
        $bidang_pkm = BidangPKM::orderBy('id')->where('status',1)->get();
        $proposal = Pkm::orderBy('id')->where('id_pengusul', $peserta->id_pengusul)->paginate(5);
        $proposal2 = Pkm::orderBy('id')->where('id_pengusul', $peserta->id_pengusul)->first();
        $tgl = Carbon::now()->format('Y');

        $cek_proposal = Pkm::orderBy('id')->where('id_pengusul', $peserta->id_pengusul)
                      ->where('tahun_pengajuan', $tgl)
                      ->where('tahun_pendanaan', $tgl+1)->first();

        if(!empty($proposal2)){
          $anggota = Anggota::orderBy('id')->where('id_proposal', $proposal2->id)->paginate(5);
        }
        else {
          $anggota = Anggota::orderBy('id')->where('id_proposal', 0)->paginate(5);
        }
        $list = ['peserta','prodi', 'bidang_pkm', 'proposal', 'proposal2', 'cek_proposal', 'anggota'];
        return view('peserta.show', compact($list));
    }

    public function update(Request $request, $id) // Update Data Ketua Pengusul
    {
      $peserta = Pkm::FindOrFail($id);

      $pengusul = User::FindOrFail($peserta->id_pengusul);
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

      Alert::success('Identitas Pengusul Berhasil Diperbarui', 'SUKSES')->persistent('Close');
      return redirect()->route('peserta.show', ['id' => $id]);
    }

    public function update_pkm(Request $request, $id)
    {
        $proposal = Pkm::FindOrFail($id);
        $proposal->bidang_pkm = $request->bidang_pkm;
        $proposal->judul_pkm = $request->judul_pkm;
        $proposal->save();

        Alert::success('Data PKM Berhasil Diperbarui', 'SUKSES')->persistent('Close');
        return redirect()->route('peserta.show', ['id' => $id]);
    }

    public function input_bidang_pkm(Request $request)
    {
      $proposal = new Pkm();
      $proposal->bidang_pkm = $request->bidang_pkm;
      $proposal->id_pengusul = $request->id_pengusul;
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
        Alert::warning('Hanya Dapat Memilih Satu Bidang', 'PERINGATAN')->persistent('Close');
        return redirect()->route('peserta.show', ['id' => $id]);
      }
      else {
        $proposal->save();
        Alert::success('PBidang PKM Berhasil Ditambahkan', 'SUKSES')->persistent('Close');
        return redirect()->route('peserta.show', ['id' => $id]);
      }
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

        Alert::success('Proposal PKM Berhasil Diperbarui', 'SUKSES')->persistent('Close');
        return redirect()->route('peserta.show', ['id' => $id]);
    }

    public function upload_review(UploadRequest $request, $id)
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
              if(isset($proposal->file_review))
              {
                File::delete($proposal->file_review);
              }

              $file = Input::file('filePKM');
              $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
              $name = $bidang_pkm->singkatan . ' _ ' . $pengusul->npm . ' _ Review.' . $extension;
              if(Auth::User()->role_id == "Pnl")
              {
                $proposal->review_isi = 1;
              }
              else {
                $proposal->review_formating = 1;
              }

              $proposal->file_review = $path . $name;
              $file->move($path, $name);
            }
        }
        $proposal->save();

        Alert::success('Review Proposal PKM Berhasil Ditambahkan', 'SUKSES')->persistent('Close');
        return redirect()->route('peserta.show', ['id' => $id]);
    }

    public function read_review($id)
    {
        $proposal = Pkm::FindOrFail($id);
        $path = $proposal->file_review;
        if(File::exists($path))  // mengecek folder
        {
          return response()->download($path);
        }
        else {
          return response()->view('exception.filenotfound', [], 404);
        }
    }

    public function destroy_anggota(Request $request, $id)
    {
      $anggota = Anggota::FindOrFail($id);
      $anggota->delete();

      Alert::success('Anggota Berhasil Dihapus', 'SUKSES')->persistent('Close');
      return redirect()->route('peserta.show', ['id' => $request->id_pengusul]);
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

        Alert::success('Identitas Dosen Berhasil Diperbarui', 'SUKSES')->persistent('Close');
        return redirect()->route('peserta.show', ['id' => $request->id_proposal]);
    }

    public function destroy($id)
    {
      $anggota = Pkm::FindOrFail($id);
      $anggota->status = 1;
      $anggota->save();

      Alert::success('Data Kelompok Pengusul PKM Berhasil Dihapus', 'SUKSES')->persistent('Close');
      return redirect()->route('peserta.index');
    }

    public function setting($id)
    {
        $peserta = Pkm::FindOrFail($id);
        return view('peserta.setting', compact('peserta'));
    }

    public function setting_store(Request $request)
    {
      $peserta = User::FindOrFail($request->id_pengusul);
      $peserta->username_dikti = $request->username_dikti;
      $peserta->password_dikti = $request->password_dikti;
      $peserta->save();

      Alert::success('Password dan Username Dikti Berhasil Diperbarui', 'SUKSES')->persistent('Close');
      return redirect()->route('peserta.index');
    }

    public function reset_password(Request $request)
    {
      $peserta = User::FindOrFail($request->id_pengusul);
      $peserta->password = bcrypt($request->password);
      $peserta->save();

      Alert::success('Password Berhasil Direset', 'SUKSES')->persistent('Close');
      return redirect()->route('peserta.index');
    }

    public function search(Request $request)  // Mencari pegawai
    {
      //Search Berdasarkan
      $search = $request->input('search');
      $tahun = Pkm::orderBy('tahun_pengajuan','desc')->select('tahun_pengajuan')->distinct()->get();
      $tgl = $request->input('tahun_pengajuan');
      // $tgl = Carbon::now()->format('Y');

      $proposal = Pkm::orderBy('bidang_pkm')->where(function ($q) use ($search) {
                                          $q->where('judul_pkm', 'LIKE', "%$search%")
                                          //Join Tabel users
                                            ->orWhereHas('pengusul',function ($r) use ($search){ // model
                                              $r->where('users.first_name','like',"%$search%") // nama tabel
                                                ->orWhere('users.last_name','like',"%$search%")
                                                ->orWhere('users.npm','like',"%$search");
                                            })
                                            //join tbl_bidang_pkm
                                            ->orWhereHas('bidangpkm',function ($r) use ($search){ // model
                                              $r->where('tbl_bidang_pkm.singkatan','like',"%$search%"); // nama tabel
                                            });
                                          })->where('tahun_pengajuan', $tgl)->where('status', 0)->paginate(10);

      $anggota = Anggota::All();
      if(empty($proposal)){
        $count = 0;
      }
      else {
        $count = $proposal->count();
      }
      
      $filter = $request->input('tahun_pengajuan');
      $proposal->appends(['tahun_pengajuan' => $filter, 'search' => $search]);

      $list = ['proposal', 'anggota', 'count', 'tahun', 'filter'];
      return view('peserta.index', compact($list));
    }
}
