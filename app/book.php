<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
   protected $table="book";
	 public function danhmuc(){
    	return $this->belongsTo('App\danhmuc','id_madm','id');
    }
    //
    public function chitiethd(){
    	return $this->hasMany('App\chitiethd','id_book','id');
    }
    //
}
