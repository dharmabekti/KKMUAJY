<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Pengusul\UploadRequest;
use Carbon\Carbon;
use File;
use Alert;
use App\Berkas;
use App\KategoriBerkas;

class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriBerkas::all();
        $berkas = Berkas::orderBy('id')->whereNotIn('kategori',[0])->paginate(10);
        $ketentuan = Berkas::orderBy('id')->where('kategori',0)->first();
        if(empty($ketentuan)){
          $ketentuan_temp = "";
        }
        else {
          $ketentuan_temp = $ketentuan->keterangan;
        }
        if(Auth::User()->role_id != "PS"){
          return view('berkas.index', compact('berkas','kategori', 'ketentuan_temp'));
        }
        else{
          return view('berkas.index_peserta', compact('berkas','kategori', 'ketentuan_temp'));
        }
    }

    public function store(UploadRequest $request)
    {
        $berkas = new Berkas();
        $kategori = KategoriBerkas::FindOrFail($request->kategori_berkas);

        $path = 'uploads/Berkas PKM/';   // lokasi penyimpanan folder

        if(File::exists($path))
        {
            if($request->hasFile('filePKM'))
            {
              // if(isset($proposal->file_pkm))
              // {
              //   File::delete($proposal->file_pkm);
              // }

              $file = Input::file('filePKM');
              $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
              $name = $request->nama_berkas . ' _ ' . $kategori->nama_kategori . '.' . $extension;

              $berkas->nama_file = $request->nama_berkas;
              $berkas->kategori = $request->kategori_berkas;
              $berkas->lokasi = $path . $name;
              $file->move($path, $name);
              $berkas->save();
            }
        }

        Alert::success('Berkas PKM Berhasil Disimpan', 'SUKSES')->persistent('Close');
        return redirect()->route('berkas.index');
    }

    public function ketentuan_store(Request $request)
    {
      $berkas = Berkas::orderBy('id')->where('kategori', 0)->first();
      if(empty($berkas))
      {
        $berkas = new Berkas();
      }
      $berkas->nama_file = "Ketentuan PKM";
      $berkas->kategori = 0;
      $berkas->keterangan = $request->ketentuan;
      $berkas->save();

      Alert::success('Ketentuan PKM Berhasil Diperbarui', 'SUKSES')->persistent('Close');
      return redirect()->route('berkas.index');
    }

    public function destroy($id)
    {
        $berkas = Berkas::FindOrFail($id);
        if(isset($berkas->lokasi))
        {
          File::delete($berkas->lokasi);
          $berkas->delete();
        }

        Alert::success('Berkas PKM Berhasil Dihapus', 'SUKSES')->persistent('Close');
        return redirect()->route('berkas.index');
    }

    public function readfile($id)
    {
        $berkas = Berkas::FindOrFail($id);
        $path = $berkas->lokasi;
        if(File::exists($path))  // mengecek folder
        {
          return response()->download($path);
        }
        else {
          return response()->view('exception.filenotfound', [], 404);
        }
    }
}
