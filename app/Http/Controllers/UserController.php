<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\User;
use Session;
use App\Language;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //

    public function GetLogoutAdmin(){
        Auth::logout();
        return redirect('auth/login');
    }
    public function GetLoginAdmin(){
        if (Auth::check()) {
            return redirect('/admin');
        }else{
            
            return view('computer.login');
        }
    }
    public function ChangePassAdmin(Request $request){
        session(['actionuser' => 'change']);
        $this->validate($request,[
                'nnpasswordold' => 'required',
                'nnpasswordnew' => 'required|min:6|max:60',
                'nnrepasswordnew' => 'required|same:nnpasswordnew',
            ],[
                'nnpasswordold.required' => 'Vui lòng nhập mật khẩu hiện tại',
                'nnpasswordnew.required' => 'Vui lòng nhập mật khẩu mới',
                'nnpasswordnew.min' => 'Mật khẩu mới quá ngắn',
                'nnpasswordnew.max' => 'Mật khâu mới quá dài',
                'nnrepasswordnew.required' => 'Vui lòng nhập lại mật khẩu mới',
                'nnrepasswordnew.same' => 'Mật khẩu mới không trùng nhau',
            ]);
        $user = User::find(Auth::user()->id);
        if(Hash::check($request->nnpasswordold,$user->password)){            
            $user->password = bcrypt($request->nnpasswordnew);
            $user->save();
            return redirect()->back()->with('thongbao','Thành công');
        }else{
            return redirect()->back()->with('thongbao','Thất bại');
        }

    }
    public function PostLoginAdmin(Request $request){
        $this->validate($request,[
                'username' => 'required',
                'nnpassword' => 'required|min:6|max:60'
            ],[
                'username.required' => 'Vui lòng nhập email đăng nhập',
                'nnpassword.required' => 'Vui lòng nhập mật khẩu đăng nhập',
                'nnpassword.min' => 'Mật khẩu quá ngắn',
                'nnpassword.max' => 'Mật khâu quá dài'
            ]);
        $remember = $request->remember_me;
        if(Auth::attempt(['username'=>$request->username,'password'=>$request->nnpassword],$remember))
        {   
            $lang = \Config::get('app.locale');
            $langok = Language::where('char',$lang)->first();
            \Session::put('locale',$langok->char);
            \Session::put('idlocale',$langok->id);
            \Session::save();
            return redirect('/admin')->with('thongbao','Đăng nhập thành công');;
        }else{
            return redirect('auth/login')->with('thongbao','Thông tin đăng nhập sai');
        }
    }
    public function ListUser(){
        $user = User::all();
        return view('computer.admin.users',['users'=>$user]);
    }
    public function AddUserAdmin(Request $request){
        session(['actionuser' => 'add']);
        $this->validate($request,[
                'username' => 'required|unique:users|email',
                'nnfullname' => 'required',
                'nnaddress' => 'required',
                'nnphone' => 'required|numeric',
                'nnhometown' => 'required',
                'nnbirthday' => 'required',
                'nnavatarfile' => 'image|max:500000',
                'password' => 'required|min:6|max:60',
                'nnrepass' => 'required|same:password',
            ],[
                'username.required' => 'Bạn chưa nhập tên user',
                'username.unique' => 'Tên đăng nhập đã tồn tại',
                'username.email' => 'Tên đăng nhập phải là Email',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu quá ngắn',
                'password.max' => 'Mật khẩu quá dài',
                'nnrepass.required' => 'Bạn chưa nhập lại mật khẩu',
                'nnrepass.same' => 'Mật khẩu chưa trùng nhau',
                'nnfullname.required' => 'Bạn chưa nhập tên nhân viên',
                'nnaddress.required' => 'Bạn chưa nhập địa chỉ nhân viên',
                'nnphone.required' => 'Bạn chưa nhập số điện thoại nhân viên',
                'nnphone.numeric' => 'Số điện thoại phải là số',
                'nnavatarfile.image' => 'Avatar phải là hình ảnh',
                'nnavatarfile.max' => 'Avatar dung lượng quá lớn',
                'nnhometown.required' => 'Bạn chưa nhập quê quán nhân viên',
                'nnbirthday.required' => 'Bạn chưa nhập ngày sinh nhân viên',
            ]);
        $update = $request->nnupdate;
        if($update==0){
            $user = new User;
            if($request->hasFile('nnavatarfile')){
                $file = $request->file('nnavatarfile');
                $nameimg = $file->getClientOriginalName(); 
                $hinh = "longtriCo".str_random(6)."_".$nameimg;
                while(file_exists("public/img/user/".$hinh))
                {
                    $hinh = "longtriCo".str_random(6)."_".$nameimg;
                }
                $file->move("public/img/user",$hinh);
                $user->avatar = $hinh;
            }else{
                $user->avatar = "no-img.png";
            }
            
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->fullname = $request->nnfullname;
            $user->address = $request->nnaddress;
            $user->phone = $request->nnphone;       
            $user->hometown = $request->nnhometown;
            $user->note = $request->nnnote;
            $bday = date_create($request->birthday);
            $user->birthday = date_format($bday,"Y/m/d");
            $level = $request->nnlevel;
            $userlv = Auth::user()->level;
            if($userlv >= $level){
                $user->level = $level;
            }else {
                $user->level = $userlv;
            }
            $user->save();

            return redirect('admin/user/listuser')->with('thongbao','thêm thành công');
        }else{
            
        }       
    }
    public function EditUserAdmin(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->enniduser]);
        $this->validate($request,[
                'ennfullname' => 'required',
                'ennaddress' => 'required',
                'ennphone' => 'required|numeric',
                'ennhometown' => 'required',
                'ennbirthday' => 'required',
                'ennavatarfile' => 'image|max:500000',
            ],[
                
                'ennrepass.required' => 'Bạn chưa nhập lại mật khẩu',
                'ennrepass.same' => 'Mật khẩu chưa trùng nhau',
                'ennfullname.required' => 'Bạn chưa nhập tên nhân viên',
                'ennaddress.required' => 'Bạn chưa nhập địa chỉ nhân viên',
                'ennphone.required' => 'Bạn chưa nhập số điện thoại nhân viên',
                'ennphone.numeric' => 'Số điện thoại phải là số',
                'ennavatarfile.image' => 'Avatar phải là hình ảnh',
                'ennavatarfile.max' => 'Avatar dung lượng quá lớn',
                'ennhometown.required' => 'Bạn chưa nhập quê quán nhân viên',
                'ennbirthday.required' => 'Bạn chưa nhập ngày sinh nhân viên',
            ]);
        if($request->newpassword != null){
            $this->validate($request,[
                'newpassword' => 'min:6|max:60',
                'nnrepassnew' => 'same:newpassword',
            ],[
                'newpassword.min' => 'Mật khẩu mới quá ngắn',
                'newpassword.max' => 'Mật khâu mới quá dài',
                'nnrepassnew.same' => 'Mật khẩu mới không trùng nhau',
            ]);
        }
        $me = Auth::user();
        $user1 = User::where('id',$request->enniduser)->first();
        if( $me->level < $user1->level || $me->id !=1 && $me->id != $user1->id ){
            return redirect('admin/user/listuser')->with('errorus','Bạn không đủ quyền sửa user này');
        }else{  
            $user = User::find($request->enniduser);
            if($request->hasFile('ennavatarfile')){
                $file = $request->file('ennavatarfile');
                $nameimg = $file->getClientOriginalName(); 
                $hinh = "longtriCo".str_random(6)."_".$nameimg;
                while(file_exists("public/img/user/".$hinh))
                {
                    $hinh = "longtriCo".str_random(6)."_".$nameimg;
                }
                $file->move("public/img/user",$hinh);
                // removefile
                $imgold = $request->ennimguserold;
                if($imgold !="no-img.png"){
                    while(file_exists("public/img/user/".$imgold))
                    {
                        unlink("public/img/user/".$imgold);
                    }
                }
                
                $user->avatar = $hinh;
            }
            
            $user->username = $request->ennusername;
            $user->fullname = $request->ennfullname;
            $user->address = $request->ennaddress;
            $user->phone = $request->ennphone;       
            $user->hometown = $request->ennhometown;
            $user->note = $request->ennnote;
            $bday = date_create($request->birthday);
            $user->birthday = date_format($bday,"Y/m/d");
            $level = $request->ennlevel;
            $userlv = Auth::user()->level;
            if($userlv >= $level){
                $user->level = $level;
            }else {
                $user->level = $userlv;
            }
            if($user->id !=1 && $request->newpassword != " " ){
                $user->password = bcrypt($request->newpassword);
            }
            $user->save();

            return redirect('admin/user/listuser')->with('thongbao','Sửa User thành công');
        }    
    }
    public function DeleteAdmin(Request $request){
        $me = Auth::user();
        $user = User::where('id',$request->enndeleteuid)->first();
        if(($user->id == 1) || $me->level <= $user->level){
            return redirect('admin/user/listuser')->with('errorus','Bạn không đủ quyền xóa user này');
        }else{            
            $imgold = $request->dennimgslide;
                if($imgold !="no-img.png"){
                    while(file_exists("public/img/user/".$imgold))
                    {
                        unlink("public/img/user/".$imgold);
                    }
                }
            $user->delete();
            return redirect('admin/user/listuser')->with('thongbao','Xóa thành công');
        }
    }
}
