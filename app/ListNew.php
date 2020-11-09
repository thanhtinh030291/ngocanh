<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListNew extends Model
{
    //
    protected $table = "listnews";
    public $timestamps = false; 
    
    public function modnew(){
    	return $this->belongsto('App\ModNews','listidmod','id');
    }
    public function news(){
    	return $this->hasMany('App\News','idlistnew','id');
    }
    
}
