<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slidelang extends Model
{
    //
    protected $table = "slidelangs";
    public $timestamps = false; 

    public function slide()
    {
    	return $this->belongsto('App\Slidelang','idSlide','id');
    }
}
