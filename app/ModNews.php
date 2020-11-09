<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModNews extends Model
{
    //
    protected $table = "modnews";
    public $timestamps = false;

    public function lang(){
    	return $this->belongsto('App\Language','idlang','id');
    }

    public function loaitin(){
    	return $this->hasMany('App\ListNew','listidmod','id');
    }
    
    public function tintuc(){
    	return $this->hasManyThrough('App\News','App\ListNew',
    		'listidmod','idlistnew','id');
    }

    

}
