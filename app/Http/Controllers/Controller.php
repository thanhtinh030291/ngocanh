<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Product;
use App\Language;
use Session;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function __construct(){
    	$this->LoginAdmin();
    	$this->Languages();    	
    }
    function LoginAdmin(){
    	if(Auth::check())
        {
            $user = Auth::user();
            view()->share('admin_login',$user);
    	}
    }
    function Languages(){
    	$Languages = Language::all();
    	view()->share('admin_lang',$Languages);
    }
    public function Setlocale($idlocale){
        $lang = Language::find($idlocale);
        if (in_array($lang->char, \Config::get('app.locales'))) {
            \Session::put('locale',$lang->char);
            \Session::put('idlocale',$lang->id);
            \Session::put('currencylocale',$lang->currency);
            \Session::put('curency_codelocale',$lang->curency_code);
            \Session::save();
            $this->reload_cart_with_lang($lang->id);
          }
          return redirect()->back();
    }
    
    public function mail()
    {
        $user = "nguyennam.90st@mail.com";
        $message = "test mail laravel";
        Mail::send('nguyennam.90st@mail.com', function($message){
            $message->to($user->email);
            $message->subject('E-Mail Example');
        });

        dd('Mail Send Successfully');
    }
        
    public function reload_cart_with_lang($idlang){
        foreach (Cart::content() as $item) {
            $product = Product::select('*', DB::raw('products.id as idproduct'))
                            ->where('products.id',$item->id)
                            ->join("productdetail","products.id", "=", "productdetail.idproduct")
                            ->where('productdetail.idlang',$idlang)
                            ->get()->first();
            if(!empty($product)){
                if($product->vat != 0){                         
                    $price_with_vat = $product->price + $product->price * $product->vat / 100;
                    $price_to_sale_with_vat = $product->price_to_sale + $product->price_to_sale * $product->vat / 100;
                }else{                          
                    $price_with_vat = $product->price;
                    $price_to_sale_with_vat = $product->price_to_sale;
                }
                $price_show = $product->price;

                Cart::update( $item->rowId, ['id' => $product->idproduct, 
                    'name' => $product->name, 
                    'qty' => $item->qty, 
                    'price' => $price_with_vat, 
                    'options' => ['image' => $product->image, 
                                    'vat' => $product->vat, 
                                    'unit' => $product->currency, 
                                    'currency' => $product->currency, 
                                    'price_show' => $price_show,
                                    'price' => $product->price,
                                    'price_with_vat' => $price_with_vat, 
                                    'price_to_sale' => $product->price_to_sale, 
                                    'price_to_sale_with_vat' => $price_to_sale_with_vat, 
                                    'quantity_sale' => $product->quantity_sale] ]);


                // Cart::update( $item->rowId, ['id' => $product->idproduct, 'name' => $product->name, 'qty' => $item->qty, 'price' => $price_with_vat, 'options' => ['image' => $product->image, 'vat' => $product->vat, 'unit' => $product->currency, 'currency' => $product->currency, 'price' => $product->price,  'price_with_vat' => $price_with_vat, 'price_to_sale' => $product->price_to_sale, 'quantity_sale' => $product->quantity_sale] ]);
            }
        }
    }

}
