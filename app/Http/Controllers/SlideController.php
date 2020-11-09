<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Language;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ListSlide(){
        $Slides = Slide::all();
        $Language = Language::all();
        return view('computer.admin.slide',['slides'=>$Slides,'langs'=>$Language]);
    }
    public function AddSlide(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'nntitle' => 'required',
                'nnlinknew' => 'required',
                'nnnumber' => 'numeric',
                'nnavatarfile' => 'image|max:500000',                
            ],[
                'nntitle.required' => 'Bạn cần thêm tiêu đề slide',
                'nnlinknew.required'=> 'Link bài viết ko được để trống (#)',
                'nnnumber.numeric'     => 'Slide số cần phải là số',
                'nnavatarfile.image' => 'Avatar phải là hình ảnh',
                'nnavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $slide = new Slide;
        $slide->idlang = $request->nnlang;
        $slide->title = $request->nntitle;
        $slide->linknew = $request->nnlinknew;
        $slide->linkyoutube = $request->nnyoutube;
        $slide->status = $request->nnhide;
        $slide->number = $request->nnnumber;
        if($request->hasFile('nnavatarfile')){
                $file = $request->file('nnavatarfile');
                $nameimg = changeTitle($file->getClientOriginalName()); 
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
                while(file_exists("public/img/slide/".$hinh))
                {
                    $hinh = "nt7solution-".str_random(6)."_".$nameimg;
                }
                $file->move("public/img/slide",$hinh);
                $slide->img = $hinh;
            }else{
                $slide->img = "no-img.png";
            }
        $slide->save();
        return redirect('admin/slide/list')->with('thongbao','thêm thành công');
    }
    public function EditSlide(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidslide]);   
        $this->validate($request,[
                'enntitle' => 'required',
                'ennlinknew' => 'required',
                'ennnumber' => 'numeric',
                'ennavatarfile' => 'image|max:500000',                
            ],[
                'enntitle.required' => 'Bạn cần thêm tiêu đề slide',
                'ennlinknew.required'=> 'Link bài viết ko được để trống (#)',
                'ennnumber.numeric'     => 'Slide số cần phải là số',
                'ennavatarfile.image' => 'Avatar phải là hình ảnh',
                'ennavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $slide = Slide::find($request->ennidslide);
        $slide->idlang = $request->ennlang;
        $slide->title = $request->enntitle;
        $slide->linknew = $request->ennlinknew;
        $slide->linkyoutube = $request->ennyoutube;
        $slide->status = $request->ennhide;
        $slide->number = $request->ennnumber;
        if($request->hasFile('ennavatarfile')){
            $file = $request->file('ennavatarfile');
            $nameimg = changeTitle($file->getClientOriginalName()); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/slide/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/slide",$hinh);
            // removefile
            $imgold = $request->ennimguserold;
            if($imgold !="no-img.png"){
                while(file_exists("public/img/slide/".$imgold))
                {
                    unlink("public/img/slide/".$imgold);
                }
            }
            
            $slide->img = $hinh;
        }
        $slide->save();
        return redirect('admin/slide/list')->with('thongbao','sửa thành công');
    }
    public function DleteSlide(Request $request){
        $slide = Slide::find($request->dennidslide);
        $slide->delete();
        $imgold = $request->dennimgslide;
            if($imgold !="no-img.png"){
                while(file_exists("public/img/slide/".$imgold))
                {
                    unlink("public/img/slide/".$imgold);
                }
            }
        return redirect('admin/slide/list')->with('thongbao','Xóa thành công');

    }
}
