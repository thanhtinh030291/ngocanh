<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Translate;
use Session;

class ModProduct extends Model
{
    //
    protected $table = "modproducts";
    public $timestamps = false; 

    public function namelist($id){
		$lang = Session::get('idlocale');
		$name = Translate::select('trname')->where('trcate',1)->where('tridlang',$lang)->where('trid',$id)->first() ?: Translate::select('trname')->where('trcate',1)->where('trid',$id)->first() ;
	    return $name;
    }
}
