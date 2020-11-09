<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = "payments";
    public $timestamps = false; 

    public function lang(){
    	return $this->belongsto('App\Language','idlang','id');
    }
    
}
