<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //
    protected $table = "orderproduct";

    public function lang(){
    	return $this->belongsto('App\Language','idlang','id');
    }
    
}