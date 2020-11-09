<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Translate;
use Session;

class ListProduct extends Model
{
    //
    protected $table = "listproducts";
    public $timestamps = false; 

    public function modpro($id){
        $lang = Session::get('idlocale');
        $name = Translate::select('trname')->where('tridlang',$lang)->where('trcate',1)->where('trid',$id)->first();
        return $name;
    }
    public function namelist($id){
    	$lang = Session::get('idlocale');
    	$name = Translate::select('trname')->where('tridlang',$lang)->where('trcate',2)->where('trid',$id)->first();
        return $name;
    }

}
