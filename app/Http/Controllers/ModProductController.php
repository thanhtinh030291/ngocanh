<?php

namespace App\Http\Controllers;

use App\ModProduct;
use App\Language;
use App\Translate;
use App\ListProduct;

use Illuminate\Http\Request;
use Session;

class ModProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function ListModPro(){
        $modproduct = ModProduct::all();
        $Language = Language::all();
        return view('computer.admin.product.module',['modproducts'=>$modproduct,'langs'=>$Language]);
    }
    public function AddModPro(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'modname' => 'required|unique:modproducts|unique:listproducts,listname',
                'nnnumber' => 'numeric',               
            ],[
                'modname.required'=> 'Tên không được bỏ trống',
                'modname.unique'=> 'Tên phải là duy nhất',
                // 'nnnumber.required'=> 'Thứ tự hiện thị không được bỏ trống',
                'nnnumber.numeric'=> 'Thứ tự hiện thị phải là số',

            ]);
        $modproduct = new ModProduct;
        $modproduct->idlang = Session::get('idlocale');
        $modproduct->modname = $request->modname;
        $modproduct->slug = changeTitle($request->modname);
        $modproduct->modnumber = $request->nnnumber;
        $modproduct->modtype = $request->nnmodtype; 
        $modproduct->description = $request->nndescription;

        if($request->hasFile('nnavatarfile')){
            $file = $request->file('nnavatarfile');
            $nameimg = changeTitle($file->getClientOriginalName()); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/modproduct/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/modproduct",$hinh);
            $modproduct->modimg = "public/img/modproduct/".$hinh;
        }else{
            $modproduct->modimg = "no-img.png";
        }

        if($modproduct->save()){
            $trans = new Translate;
            $trans->trname = $request->modname;
            $trans->trcate = 1;
            $trans->tridlang = 2;
            $trans->trid = $modproduct->id;
            $trans->save();
            $transc = new Translate;
            $transc->trname = $request->modname;
            $transc->trcate = 1;
            $transc->tridlang = 1;
            $transc->trid = $modproduct->id;
            $transc->save();
        }
        return redirect('admin/modproduct/list')->with('thongbao','thêm thành công');
    }
    public function EditModPro(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidmodproduct]);   
        $this->validate($request,[
                'modname' => 'required|unique:modproducts,modname,'.$request->ennidmodproduct.'|unique:listproducts,listname',
                // 'ennnumber' => 'required|numeric',               
            ],[
                'modname.required'=> 'Tên không được bỏ trống',
                'modname.unique' => 'Tên phải là duy nhất', 
                // 'ennnumber.required'=> 'Thứ tự hiện thị không được bỏ trống',
                // 'ennnumber.numeric'=> 'Thứ tự hiện thị phải là số',

            ]);
        $modproduct = ModProduct::find($request->ennidmodproduct);
        $modproduct->modname = $request->modname;
        $modproduct->slug = changeTitle($request->modname);
        $modproduct->modnumber = $request->ennnumber;
        $modproduct->modtype = $request->ennmodtype;

        $modproduct->description = $request->enndescription;


        if($request->hasFile('ennavatarfile')){
            $file = $request->file('ennavatarfile');
            $nameimg = changeTitle($file->getClientOriginalName()); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/modproduct/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/modproduct",$hinh);
            // removefile
            $imgold = $request->ennimguserold;
            if($imgold !="no-img.png"){
                while(file_exists($imgold))
                {
                    unlink($imgold);
                }
            }
            
            $modproduct->modimg = "public/img/modproduct/".$hinh;
        }

        if($modproduct->save()){
            $lang = Session::get('idlocale');
            $trans = Translate::where('trcate',1)->where('tridlang',$lang)->where('trid',$modproduct->id)->first();
            $trans->trname = $modproduct->modname;
            $trans->save();
        }
        return redirect('admin/modproduct/list')->with('thongbao','sửa thành công');
    }
    public function DeleteModPro(Request $request){
        $lis = ListProduct::where('listidmod',$request->dennidmodproduct)->count();
        if($lis==0){
            $modproduct = ModProduct::find($request->dennidmodproduct);
            $modproduct->delete();

            $imgold = $request->dennimgmod;
            if($imgold !="no-img.png"){
                while(file_exists($imgold))
                {
                    unlink($imgold);
                }
            }
            
            $trans = Translate::where('trcate',1)->where('trid',$request->dennidmodproduct)->get();
            foreach ($trans as $tran) {
                $tran->delete();
            }
            return redirect('admin/modproduct/list')->with('thongbao','Xóa thành công');
        }else{
            return redirect('admin/modproduct/list')->with('thongbao','Xóa không thành công, Bạn cần xóa các loại sản phẩm thuộc thể loại này');

        }
        

    }
}
