<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    protected $table = "languages";
    public $timestamps = false; 

    public function modnew(){
    	return $this->hasMany('App\ModNews','idlang','id');
    }
    public function lisproduct(){
    	return $this->hasManyThrough('App\ListProduct','App\ModProduct',
    		'listidmod','idlang','id');
    }
}
