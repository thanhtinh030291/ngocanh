<?php

namespace App\Http\Controllers;

use App\Product;
use App\Warehouse;
use App\ProductStt;
use App\ProductDetail;
use Illuminate\Http\Request;
use Session;
class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ListProduct(){
        $product = Product::all();
        $stt = ProductStt::all();
        foreach ($product as $pro) {
            if(ProductDetail::where('idproduct',$pro->id)->count() == 0){
                return redirect('admin/product/addcontent/'.$pro->id)->with('loi','Vui lòng thêm thông tin sản phẩm');
            }
        }
        return view('computer.admin.warehouse.list',['product'=>$product,'stt'=>$stt]);
    }
    public function PostWare(Request $request){
        $type = $request->typepost;
        $idpro = $request->productid;
        if($type == 1 ){
            session(['actionuser' => 'postin','editid'=>$idpro]); 
        }elseif($type == 2 ){
            session(['actionuser' => 'postout','editid'=>$idpro]);
        }else{
            session(['actionuser' => 'postedit','editid'=>$idpro]);
        }               
        $this->validate($request,[
                'nnnumproductnew' => 'required|numeric',
                'nnproprice' => 'required|numeric',
                'nncungcap' => 'required',                
                'nnnoteware' => 'required',                
                'nnusername' => 'required',                
            ],[
                'nnnumproductnew.required' => 'Số lượng không được để trống',
                'nnnumproductnew.numeric' => 'Số lượng phải là số',
                'nnproprice.required' => 'Giá không được để trống ',
                'nnproprice.numeric' => 'Giá phải là số',
                'nncungcap.required' => 'Nhà cung cấp không được để trống ',
                'nnnoteware.required' => 'Ghi chú không được để trống ',
                'nnusername.required' => 'Nhân viên thực hiện không được để trống ',
            ]);
        $product = Product::find($idpro);
        $warehouse = new Warehouse;
        $content = " ";
        if($type == 1){
            $product->quantity = $product->quantity + $request->nnnumproductnew;
            $content = "Nhập kho Số lượng: ".$request->nnnumproductnew." - Nhà cung cấp: ".$request->nncungcap." - Ghi chú: ".$request->nnnoteware;
            $warehouse->pricein = $request->nnproprice;            
            $warehouse->priceout = 0;            
        }elseif($type == 2){
            $product->quantity = $product->quantity - $request->nnnumproductnew;
            $content = "Xuất kho Số lượng: ".$request->nnnumproductnew." - Nhà cung cấp: ".$request->nncungcap." -  Ghi chú: ".$request->nnnoteware;
            $warehouse->pricein = 0;            
            $warehouse->priceout = $request->nnproprice;    
        }else{
            $product->quantity = $request->nnnumproductnew;
            $content = "Hiệu chỉnh kho Số lượng: ".$request->nnnumproductnew." - Nhà cung cấp: ".$request->nncungcap." -  Ghi chú: ".$request->nnnoteware;
            $warehouse->pricein = 0;            
            $warehouse->priceout = 0; 
        }
        if($product->save()==true){           
            $warehouse->content = $content;
            $warehouse->idproduct = $idpro;
            $warehouse->category = $type;
            $warehouse->userware = $request->nnusername;
            $warehouse->iduser = "1"; 
            $warehouse->save();          
        }
        return redirect('admin/warehouse/list')->with('thongbao','Cập nhật thành công');
    }
    public function GetHistory($id){
        $warehouse = Warehouse::where('idproduct',$id)->orderBy('created_at', 'desc')->get();
        if($warehouse != ""){
            foreach ($warehouse as $ware) {
                if ($ware->category==1) {
                    $price =$ware->pricein;
                }elseif ($ware->category==2) {
                    $price =$ware->pricein;
                }else{
                     $price = "<i>Hủy</i>";
                }
                echo "<tr class='nnviewappend'><td>".\Carbon\Carbon::createFromTimeStamp(strtotime($ware->created_at))->diffForHumans()."</td><td>".$ware->content."</td><td>".$price."</td><td>".$ware->userware."</td></tr>";
            }
        }else{
            echo "<tr>Không có lịch sử xuất nhập nào!</tr>";
        }
        
    }
    public function ListWare(){
        $ware = Warehouse::all();
        return view('computer.admin.warehouse.listwh',['ware'=>$ware]);
    }
}
