<?php

namespace App\Http\Controllers;

use App\Socical;
use App\Language;
use Illuminate\Http\Request;

class SocicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ListSocical(){
        $socical = Socical::all();
        $Language = Language::all();
        return view('computer.admin.socical',['socicals'=>$socical,'langs'=>$Language]);
    }
    public function AddSocical(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'nnname' => 'required',
                'nnlink' => 'required',
                'nnicon' => 'required',               
            ],[
                'nnname.required'=> 'name không được bỏ trống',
                'nnlink.required'=> 'link không được bỏ trống',
                'nnlink.required'=> 'icon không được bỏ trống',

            ]);
        $socical = new Socical;
        $socical->idlang = $request->nnlang;
        $socical->name = $request->nnname;
        $socical->link = $request->nnlink;
        $socical->icon = $request->nnicon;
        $socical->hide = $request->nnhide;
        $socical->save();
        return redirect('admin/socical/list')->with('thongbao','thêm thành công');
    }
    public function EditSocical(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidsocical]);   
        $this->validate($request,[
                'ennname' => 'required',
                'ennlink' => 'required',
                'ennicon' => 'required',               
            ],[
                'ennname.required'=> 'name không được bỏ trống',
                'ennlink.required'=> 'link không được bỏ trống',
                'ennlink.required'=> 'icon không được bỏ trống',

            ]);
        $socical = Socical::find($request->ennidsocical);
        $socical->idlang = $request->ennlang;
        $socical->name = $request->ennname;
        $socical->link = $request->ennlink;
        $socical->icon = $request->ennicon;
        $socical->hide = $request->ennhide;
        $socical->save();
        return redirect('admin/socical/list')->with('thongbao','sửa thành công');
    }
    public function DeleteSocical(Request $request){
        $socical = Socical::find($request->dennidsocical);
        $socical->delete();
        return redirect('admin/socical/list')->with('thongbao','Xóa thành công');

    }
}
