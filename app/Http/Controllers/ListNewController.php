<?php

namespace App\Http\Controllers;

use App\ListNew;
use App\ModNews;
use App\News;
use Illuminate\Http\Request;
use Session;

class ListNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function List2News(){
        $listproduct = ListNew::all();
        $lang = Session::get('idlocale');
        $modulepro = ModNews::where('idlang',$lang)->get();
        return view('computer.admin.news.listnews',['news'=>$listproduct,'modulepro'=>$modulepro]);
    }
    public function AddListNews(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'listname' => 'required|unique:listnews|unique:modnews,modname',
                'nnnumber' => 'numeric',
                'nntheloai' => 'numeric',
                'nnavatarfile' => 'image|max:500000',                
            ],[
                'listname.required' => 'Bạn cần thêm tên loại',
                'listname.unique' => 'Tên phải là duy nhất',
                'nnnumber.numeric'     => 'Hiện thị phải là số',
                'nntheloai.numeric'     => 'Bạn cần chọn thể loại tin',
                'nnavatarfile.image' => 'Avatar phải là hình ảnh',
                'nnavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $listproduct = new ListNew;
        $listproduct->listname = $request->listname;
        $listproduct->slug = changeTitle($request->listname);
        $listproduct->listnumber = $request->nnnumber;
        $listproduct->description = $request->nndescription;
        $listproduct->listidmod = $request->nntheloai;
        if($request->hasFile('nnavatarfile')){
            $file = $request->file('nnavatarfile');
            $nameimg = $file->getClientOriginalName(); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/listnews/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/listnews",$hinh);
            $listproduct->listimg = "public/img/listnews/".$hinh;
        }else{
            $listproduct->listimg = "no-img.png";
        }
        $listproduct->save();
        return redirect('admin/listnews/list')->with('thongbao','thêm thành công');
    }
    public function EditListNews(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidlistpro]);   
        $this->validate($request,[
                'listname' => 'required|unique:listnews,listname,'.$request->ennidlistpro.'|unique:modnews,modname',
                'ennnumber' => 'numeric',
                'enntheloai' => 'numeric',
                'ennavatarfile' => 'image|max:500000',                
            ],[
                'listname.required' => 'Bạn cần thêm tên loại',
                'listname.unique' => 'Tên phải là duy nhất',
                'ennnumber.numeric'     => 'Hiện thị phải là số',
                'enntheloai.numeric'     => 'Bạn cần chọn thể loại tin',
                'ennavatarfile.image' => 'Avatar phải là hình ảnh',
                'ennavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $listproduct = ListNew::find($request->ennidlistpro);
        $listproduct->listname = $request->listname;
        $listproduct->slug = changeTitle($request->listname);
        $listproduct->listnumber = $request->ennnumber;
        $listproduct->description = $request->enndescription;
        $listproduct->listidmod = $request->enntheloai;
        if($request->hasFile('ennavatarfile')){
            $file = $request->file('ennavatarfile');
            $nameimg = $file->getClientOriginalName(); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/listnews/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/listnews",$hinh);
            // removefile
            $imgold = $request->ennimguserold;
            if($imgold !="no-img.png"){
                while(file_exists($imgold))
                {
                    unlink($imgold);
                }
            }
            
            $listproduct->listimg = "public/img/listnews/".$hinh;
        }
        $listproduct->save();
        return redirect('admin/listnews/list')->with('thongbao','sửa thành công');
    }
    public function DeleteListNews(Request $request){
        $lisnew = News::where('idlistnew',$request->dennidlistpro)->count();
        if($lisnew==0){
            $listproduct = ListNew::find($request->dennidlistpro);
            $listproduct->delete();
            $imgold = $request->dennimglistpro;
                if($imgold !="no-img.png"){
                    while(file_exists($imgold))
                    {
                        unlink($imgold);
                    }
                }
            return redirect('admin/listnews/list')->with('thongbao','Xóa thành công');
        }else{
            return redirect('admin/listnews/list')->with('loi','Xóa không thành công, Bạn cần xóa tin thuộc loại tin này trước');
        }

    }
}
