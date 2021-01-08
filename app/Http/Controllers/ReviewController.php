<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Aset;
use App\Review;
use File;
use Storage;
use Carbon\Carbon;

class ReviewController extends Controller
{

      public function detail($id_aset){

        $info = Aset::where('id', $id_aset)->first();

    	return view('review.index', compact('info'));
    }
    // dd($info);

      
        
        // $id=$req->input('id_aset');
        // $ket =$req->input('ket')

}
