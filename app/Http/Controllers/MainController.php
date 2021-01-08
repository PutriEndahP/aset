<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Kategori;
use App\Aset;
use App\User;
use Response;
use DB;
class MainController extends Controller
{
  public function index(){

   return view('login.login-dua');
 }


 public function dashboard($id_dokumen=null){

  
  $hgu =	DB::table('data_aset')->select(DB::raw('count(id_dokumen) as total'), 'id_dokumen')
  ->where('id_dokumen', "=", "1")
  ->groupBy('id_dokumen')
  ->count();
      // dd($hgu);
  $hgb =	DB::table('data_aset')->select(DB::raw('count(id_dokumen) as total'), 'id_dokumen')
  ->where('id_dokumen', '=', 2)
  ->groupBy('id_dokumen')
  ->count();
  $warning_count = DB::table('data_aset')->where('tanggal_akhir', '>', date('Y-m-d'))
  ->where('tgl_notifikasi', '<', date('Y-m-d'))
  ->count();
  $proses =  DB::table('data_aset')->select(DB::raw('count(is_reviewed) as total'), 'is_reviewed')
  ->where('is_reviewed', '=', 2)
  ->groupBy('is_reviewed')
  ->count();

  $warning = Aset::with(['kategori'])
  ->where('tanggal_akhir', '>', date('Y-m-d'))
  ->where('tgl_notifikasi', '<', date('Y-m-d'))
  ->get();
  
         // dd($warning);
  $kategori_dokumen = Kategori::all();
  $carbon = new Carbon(); 

      	// Aset::select(raw('count(id_dokumen)'),'id_dokumen')->groupBy('id_dokumen')->get();
  return view ('dashboard.index', compact('hgu', 'hgb','warning','warning_count', 'proses','kategori_dokumen'));
}

}
