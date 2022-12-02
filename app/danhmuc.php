<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
	protected $table="danhmuc";
    //
    public function book(){
    	return $this->hasMany('App\book','id_madm','id');
    }
    //
}
