<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
    protected $table = "customers";

    public function listgr(){
    	return $this->belongsto('App\GroupCustomers','idgroup','id');
    }

}
