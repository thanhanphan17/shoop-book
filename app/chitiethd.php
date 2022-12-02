<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitiethd extends Model
{
	protected $table="chitiethd";
    //
    public function book(){
    	return $this->belongsTo('App\book','id_book','id');
    }
     public function hoadon(){
    	return $this->belongsTo('App\hoadon','id_hd','id');
    }
    //
}
