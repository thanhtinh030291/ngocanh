<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\News;
use App\ModNews;
use App\ListNew;
use Session;

class NewsController extends Controller
{
    //
    public function GetListNews($idmod){

       $listnews = ListNew::where('listidmod',$idmod)->get();
        echo "<option value=''>---Vui lòng chọn Loại tin---</option>";       
        foreach ($listnews as $ls) {
            echo "<option value='".$ls->id."'>".$ls->listname."</option>";
        }	
    }
    public function ListNews(){
        $lang = Session::get('idlocale');
        $listnews = News::all();
        $modnews = ModNews::where('idlang',$lang)->get();
        $typenews = ListNew::all();
        return view('computer.admin.news.news',['lnews'=>$listnews,'modulepro'=>$modnews,'typenews'=>$typenews]);
    }
    public function AddNews(Request $request){
        session(['actionuser' => 'add']);    
  
        $this->validate($request,[
                'newsname' => 'required|unique:news',
                // 'nntagnew' => 'required',
                // 'nntomtatnew' => 'required',
                'nncontentnew' => 'required',
                'nnmodnews' => 'numeric',
                'nnavatarfile' => 'image|max:500000',                
            ],[
                'newsname.required'=> 'Tên bài viết ko được để trống (#)',
                'newsname.unique'=> 'Tên bài viết phải là duy nhất',
                'nnmodnews.numeric'=> 'Vui lòng chọn thể loại tin',
                'nntomtatnew.required'=> 'Tóm tắt bài viết ko được để trống (#)',
                'nntagnew.required'=> 'Tag viết ko được để trống (#)',
                'nncontentnew.required'=> 'Nội dung bài viết ko được để trống (#)',
                'nnavatarfile.image' => 'Avatar phải là hình ảnh',
                'nnavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $new = new News;
        $new->newsname = $request->newsname;
        $new->newalt = changeTitle(trim($request->newsname));
        $new->slug = changeTitle(trim($request->newsname));
        $str = str_replace("https://www.youtube.com/watch?v=","https://www.youtube.com/embed/",$request->nnyoutubenew);
        $new->newvideo = $str;
        $new->newintro = $request->nntomtatnew;
        $new->newcontent = $request->nncontentnew;
        $new->newkeywords = $request->nnkeywords;
        $new->newtag = $request->nntagnew;
        $new->newuser = Auth::user()->fullname;
        $new->newnumber = $request->nnhide;

        if($request->nnlistnew !=''){
            $new->idlistnew = $request->nnlistnew;
            $new->idmodnew  = $request->nnmodnews;

        } else {
            $new->idmodnew = $request->nnmodnews;
            $new->idlistnew = null;

        }
        if($request->hasFile('nnavatarfile')){
                $file = $request->file('nnavatarfile');
                $nameimg = changeTitle($file->getClientOriginalName()); 
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
                while(file_exists("public/img/news/".$hinh))
                {
                    $hinh = "nt7solution-".str_random(6)."_".$nameimg;
                }
                $file->move("public/img/news",$hinh);
                $new->newimg = $hinh;
            }else{
                $new->newimg = "no-img.png";
            }
        $new->save();
        return redirect('admin/news/list')->with('thongbao','thêm thành công');
    }
    public function EditNews(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidnews]);   
        $this->validate($request,[

                'newsname' => 'required|unique:news,newsname,'.$request->ennidnews,
                // 'enntagnew' => 'required',
                // 'enntomtatnew' => 'required',
                'enncontentnew' => 'required',
                'ennavatarfile' => 'image|max:500000',                
            ],[
                'newsname.required'=> 'Tên bài viết ko được để trống (#)',
                'newsname.unique'=> 'Tên bài viết phải là duy nhất',
                'enntomtatnew.required'=> 'Tóm tắt bài viết ko được để trống (#)',
                'enntagnew.required'=> 'Tag viết ko được để trống (#)',
                'enncontentnew.required'=> 'Nội dung bài viết ko được để trống (#)',
                'ennavatarfile.image' => 'Avatar phải là hình ảnh',
                'ennavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $new = News::find($request->ennidnews);
        $new->newsname = $request->newsname;
        $new->newalt = changeTitle(trim($request->newsname));
        $new->slug = changeTitle(trim($request->newsname));
        $str = str_replace("https://www.youtube.com/watch?v=","https://www.youtube.com/embed/",$request->ennyoutubenew);
        $new->newvideo = $str;
        $new->newintro = $request->enntomtatnew;
        $new->newcontent = $request->enncontentnew;
        $new->newkeywords = $request->ennkeywords;
        $new->newtag = $request->enntagnew;
        $new->newuser = Auth::user()->fullname;
        $new->newnumber = $request->ennhide;
        if($request->ennlistnew !=''){
            $new->idlistnew = $request->ennlistnew;
            $new->idmodnew  = $request->ennmodnews;

        } else {
            $new->idmodnew = $request->ennmodnews;
            $new->idlistnew = null;

        }
        // dd($new);
        if($request->hasFile('ennavatarfile')){
            $file = $request->file('ennavatarfile');
            $nameimg = changeTitle($file->getClientOriginalName()); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/news/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/news",$hinh);
            // removefile
            $imgold = $request->ennimguserold;
            if($imgold !="no-img.png"){
                while(file_exists("public/img/news/".$imgold))
                {
                    unlink("public/img/news/".$imgold);
                }
            }
            
            $new->newimg = $hinh;
        }
        $new->save();
        return redirect('admin/news/list')->with('thongbao','sửa thành công');
    }
    public function DeleteNews(Request $request){
        $new= News::find($request->dennidnew);
        $new->delete();
        $imgold = $request->dennimgnew;
            if($imgold !="no-img.png"){
                while(file_exists("public/img/news/".$imgold))
                {
                    unlink("public/img/news/".$imgold);
                }
            }
        return redirect('admin/news/list')->with('thongbao','Xóa thành công');

    }
}
