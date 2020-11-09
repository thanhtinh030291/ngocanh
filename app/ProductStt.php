<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStt extends Model
{
    //
    protected $table = "productstt";
    public $timestamps = false;

    public function loaitin(){
    	return $this->hasMany('App\Product','status','id');
    }
}
