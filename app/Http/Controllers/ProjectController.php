<?php

namespace App\Http\Controllers;

use App\Project;
use App\Language;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ListProject(){
        $projects = Project::all();
        $Language = Language::all();
        return view('computer.admin.project',['projects'=>$projects,'langs'=>$Language]);
    }
    public function AddProject(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'nntitle' => 'required',
                'nnlink' => 'required',
                'nnnumber' => 'numeric',
                'nnavatarfile' => 'image|max:500000',                
            ],[
                'nntitle.required' => 'Bạn cần thêm tiêu đề ứng dụng',
                'nnlink.required'=> 'Link ứng dụng ko được để trống (#)',
                'nnnumber.numeric'     => 'Thứ tự cần phải là số',
                'nnavatarfile.image' => 'File phải là hình ảnh',
                'nnavatarfile.max' => 'File có  dung lượng quá lớn',

            ]);
        $project = new Project;
        $project->idlang = 1;
        $project->title = $request->nntitle;
        $project->link = $request->nnlink;
        $project->status = $request->nnhide;
        $project->number = $request->nnnumber;
        if($request->hasFile('nnavatarfile')){
                $file = $request->file('nnavatarfile');
                $nameimg = changeTitle($file->getClientOriginalName()); 
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
                while(file_exists("public/img/projects/".$hinh))
                {
                    $hinh = "nt7solution-".str_random(6)."_".$nameimg;
                }
                $file->move("public/img/projects",$hinh);
                $project->img = "public/img/projects/".$hinh;
            }else{
                $project->img = "no-img.png";
            }
        $project->save();
        return redirect('admin/project/list')->with('thongbao','Thêm thành công');
    }
    public function EditProject(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennid]);   
        $this->validate($request,[
                'enntitle' => 'required',
                'ennlink' => 'required',
                'ennnumber' => 'numeric',
                'ennavatarfile' => 'image|max:500000',                
            ],[
                'enntitle.required' => 'Bạn cần thêm tiêu đề ứng dụng',
                'ennlink.required'=> 'Link ứng dụng ko được để trống (#)',
                'ennnumber.numeric'     => 'Thứ tự cần phải là số',
                'ennavatarfile.image' => 'File phải là hình ảnh',
                'ennavatarfile.max' => 'File ảnh có dung lượng quá lớn',

            ]);
        $project = Project::find($request->ennid);
        $project->idlang = 1;
        $project->title = $request->enntitle;
        $project->link = $request->ennlink;
        $project->status = $request->ennhide;
        $project->number = $request->ennnumber;
        if($request->hasFile('ennavatarfile')){
            $file = $request->file('ennavatarfile');
            $nameimg = changeTitle($file->getClientOriginalName()); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/projects/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/projects",$hinh);
            // removefile
            $imgold = $request->ennimguserold;
            if($imgold !="no-img.png"){
                while(file_exists($imgold))
                {
                    unlink($imgold);
                }
            }
            
            $project->img = "public/img/projects/".$hinh;
        }
        $project->save();
        return redirect('admin/project/list')->with('thongbao','sửa thành công');
    }
    public function DeleteProject(Request $request){
        $project = Project::find($request->dennid);
        $project->delete();
        $imgold = $request->dennimg;
            if($imgold !="no-img.png"){
                while(file_exists($imgold))
                {
                    unlink($imgold);
                }
            }
        return redirect('admin/project/list')->with('thongbao','Xóa thành công');

    }
}
