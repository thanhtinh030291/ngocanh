<?php

namespace App\Http\Controllers;

use App\Maketting;
use App\GroupCustomers;
use App\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class MakettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ListMaketting(){
        $grcus = GroupCustomers::all();
        $maket = Maketting::all();
        return view('computer.admin.maketing',['grcus'=>$grcus,'maket'=>$maket]);
    }
    public function sendmail(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'nntitlemaketing' => 'required|max:255',
                'nncontentmaketing' => 'required|min:100',               
            ],[
                'nntitlemaketing.required' => 'Bạn cần thêm tiêu đề mail',
                'nntitlemaketing.max'  => 'Tiêu đề không quá 255 ký tự',
                'nncontentmaketing.required'=> 'Nội dung không được bỏ trống',
                'nncontentmaketing.min'=> 'Nội dung không được ngắn hơn 100 ký tự',
            ]);

    	$namcus = $request->nnnamecustomer;
    	$title = $request->nntitlemaketing;
    	$content = $request->nncontentmaketing;

    	if($namcus==0){
        	$listcus = Customers::all();
            foreach ($listcus as $cus) {
                $mail = $cus->cusemail;
                if($mail != NULL){
                    list($user, $domain) = explode('@', $mail);
                    if ($domain == 'gmail.com') {
                        Mail::send(array(),array('body' =>$content), function($message) use ($mail,$title,$content)
                        {
                            $message->from(Auth::user()->username, Auth::user()->fullname);
                            $message->to($mail)->subject($title)->setBody($content, 'text/html');
                        });
                    }   
                }
            }
            $grname = "Mọi khách hàng";
        }else{
        	$listcus = Customers::where('idgroup',$namcus)->get();
            foreach ($listcus as $cus) {
                $mail = $cus->cusemail;
                if($mail != NULL){
                    list($user, $domain) = explode('@', $mail);
                    if ($domain == 'gmail.com') {
                        Mail::send(array(),array('body' =>$content), function($message) use ($mail,$title,$content)
                        {
                            $message->from(Auth::user()->username, Auth::user()->fullname);
                            $message->to($mail)->subject($title)->setBody($content, 'text/html');
                        });
                    }   
                }
            }    
            $grc = GroupCustomers::find($namcus);  
            $grname = $grc->listname; 
        } 
       
        $maket  = new Maketting;
        $maket->title = $title; 
        $maket->content = $content; 
        $maket->username = Auth::user()->fullname; 
        $maket->customer = $grname;
        $maket->save();
        return redirect('admin/maketing/list')->with('thongbao','Chạy Maketting thành công');   
    }
}
