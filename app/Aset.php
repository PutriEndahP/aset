<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
     protected $table = 'data_aset';
    
     // Sop::count();

    public function kategori(){
    	return $this->hasOne('App\Kategori', 'id', 'id_dokumen');
    }

    public function review_count(){
    	return $this->hasMany('App\Review', 'id_aset', 'id');
    }

    //select * from tbl_sop sop join tbl_bidang bidang on(sop.id_bidang = bidang.id) join tbl_kategori kategori on(sop.id_kategori = kategori.id)
}
