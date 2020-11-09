<?php

namespace App\Http\Controllers;

use App\ListProduct;
use App\ModProduct;
use App\Translate;
use App\ProductStt;
use App\Product;

use Illuminate\Http\Request;
use Session;

class ListProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function List2Pro(){
        $listproduct = ListProduct::all();
        $modulepro = ModProduct::all();
        return view('computer.admin.product.listproduct',['listproduct'=>$listproduct,'modulepro'=>$modulepro]);
    }
    public function AddListPro(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'listname' => 'required|unique:listproducts|unique:modproducts,modname', 
                // 'nnnumber' => 'numeric',
                'nntheloai' => 'numeric',
                'nnavatarfile' => 'image|max:500000',                
            ],[
                'listname.required' => 'Bạn cần thêm tên loại',
                'listname.unique' => 'Tên phải là duy nhất',
                // 'nnnumber.numeric'     => 'Hiện thị phải là số',
                'nntheloai.numeric'     => 'Bạn cần chọn thể loại tin',
                'nnavatarfile.image' => 'Avatar phải là hình ảnh',
                'nnavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $listproduct = new ListProduct;
        $listproduct->listname = $request->listname;
        $listproduct->slug = changeTitle($request->listname);
        $listproduct->listnumber = $request->nnnumber;
        $listproduct->listidmod = $request->nntheloai;
        $listproduct->type = $request->type;
        $listproduct->description = $request->nndescription;
        if($request->hasFile('nnavatarfile')){
                $file = $request->file('nnavatarfile');
                $nameimg = changeTitle($file->getClientOriginalName()); 
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
                while(file_exists("public/img/listproduct/".$hinh))
                {
                    $hinh = "nt7solution-".str_random(6)."_".$nameimg;
                }
                $file->move("public/img/listproduct",$hinh);
                $listproduct->listimg = "public/img/listproduct/".$hinh;
            }else{
                $listproduct->listimg = "no-img.png";
            }
        if($listproduct->save()){
            $trans = new Translate;
            $trans->trname = $request->listname;
            $trans->tridlang = 2;
            $trans->trcate = 2;
            $trans->trid = $listproduct->id;
            $trans->save();
            $transc = new Translate;
            $transc->trname = $request->listname;
            $transc->tridlang = 1;
            $transc->trcate = 2;
            $transc->trid = $listproduct->id;
            $transc->save();
        }
        
        return redirect('admin/listproduct/list')->with('thongbao','thêm thành công');
    }
    public function EditListPro(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidlistpro]);   
        $this->validate($request,[
                'listname' => 'required|unique:listproducts,listname,'.$request->ennidlistpro.'|unique:modproducts,modname',
                // 'ennnumber' => 'numeric',
                'enntheloai' => 'numeric',
                'ennavatarfile' => 'image|max:500000',                
            ],[
                'listname.required' => 'Bạn cần thêm tên loại',
                'listname.unique' => 'Tên phải là duy nhất', 
                // 'ennnumber.numeric'     => 'Hiện thị phải là số',
                'enntheloai.numeric'     => 'Bạn cần chọn thể loại tin',
                'ennavatarfile.image' => 'Avatar phải là hình ảnh',
                'ennavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $listproduct = ListProduct::find($request->ennidlistpro);
        $listproduct->listname = $request->listname;
        $listproduct->slug = changeTitle($request->listname);
        $listproduct->listnumber = $request->ennnumber;
        $listproduct->listidmod = $request->enntheloai;
        $listproduct->type = $request->type;
        $listproduct->description = $request->enndescription;
        if($request->hasFile('ennavatarfile')){
            $file = $request->file('ennavatarfile');
            $nameimg = changeTitle($file->getClientOriginalName()); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/listproduct/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/listproduct",$hinh);
            // removefile
            $imgold = $request->ennimguserold;
            if($imgold !="no-img.png"){
                while(file_exists($imgold))
                {
                    unlink($imgold);
                }
            }
            
            $listproduct->listimg = "public/img/listproduct/".$hinh;
        }
        if($listproduct->save()){
            $lang = Session::get('idlocale');
            $trans = Translate::where('trcate',2)->where('tridlang',$lang)->where('trid',$listproduct->id)->first();
            $trans->trname = $request->listname;
            $trans->save();
        }
        return redirect('admin/listproduct/list')->with('thongbao','sửa thành công');
    }
    public function DeleteListPro(Request $request){
        $pro = Product::where('idlist',$request->dennidlistpro)->count();
        if($pro==0){
            $listproduct = ListProduct::find($request->dennidlistpro);
            $listproduct->delete();
            $trans = Translate::where('trcate',2)->where('trid',$request->dennidlistpro)->get();
            foreach ($trans as $tran) {
                $tran->delete();
            }
            $imgold = $request->dennimglistpro;
                if($imgold !="no-img.png"){
                    while(file_exists($imgold))
                    {
                        unlink($imgold);
                    }
                }
            return redirect('admin/listproduct/list')->with('thongbao','Xóa thành công');    
        }else{
            return redirect('admin/listproduct/list')->with('loi','Xóa không thành công,Bạn cần xóa các sản phẩm thuộc loại sản phẩm này');    

        }
        

    }

    //status 
    public function ListSTT(){
        $stta = ProductStt::all();
        return view('computer.admin.product.status',['stt'=>$stta]);
    }
    public function AddSTT(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'nnname' => 'required',
                'nnchar' => 'required|max:2|numeric',
                'nnavatarfile' => 'image|max:500000',                
            ],[
                'nnname.required' => 'Bạn cần thêm tên tình trạng',
                'nnchar.required'=> 'Bạn cần thêm thứ tự hiện thị',
                'nnchar.max'     => 'Thứ tự hiện thị không quá 2 ký tự',
                'nnchar.numeric'     => 'hứ tự hiện thị phải là số',
                'nnavatarfile.image' => 'Avatar phải là hình ảnh',
                'nnavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $stt = new ProductStt;
        $stt->sttname = $request->nnname;
        $stt->stthide = $request->nnchar;
        if($request->hasFile('nnavatarfile')){
                $file = $request->file('nnavatarfile');
                $nameimg = $file->getClientOriginalName(); 
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
                while(file_exists("public/img/listproduct/".$hinh))
                {
                    $hinh = "nt7solution-".str_random(6)."_".$nameimg;
                }
                $file->move("public/img/listproduct",$hinh);
                $stt->sttimg = $hinh;
            }else{
                $stt->sttimg = "no-img.png";
            }
        $stt->save();
        return redirect('admin/listproduct/liststt')->with('thongbao','thêm thành công');
    }
    public function EditSTT(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidlang]);   
        $this->validate($request,[
                'ennchar' => 'required|max:5',
                'ennavatarfile' => 'image|max:500000',                
            ],[
                'ennchar.required'=> 'Ký hiệu không được bỏ trống',
                'ennchar.max'     => 'Ký hiệu không quá 5 ký tự',
                'ennavatarfile.image' => 'Avatar phải là hình ảnh',
                'ennavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $stt = ProductStt::find($request->ennidlang);
        $stt->sttname = $request->ennname;
        $stt->stthide = $request->ennchar;
        if($request->hasFile('ennavatarfile')){
            $file = $request->file('ennavatarfile');
            $nameimg = $file->getClientOriginalName(); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/listproduct/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/listproduct",$hinh);
            // removefile
            $imgold = $request->ennimguserold;
            if($imgold !="no-img.png"){
                while(file_exists("public/img/listproduct/".$imgold))
                {
                    unlink("public/img/listproduct/".$imgold);
                }
            }
            
            $stt->sttimg = $hinh;
        }
        $stt->save();
        return redirect('admin/listproduct/liststt')->with('thongbao','sửa thành công');
    }
    public function DeleteSTT(Request $request){
        $product = Product::where('status',$request->dennidslide)->count();
        if($product==0){
            $stt = ProductStt::find($request->dennidslide);
            $stt->delete();
            $imgold = $request->dennimgslide;
                if($stt !="no-img.png"){
                    while(file_exists("public/img/listproduct/".$imgold))
                    {
                        unlink("public/img/listproduct/".$imgold);
                    }
                }
            return redirect('admin/listproduct/liststt')->with('thongbao','Xóa thành công');
        }else{
            return redirect('admin/listproduct/liststt')->with('thongbao','Xóa không thành công, Bạn cần chuyển sản phẩm quan trạng thái khác trạng thái này');
        }
        

    }
}
