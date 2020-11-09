<?php

namespace App\Http\Controllers;

use App\ModNews;
use App\ListNew;
use Illuminate\Http\Request;

class ModNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function ListModNews(){
        $modnew = ModNews::all();
        return view('computer.admin.news.module',['modnews'=>$modnew]);
    }
    public function AddModNews(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'modname' => 'required|unique:modnews|unique:listnews,listname',
                'nnnumber' => 'numeric',               
            ],[
                'modname.required'=> 'Tên không được bỏ trống',
                'modname.unique'=> 'Tên phải là duy nhất',
                // 'nnnumber.required'=> 'Thứ tự hiện thị không được bỏ trống',
                'nnnumber.numeric'=> 'Thứ tự hiện thị phải là số',

            ]);
        $modnew = new ModNews;
        $modnew->idlang = $request->nnlang;
        $modnew->modname = $request->modname;
        $modnew->slug = changeTitle($request->modname);
        $modnew->modnumber = $request->nnnumber;
        $modnew->description = $request->nndescription;

        if($request->hasFile('nnavatarfile')){
            $file = $request->file('nnavatarfile');
            $nameimg = changeTitle($file->getClientOriginalName()); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/modnews/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/modnews",$hinh);
            $modnew->modimg = "public/img/modnews/".$hinh;
        }else{
            $modnew->modimg = "no-img.png";
        }

        $modnew->save();
        return redirect('admin/modnews/list')->with('thongbao','thêm thành công');
    }
    public function EditModNews(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidmodproduct]);   
        $this->validate($request,[
                'modname' => 'required|unique:modnews,modname,'.$request->ennidmodproduct.'|unique:listnews,listname',
                'ennnumber' => 'numeric',               
            ],[
                'modname.required'=> 'Tên không được bỏ trống',
                'modname.unique' => 'Tên phải là duy nhất', 
                // 'ennnumber.required'=> 'Thứ tự hiện thị không được bỏ trống',
                'ennnumber.numeric'=> 'Thứ tự hiện thị phải là số',

            ]);
        $modnew = ModNews::find($request->ennidmodproduct);
        $modnew->idlang = $request->ennlang;
        $modnew->modname = $request->modname;
        $modnew->slug = changeTitle($request->modname);
        $modnew->modnumber = $request->ennnumber;
        $modnew->description = $request->enndescription;


        if($request->hasFile('ennavatarfile')){
            $file = $request->file('ennavatarfile');
            $nameimg = changeTitle($file->getClientOriginalName()); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/modnews/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/modnews",$hinh);
            // removefile
            $imgold = $request->ennimguserold;
            if($imgold !="no-img.png"){
                while(file_exists($imgold))
                {
                    unlink($imgold);
                }
            }
            
            $modnew->modimg = "public/img/modnews/".$hinh;
        }


        $modnew->save();
        return redirect('admin/modnews/list')->with('thongbao','sửa thành công');
    }
    public function DeleteModNews(Request $request){
        $lisnew = ListNew::where('listidmod',$request->dennidmodproduct)->count();
        if($lisnew==0){
            $modnew = ModNews::find($request->dennidmodproduct);
            $modnew->delete();

            $imgold = $request->dennimgmod;
            if($imgold !="no-img.png"){
                while(file_exists($imgold))
                {
                    unlink($imgold);
                }
            }

            return redirect('admin/modnews/list')->with('thongbao','Xóa thành công');
        }else{
            return redirect('admin/modnews/list')->with('loi','Xóa không thành công, Bạn cần xóa list new thuộc thể loại này trước');
        }
    }
}
