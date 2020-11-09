<?php

namespace App\Http\Controllers;

use App\ListProduct;
use App\Product;
use App\ModProduct;
use App\ProductStt;
use App\ProductDetail;
use App\ProductImage;
use App\Order;
use App\OrderProduct;
use App\Warehouse;

use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetListPro($idmod){

        $listnews = ListProduct::where('listidmod',$idmod)->get(); 
            echo "<option value='xxx'>Hãy chọn loại sản phẩm</option>";  
        foreach ($listnews as $ls) {
            echo "<option value='".$ls->id."'>".$ls->namelist($ls->id)->trname."</option>";
        }       
    }
    public function ListPro(){
        $lang = Session::get('idlocale');
        $modulepro = ModProduct::all();
        $product = Product::all();
        $stt = ProductStt::all();
        $lpro = ListProduct::all();
        return view('computer.admin.product.product',['product'=>$product,'stt'=>$stt,'modulepro'=>$modulepro,'lpro'=>$lpro]);
    }
    public function AddPro(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'nnlistnew' => 'numeric',
                // 'nnunit' => 'numeric',
                // 'nnprovat' => 'numeric|max:100',
                'nnavatarfile' => 'image|max:500000',                
            ],[
                'nnlistnew.numeric' => 'Bạn cần chọn loại sản phẩm',
                'nnunit.numeric'  => 'Số lượng tính giá sỉ cần phải là số',
                'nnavatarfile.image' => 'Avatar phải là hình ảnh',
                'nnavatarfile.max' => 'Avatar dung lượng quá lớn',
                'nnprovat.numeric' => 'VAT phải là số',
                'nnprovat.max' => 'VAT phải nhỏ hơn 100',

            ]);
        $product = new Product;
        $product->quantity = 0;
        $product->quantity_sale = $request->nnunit;
        $product->sale = ($request->nnsale)?$request->nnsale:0;
        $product->vat = ($request->nnprovat)?$request->nnprovat:0;
        $product->status = $request->nnstatus;
        $product->idlist = $request->nnlistnew; 
        if($request->hasFile('nnavatarfile')){
                $file = $request->file('nnavatarfile');
                $nameimg = changeTitle($file->getClientOriginalName()); 
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
                while(file_exists("public/img/product/".$hinh))
                {
                    $hinh = "nt7solution-".str_random(6)."_".$nameimg;
                }
                $file->move("public/img/product",$hinh);
                $product->image = $hinh;
            }else{
                $product->image = "no-img.png";
            }
        $product->save();
        return redirect('admin/product/addcontent/'.$product->id)->with('thongbao','thêm thành công');
    }
    public function EditPro(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidproduct]);   
        $this->validate($request,[
                'ennlistnew' => 'numeric',
                // 'ennprovat' => 'numeric|max:100',
                // 'ennunit' => 'numeric',
                'ennavatarfile' => 'image|max:500000',                
            ],[
                'ennlistnew.numeric' => 'Bạn cần chọn loại sản phẩm',
                'ennunit.numeric'  => 'Số lượng tính giá sỉ cần phải là số',
                'ennavatarfile.image' => 'Avatar phải là hình ảnh',
                'ennavatarfile.max' => 'Avatar dung lượng quá lớn',
                'ennprovat.numeric' => 'VAT phải là số',
                'ennprovat.max' => 'VAT phải nhỏ hơn 100',

            ]);
        $product = Product::find($request->ennidproduct);
        $product->quantity_sale = $request->ennunit;
        $product->vat = ($request->ennprovat)?$request->ennprovat:0;
        $product->sale = ($request->ennsale)?$request->ennsale:0;
        $product->status = $request->ennstatus;
        $product->idlist = $request->ennlistnew; 
        if($request->hasFile('ennavatarfile')){
            $file = $request->file('ennavatarfile');
            $nameimg = changeTitle($file->getClientOriginalName()); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/product/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/product",$hinh);
            // removefile
            $imgold = $request->ennimguserold;
            if($imgold !="no-img.png"){
                while(file_exists("public/img/product/".$imgold))
                {
                    unlink("public/img/product/".$imgold);
                }
            }
            
            $product->image = $hinh;
        }
        $product->save();

        // ==========waterMarkImage=======
        // waterMarkImage("img/product".$hinh);
        // ==========waterMarkImage=======

        return redirect('admin/product/list')->with('thongbao','sửa thành công');
    }
    public function DeletePro(Request $request){
        $order = OrderProduct::where('idproduct',$request->dennidnew)->count();
        $order_2 = Warehouse::where('idproduct',$request->dennidnew)->count();
        if($order == 0 && $order_2 == 0){

            $detail_product = ProductDetail::where('idproduct',$request->dennidnew)->delete();
            $productimage = ProductImage::where('idproduct',$request->dennidnew)->delete();

            $product= Product::find($request->dennidnew);
            $product->delete();
            $imgold = $request->dennimgnew;
                if($imgold !="no-img.png"){
                    while(file_exists("public/img/product/".$imgold))
                    {
                        unlink("public/img/product/".$imgold);
                    }
                }
            return redirect('admin/product/list')->with('thongbao','Xóa thành công');
        }else{
            return redirect('admin/product/list')->with('loi','Xóa không thành công, Bạn cần xóa sản phẩm này trong các đơn hàng');

        }
        

    }

    public function ViewContentPro($id) {
        $lang = Session::get('idlocale');
        $pro = Product::where('id',$id)->first();
        $product = ProductDetail::where('idproduct',$id)->where('idlang',$lang)->first();
        $pimg = ProductImage::where('idproduct',$id)->get();
        return view('computer.admin.product.addcontent',['pro'=>$pro,'product'=>$product,'pimage'=>$pimg]);
    }
    public function AddContentPro($id,Request $request){
        $lang = Session::get('idlocale');
        $product = Productdetail::where('idproduct',$id)->where('idlang',$lang)->first();

        if(empty($product)){
            $check = "";
        }else{
            $check =  ",name,".$product->id;
        } 

        $this->validate($request,[ 
                'name' => 'required|unique:productdetail'.$check,
                // 'txtUnit' => 'required',
                'txtPrice' => 'required|numeric',
                // 'txtPrice2' => 'numeric',
                // 'txtDescription' => 'required|max:300',
                'txtContent' => 'required',
                // 'price_no_sale' => 'numeric',
                'fImages_edit' => 'max:500000',                
            ],[
                'name.required'=> 'Tên sản phẩm ko được để trống (#)',
                'name.unique'=> 'Tên sản phẩm phải là duy nhất', 
                'txtUnit.required' => 'Bạn đơn vị tính cho sản phẩm',
                'txtPrice.required' => 'Bạn thêm giá bán sản phẩm',
                'txtPrice.numeric' => 'Giá bán sản phẩm phải là số',
                'txtPrice2.numeric' => 'Giá bán 2 sản phẩm phải là số',
                'txtDescription.required' => 'Giới thiệu sản phẩm không được để trống',
                'txtDescription.max' => 'Giới thiệu sản phẩm không quá 300 kí tự',
                'txtContent.required' => 'Nội dung sản phẩm không được để trống',
                // 'fImages_edit.image' => 'Avatar phải là hình ảnh',
                'fImages_edit.max' => 'Avatar dung lượng quá lớn',

            ]);
        if(empty($product)){
            $product = new Productdetail;
        }else{
            $product = $product;
        }
        $product->name = $request->name;
        $product->alias = changeTitle(trim($request->name));
        if(empty(trim($request->slug))){
            $product->slug = changeTitle(trim($request->name));
        }else{
            $product->slug = changeTitle(trim($request->slug));
        }
        $product->currency =  $request->txtUnit;
        $product->price =  ($request->txtPrice)?$request->txtPrice:0;
        $product->price_to_sale =  ($request->txtPrice2)?$request->txtPrice2:0;
        
        $str = str_replace("https://www.youtube.com/watch?v=","https://www.youtube.com/embed/",$request->txtlink_video);
        $product->link_video =  ($str)?$str:"";
        $product->price_compare =  ($request->price_no_sale)?$request->price_no_sale:0;
        $product->content =  $request->txtContent;
        $product->keywords =  $request->txtKeywords;
        $product->description =  $request->txtDescription;
        $product->idlang = Session::get('idlocale'); 
        $product->idproduct = $request->nnidproduct;   
        $product->save();

        if(!empty($request->file('fImages_edit'))){          
            foreach($request->file('fImages_edit') as $file) {                               
                $product_img =  new ProductImage;
                if(isset($file)){   
                    $nameimg = $file->getClientOriginalName(); 
                    $hinh = "longtriCo".str_random(6)."_".$nameimg;
                    while(file_exists("public/img/product/".$hinh))
                    {
                        $hinh = "longtriCo".str_random(6)."_".$nameimg;
                    }
                    $file->move("public/img/product/Pdetail/",$hinh);                  
                    $product_img->image = $hinh;
                }
                $product_img->idproduct = $request->nnidproduct;  
                $product_img->save();
            }
            
        }
        return redirect('admin/product/addcontent/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function getDelImg($id, Request $request){
        if($request->ajax()){
            $img_detail   =  ProductImage::find($id);
            if(!empty($img_detail)){
                $imgold = $img_detail->image;
                if($imgold !="no-img.png"){
                    while(file_exists("public/img/product/Pdetail/".$imgold))
                    {
                        unlink("public/img/product/Pdetail/".$imgold);
                    }
                }
                $img_detail->delete();
            }
            return 'true';
        }
        
    }
    public function Changehide(Request $request){
        if($request->ajax()){
            $id = (int)$request->idpr;
            $product = Product::find($id);
            if($product->hide == NULL || $product->hide == 0 ){
                $product->hide = 1;
                $product->save();
                return 1;
            }else{
                $product->hide = 0;
                $product->save();
                return 1;
            }
            
        }else{
            return 0;
        }
    }
}
