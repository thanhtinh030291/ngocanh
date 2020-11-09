<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Contact;
use Mail;
use Session;
class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ListLang(){
        $languages = Language::all();
        return view('computer.admin.languages',['languages'=>$languages]);
    }
    // public function AddLang(Request $request){
    //     session(['actionuser' => 'add']);        
    //     $this->validate($request,[
    //             'name' => 'required|unique:languages',
    //             'nnchar' => 'required|max:5',
    //             'nncurrency' => 'required|max:5',
    //             'nnavatarfile' => 'image|max:500000',                
    //         ],[
    //             'name.required' => 'Bạn cần thêm tên ngôn ngữ',
    //             'name.unique'  => 'Ngôn ngữ đã sử dụng',
    //             'nnchar.required'=> 'Ký hiệu không được bỏ trống',
    //             'nnchar.max'     => 'Ký hiệu không quá 5 ký tự',
    //             'nncurrency.required'=> 'Ký hiệu không được bỏ trống',
    //             'nncurrency.max'     => 'Ký hiệu không quá 5 ký tự',
    //             'nnavatarfile.image' => 'Avatar phải là hình ảnh',
    //             'nnavatarfile.max' => 'Avatar dung lượng quá lớn',

    //         ]);
    //     $lang = new Language;
    //     $lang->name = $request->name;
    //     $lang->char = $request->nnchar;
    //     if($request->hasFile('nnavatarfile')){
    //             $file = $request->file('nnavatarfile');
    //             $nameimg = $file->getClientOriginalName(); 
    //             $hinh = "longtriCo".str_random(6)."_".$nameimg;
    //             while(file_exists("public/img/lang/".$hinh))
    //             {
    //                 $hinh = "longtriCo".str_random(6)."_".$nameimg;
    //             }
    //             $file->move("public/img/lang",$hinh);
    //             $lang->img = $hinh;
    //         }else{
    //             $lang->img = "no-img.png";
    //         }
    //     $lang->save();
    //     return redirect('admin/lang/list')->with('thongbao','thêm thành công');
    // }
    public function EditLang(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidlang]);   
        $this->validate($request,[
                'enncurrency' => 'required|max:5',
                'ennchar' => 'required|max:5',
                'ennavatarfile' => 'image|max:500000',                
            ],[
                'ennchar.required'=> 'Ký hiệu không được bỏ trống',
                'ennchar.max'     => 'Ký hiệu không quá 5 ký tự',
                'enncurrency.required'=> 'Đơn vị tiền tệ không được bỏ trống',
                'enncurrency.max'     => 'Đơn vị tiền tệ không quá 5 ký tự',
                'ennavatarfile.image' => 'Avatar phải là hình ảnh',
                'ennavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $lang = Language::find($request->ennidlang);
        $lang->name = $request->ennname;
        $lang->char = $request->ennchar;
        $lang->currency = $request->enncurrency;
        if($request->hasFile('ennavatarfile')){
            $file = $request->file('ennavatarfile');
            $nameimg = $file->getClientOriginalName(); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/lang/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/lang",$hinh);
            // removefile
            $imgold = $request->ennimguserold;
            if($imgold !="no-img.png"){
                while(file_exists("public/img/lang/".$imgold))
                {
                    unlink("public/img/lang/".$imgold);
                }
            }
            
            $lang->img = $hinh;
        }
        $lang->save();
        return redirect('admin/lang/list')->with('thongbao','sửa thành công');
    }

    public function getContactEdit(){ 
        $lang = Session::get('idlocale');
        if($lang!=2){
          $id = 1;  
        }else $id = 2;
        
        $contact = Contact::find($id);
        return view('computer.admin.contact',['contact'=>$contact]);
    }
    public function postContactEdit(Request $request){
        $lang = Session::get('idlocale');
        if($lang!=2){
          $id = 1;  
        }else $id = 2;
        
        $contact = Contact::find($id); 
        $this->validate($request,
            [
             'txtMap'=>'required',
             'txtNameCo'=>'required',
             'txtAddress'=>'required',
             'txtPhone'=>'required',
             'txtMail'=>'required',
             // 'api_username'=>'required',
             // 'api_password'=>'required',
             // 'api_signature'=>'required',
             'txtTime'=>'required'
            ],
            ['txtMap.required'=>'Xin nhập url bản đồ',
            'txtNameCo.required'=>'Xin nhập tên công ty',
            'txtAddress.required'=>'Xin nhập địa chỉ công ty',
            'txtPhone.required'=>'Xin nhập số điện thoại',
            'txtMail.required'=>'Xin nhập mail công ty',
            'txtTime.required'=>'Xin nhập thời gian làm việc'   
            ]
        );      
        $contact->map       = $request->txtMap;
        $contact->nameco    = $request->txtNameCo;
        $contact->address   = $request->txtAddress;
        $contact->phone     = $request->txtPhone;
        $contact->mail      = $request->txtMail;
        $contact->time      = $request->txtTime;
        $contact->slogan    = $request->txtSlogan;
        $contact->slogan_intro    = $request->txtSloganIntro;
        $contact->fanpage   = $request->txtFanpage;
        $contact->website   = $request->txtWebsite;
        $contact->api_username   = $request->api_username;
        $contact->api_password   = $request->api_password;

        $contact->seo_title         = $request->seo_title;
        $contact->seo_keyword       = $request->seo_keyword;
        $contact->seo_description   = $request->seo_description;
        $contact->fb_app_id         = $request->fb_app_id;
        $contact->google_analyst    = $request->google_analyst;


        if($request->hasFile('seo_image')){
            $file = $request->file('seo_image');
            $nameimg = $file->getClientOriginalName(); 
            $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            while(file_exists("public/img/".$hinh))
            {
                $hinh = "nt7solution-".str_random(6)."_".$nameimg;
            }
            $file->move("public/img",$hinh);

            // removefile
            // $imgold = $request->ennimguserold;
            // if($imgold !="no-img.png"){
            //     while(file_exists("public/img/".$imgold))
            //     {
            //         unlink("public/img/".$imgold);
            //     }
            // }
            
            $contact->seo_image = "public/img/".$hinh;
        }


        $contact->save();
        $contact = Contact::find($id);
        return redirect('admin/contact')->with('thongbao','Cập nhật thành công');
    }


}
