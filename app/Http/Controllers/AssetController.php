<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kategori;
use App\Aset;
use App\Review;
use File;
use Storage;
use Response;
use Carbon\Carbon;


class AssetController extends Controller
{

   public function form_input($id_aset=null){

     if(isset($id_aset)){
         $detail_data =  Aset::where('id', $id_aset)->first();
     }else{
      $detail_data = null;
  }

        // dd($detail_data);
// 
  $kategori_dokumen = Kategori::all();

  return view('master_data.master_dokumen',compact('kategori_dokumen', 'detail_data'));
}
public function data_aset($id_dokumen=null){


    $list_data = Aset::with(['kategori', 'review_count'])->where('id_dokumen', '=', $id_dokumen)->get();
    // Review distcint('id_aset')->count()
        // dd($list_data);
    $kategori_dokumen = Kategori::all();
    $carbon = new Carbon(); 
// 
        // dd($carbon);
        // $jumlah=Sop::count();
    return view('list_data.data_dokumen',compact('list_data', 'kategori_dokumen'));

}

public function kategori($id_kategori=null){

    $detail_kategori = null;
        if(isset($id_kategori)){  //Check jika id kategori tidak null dan ambil data ke database
            //jika id kategori ada, harus ambil data ditable kategori dengan kondisi where sesuai id_kategori
            $detail_kategori = Kategori::where('id', '=', $id_kategori)->first(); //first hanya mengambil 1 data
        }

        $kategori_dokumen = Kategori::all();
        return view('dokumen.kategori',compact('kategori_dokumen','detail_kategori'));
        
    }
    public function eviden_upload(request $req){

        return view('eviden.upload_eviden');

    }
    public function save_eviden(request $req){

        $aset =$req->input('id_aset');
        $keterangan=$req->input('ket');
        $newEviden = new Review;
        $newEviden->id_aset = $aset;
        $newEviden->ket = $keterangan;

        $folder = storage_path('/attachment_eviden/');
        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0775, true, true);

        }

        $file_eviden = $req->file('file_eviden');

        $newEviden->file_eviden =$file_eviden->getClientOriginalName();
        $newEviden->ext_file = $file_eviden->getClientOriginalExtension();
        $newEviden->path_file = $file_eviden->store('attachment_eviden', 'file_attachments');

        $newEviden->save();
        alert()->success('Eviden Berhasil Di Upload', 'Successfully');

        return view('eviden.upload_eviden');

    }

    public function insert(Request $req){

        $nama=$req->input('nama');
        $newData = new Kategori;
        $newData->nama = $nama;
        $newData->save();

        // alert()->success('Tambah Data berhasil', 'Successfully');
        return redirect('/kategori');
    }
    public function update_kategori(Request $req){
        $id=$req->input('id_kategori');
        $nama_kategori=$req->input('nama');

        $newUpdate = Kategori::where('id', '=', $id)->first();
        $newUpdate->nama = $nama_kategori;
        $newUpdate->save();

        alert()->success('Update berhasil', 'Successfully');
        return redirect('/kategori');
    }

    Public function simpan_data(request $req){
        // dd($req->input());

        $kategori =$req->input('id_dokumen');
        $nama =$req->input('nama');
        $nosertifikat =$req->input('no_sertifikat');
        $lokasi =$req->input('nama_lokasi');
        $desa =$req->input('nama_desa');
        $kec =$req->input('kecamatan');
        $kab =$req->input('kabupaten');
        $luas =$req->input('luas_areal');
        $satuan =$req->input('satuan_area');
        $tgl_awal = date('Y-m-d', strtotime($req->input('tanggal_awal')));
        $tgl_exp =date('Y-m-d',strtotime($req->input('tanggal_akhir')));

        $newAset = new Aset;
        $newAset->id_dokumen = $kategori;
        $newAset->nama = $nama;
        $newAset->no_sertifikat = $nosertifikat;
        $newAset->nama_lokasi = $lokasi;
        $newAset->nama_desa = $desa;
        $newAset->kecamatan = $kec;
        $newAset->kabupaten = $kab;
        $newAset->luas_areal = $luas;
        $newAset->satuan_area = $satuan;
        $newAset->tanggal_awal = $tgl_awal;
        $newAset->tanggal_akhir = $tgl_exp;
        $newAset->tgl_notifikasi = Carbon::parse(date('Y-m-d',strtotime($req->input('tanggal_akhir'))))->subYears(2);

        $folder = storage_path('/attachment/');
        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0775, true, true);

        }

        $file = $req->file('file');

        $newAset->file =$file->getClientOriginalName();
        $newAset->ext_file = $file->getClientOriginalExtension();
        $newAset->path_file = $file->store('attachment', 'file_attachments');

        $folder = storage_path('/attachment_peta/');
        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0775, true, true);

        }



        $file_peta = $req->file('file_peta');

            if(isset($file_peta)){
                $newAset->file_peta_bidang =$file_peta->getClientOriginalName();
                $newAset->ext_file_peta = $file_peta->getClientOriginalExtension();
                $newAset->path_file_peta = $file_peta->store('attachment_peta', 'file_attachments_peta');

            }

    

        $newAset->save();
        alert()->success('Data Aset berhasil ditambahkan', 'Successfully');

        return redirect('/forminput');
    }

    public function update_aset(Request $req){
        // dd($req->input());

        $id=$req->input('id_aset');
        $kategori =$req->input('id_dokumen');
        $nama =$req->input('nama');
        $nosertifikat =$req->input('no_sertifikat');
        $lokasi =$req->input('nama_lokasi');
        $desa =$req->input('nama_desa');
        $kec =$req->input('kecamatan');
        $kab =$req->input('kabupaten');
        $luas =$req->input('luas_areal');
        $tgl_awal = date('Y-m-d', strtotime($req->input('tanggal_awal')));
        $tgl_exp =date('Y-m-d',strtotime($req->input('tanggal_akhir')));

        $query = Aset::where('id','=',$id)->first();
        $query->id_dokumen = $kategori;
        $query->nama = $nama;
        $query->no_sertifikat = $nosertifikat;
        $query->nama_lokasi = $lokasi;
        $query->nama_desa = $desa;
        $query->kecamatan = $kec;
        $query->kabupaten = $kab;
        $query->tanggal_awal = $tgl_awal;
        $query->tanggal_akhir = $tgl_exp;
        if(!empty($req->file('file'))){
            File::delete($file->path);
            $file = $req->file('file');

            $newSop->file =$file->getClientOriginalName();
            $newSop->ext_file = $file->getClientOriginalExtension();
            $newSop->path_file = $file->store('attachment', 'file_attachments');

        }


        $query->save();

        alert()->success('Update berhasil', 'Successfully');
        return redirect('/list_data');

    }

    public function preview_attachment($path=null, $file=null){
        $filepath = $path.'/'.$file;
        // $storage = Storage::disk('file_attachments')->getAdapter()->getPathPrefix().$filepath;
        $storage = storage_path($filepath);
    //    dd($storage);
        return Response::make(file_get_contents($storage), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$file.'"'
        ]);

    }



    // public function list_data(){
    //     $list_data = Aset::with(['kategori'])->get();
    //     // $jumlah=Sop::count();
    //     return view('list_data.data_dokumen',compact('list_data'));

    // }
}
