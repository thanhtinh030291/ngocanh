<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Session;
use App\ProductDetail;
use App\Product;
use App\ListProduct;

class Product extends Model
{
    //
    protected $table = "products";
    
    public function tinhtrang(){
    	return $this->belongsto('App\ProductStt','status','id');
    }
    public function loaisp(){
    	return $this->belongsto('App\ListProduct','idlist','id');
    }
    public function namelang($id){
    	$lang = Session::get('idlocale');
    	$pdetail = ProductDetail::select('name', 'price')->where('idlang',$lang)->where('idproduct',$id)->first() ?: ProductDetail::select('name', 'price')->where('idproduct',$id)->first();
        return $pdetail;
    }

    public function modproduct($id){
        $lang = Session::get('idlocale');
        $pdetail = Product::select( DB::raw('modproducts.id as idmod'), DB::raw('translates.trname as trname') )
                ->join("listproducts","listproducts.id", "=", "products.idlist")
                ->join("modproducts","listproducts.listidmod", "=", "modproducts.id") 
                ->join("translates","translates.trid", "=", "modproducts.id")
                ->where('translates.tridlang', $lang)
                ->where('translates.trcate', 1)
                ->where('products.id',$id) 
                ->first();

        return $pdetail;
    }



    public function listproduct($id){ 
        $pdetail = ListProduct::select('*')->where('id',$id)->first();
        return $pdetail;
    }

}
