<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\SpecialGroup; 
use App\Product; 
use App\Language;
use Illuminate\Http\Request;

class SpecialGroupController extends Controller
{ 
    public $idlang = 0;
    function __construct(){ 
        $this->middleware(function ($request, $next) {
            $this->idlang = session()->get('idlocale') ;
            return $next($request);
        });
    }

    public function ListGroup(){
        $Language = Language::all(); 

        $list_special   =  Product::select( DB::raw('products.id as idproduct') )
                            ->join("specialgroup","products.id", "=", "specialgroup.product_id")
                            ->join("productdetail","products.id", "=", "productdetail.idproduct")
                            ->where('productdetail.idlang',$this->idlang)
                            ->where('hide', 0)
                            ->get()->toArray();

        $all_product   =  Product::select('*', DB::raw('products.id as idproduct') )
                            ->join("productdetail","products.id", "=", "productdetail.idproduct")
                            ->where('productdetail.idlang',$this->idlang)
                            ->where('hide', 0)
                            ->get();

        return view('computer.admin.specialgroup',['list_special'=>$list_special,'all_product'=>$all_product,'admin_lang'=>$Language]);
    }
     
    public function EditGroup(Request $request){
        $product_id     = $request->input('product_id');
        $in_menu        = $request->input('in_menu');

 

        if($in_menu == 0){ 
            $special = new SpecialGroup;
            $special->product_id = $product_id;
            $special->save();
        }else{
            $special = SpecialGroup::select('*') 
                            ->where('product_id', $product_id)
                            ->get()->first();
            $special->delete();
        }                           

        echo 1;

    }
     
}
