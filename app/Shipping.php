<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //
    protected $table = "shippings";
    public $timestamps = false; 

    public function lang(){
    	return $this->belongsto('App\Language','idlang','id');
    }
    
}
