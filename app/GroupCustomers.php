<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupCustomers extends Model
{
    //
    protected $table = "groupcustomer";
    public $timestamps = false; 
    
    public function news(){
    	return $this->hasMany('App\Customers','idgroup','id');
    }
}
