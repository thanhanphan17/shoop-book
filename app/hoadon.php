<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
	protected $table="hoadon";
    //
     public function chitiethd(){
    	return $this->hasMany('App\chitiethd','id_hd','id');
    }
    public function khachhang(){
    	return $this->belongsTo('App\khachhang','id_kh','id');
    }
    //
}
