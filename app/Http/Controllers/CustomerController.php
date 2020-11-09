<?php

namespace App\Http\Controllers;

use App\Customers;
use App\GroupCustomers;
use App\Order;
use Illuminate\Http\Request;

use Socialite; 
use Session;
use App\Cities;
use App\Districts;
use App\Wards;
use App\Contactus;

class CustomerController extends Controller
{


    public function login_social($provider, $page_return)
    {
        Session::put('page_return_login_social', $page_return);
        return redirect("login/redirect/".$provider); 
    }
 
    public function login_redirect ($provider)
    {
        return Socialite::driver($provider)->redirect();  
    }

    public function login_callback($provider)
    {
        $user = Socialite::driver($provider)->user();
        // dd($user);
        if (!empty($user)) {

          $item_user = Customers::where("idloginsocial",'=',$user->id)->first();
          if(count($item_user) == 0){
            $item_user = new Customers;
            $item_user->idgroup         = 1;
            $item_user->idloginsocial   = $user->id;
            $item_user->cusfullname     = $user->name;
            if(isset($user->email)){
              $item_user->cusemail        = $user->email;
            }else{
              $item_user->cusemail        = "";
            }
            $item_user->cusimg          = $user->avatar;
            $item_user->status          = 1;
            $item_user->cusaddress      = "";
            $item_user->save();
          }


          Session::put('logined_cus', 1);
          Session::put('logined_cusid', $item_user->id);
          Session::put('logined_cusfullname', $item_user->cusfullname);
          Session::put('logined_cusemail', $item_user->cusemail);
          Session::put('logined_cusphone', $item_user->cusphone);
          Session::put('logined_cusimg', $item_user->cusimg);
          Session::put('logined_cusaddress', $item_user->cusaddress);

          // ==============save info to order =============== 
          Session::put('pay_name', $item_user->cusfullname);
          Session::put('pay_phone', $item_user->cusphone);
          Session::put('pay_address', $item_user->cusaddress);

          Session::put('shipping_name', session('pay_name'));
          Session::put('shipping_phone', session('pay_phone'));
          Session::put('shipping_address', session('pay_address'));
          Session::put('same_address', 1);
          Session::put('shipping_error', 0); 
          // =============================
            
        }

        $page_return = Session::get("page_return_login_social");
        return redirect($page_return);
    } 


    public function register_ajax(Request $request){ 
        $fullname         = $request->input('fullname');
        $phone            = $request->input('phone');
        $address          = $request->input('address');
        $email            = $request->input('email');
        $password         = $request->input('password');
        $repassword       = $request->input('repassword');

        $register_error = 0;

        $error = array(
          "success"      => "",
          "fullname"      => "",
          "phone"         => "",
          "address"       => "",
          "email"         => "",
          "password"      => "",
          "repassword"    => "",
          );

        if(empty($fullname)){
          $error["fullname"] = trans('form.err_fullname');
          $register_error = 1;
        }

        if(empty($phone)){
          $error["phone"] = trans('form.err_phone');
          $register_error = 1;
        }

        if(empty($address)){
          $error["address"] = trans('form.err_address');
          $register_error = 1;
        }

        if(empty($email)){
          $error["email"] = trans('form.err_email');
          $register_error = 1;
        }

        if(empty($password)){
          $error["password"] = trans('form.err_password');
          $register_error = 1;
        }

        if(empty($repassword)){
          $error["repassword"] = trans('form.err_repassword');
          $register_error = 1;
        }

        if($repassword != $password){
          $error["repassword"] = trans('form.err_not_same_password');
          $register_error = 1;
        }
        
        if($register_error == 0){
          $item = new Customers;
          $item->cusfullname  = $fullname;
          $item->idgroup      = 1;
          $item->status       = 1;
          $item->cusemail     = $email;
          $item->cusphone     = $phone;
          $item->cusimg       = "";
          $item->cusaddress   = $address;
          $item->cuspass      = sha1($password);
          $item->save();

          $customer_id = $item->id;
          if($customer_id){
            Session::put('logined_cus', 1);
            Session::put('logined_cusid', $item->id);
            Session::put('logined_cusfullname', $item->cusfullname);
            Session::put('logined_cusemail', $item->cusemail);
            Session::put('logined_cusphone', $item->cusphone);
            Session::put('logined_cusimg', $item->cusimg);
            Session::put('logined_cusaddress', $item->cusaddress);

            // ==============save info to order =============== 
            Session::put('pay_name', $item->cusfullname);
            Session::put('pay_phone', $item->cusphone);
            Session::put('pay_address', $item->cusaddress);

            Session::put('shipping_name', session('pay_name'));
            Session::put('shipping_phone', session('pay_phone'));
            Session::put('shipping_address', session('pay_address'));
            Session::put('same_address', 1);
            Session::put('shipping_error', 0); 
            // =============================

            $error["success"] = 1;
          }else{
            $error["success"] = 0;
          }
        }

        echo json_encode($error);

    }


    function save_custommer_info(Request $request){ 
        $fullname         = $request->input('fullname');
        $phone            = $request->input('phone');
        $register_error = 0;

        $error = array(
          "fullname"      => "",
          "phone"      => "", 
          );

        if(empty($fullname)){
          $error["fullname"] = trans('form.err_fullname');
          $register_error = 1;
        }

        if(empty($phone)){
          $error["phone"] = trans('form.err_phone');
          $register_error = 1;
        }
 
        
        if($register_error == 0){
          $customer = Customers::find(Session::get("logined_cusid"));
          $customer->cusfullname   = $fullname;
          $customer->cusphone      = $phone; 
          $customer->save();
        }

        echo json_encode($error);
    }


    function save_custommer_address(Request $request){ 
        $address                = $request->input('address');
        $select_city            = $request->input('select_city');
        $select_district        = $request->input('select_district');
        $select_ward            = $request->input('select_ward');
        $register_error = 0;

        $error = array(
          "fulladdress"      => "",
          "address"          => "",
          "select_city"      => "", 
          "select_district"  => "", 
          );

        if(empty($address)){
          $error["address"] = trans('form.err_address');
          $register_error = 1;
        }

        if(empty($select_city)){
          $error["select_city"] = trans('form.err_select_city');
          $register_error = 1;
        }

        if(empty($select_district)){
          $error["select_district"] = trans('form.err_select_district');
          $register_error = 1;
        }
  
        
        if($register_error == 0){

          $city       = Cities::find($select_city);
          $district   = Districts::find($select_district);

          if($select_ward != ""){
            $ward        = Wards::find($select_ward);
            $fulladdress = $address.", ".$ward->name.", ".$district->name.", ".$city->name;
          }else{
            $fulladdress = $address.", ".$district->name.", ".$city->name;
          }


          $customer = Customers::find(Session::get("logined_cusid"));
          $customer->cusaddress   = $fulladdress;
          $customer->save();
          
          if($fulladdress != ""){
            $error["fulladdress"] = "";
          }
        }

        echo json_encode($error);
    }


    function save_custommer_pass(Request $request){ 
        $oldPassword       = $request->input('oldPassword');
        $newPassword       = $request->input('newPassword');
        $rePassword        = $request->input('rePassword');
        $register_error = 0;

        $error = array(
          "oldPassword"       => "",
          "newPassword"       => "",
          "rePassword"        => "", 
          );


        $customer = Customers::find(Session::get("logined_cusid"));

        if(sha1($oldPassword) != $customer->cuspass){
          $error["oldPassword"] = trans('form.err_old_pass_not_same');
          $register_error = 1;
        }

        if(empty($oldPassword)){
          $error["oldPassword"] = trans('form.err_address');
          $register_error = 1;
        }

        if(empty($newPassword)){
          $error["newPassword"] = trans('form.err_password');
          $register_error = 1;
        }

        if(empty($rePassword)){
          $error["rePassword"] = trans('form.err_password');
          $register_error = 1;
        }

        if($rePassword != $newPassword){
          $error["rePassword"] = trans('form.err_password');
          $register_error = 1;
        }
  
        
        if($register_error == 0){
          $customer->cuspass   = sha1($newPassword);
          $customer->save();
        }

        echo json_encode($error);
    }

    function logout(){
      Session::put('logined_cus', 0);
      Session::put('logined_cusid', "");
      Session::put('logined_cusfullname', "");
      Session::put('logined_cusemail', "");
      Session::put('logined_cusphone', "");
      Session::put('logined_cusimg', "");
      Session::put('logined_cusaddress', "");
      return redirect("login");
    }



    // ===============================*********************=+++++++++++++++++++++==================




    public function ProfileCus($id){
        $customer = Customers::find($id);
        $order = Order::where('idcustomer',$id)->orderBy('created_at', 'desc')->get();
        $count = Order::where('idcustomer',$id)->count();
        $sum = Order::where('idcustomer',$id)->sum('total_order');
        return view('computer.admin.customer.profile',['customer'=>$customer,'listorder'=>$order,'count'=>$count,'sum'=>$sum]);
    }
    public function ListgrNews(){
        $grcus = GroupCustomers::all();
        return view('computer.admin.customer.group',['grcus'=>$grcus]);
    }
    public function AddgrNews(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'listname' => 'required',
                'nnnumber' => 'numeric',
                'nnavatarfile' => 'image|max:500000',                
            ],[
                'listname.required' => 'Bạn cần thêm tên nhóm khách hàng',
                'nnnumber.numeric'     => 'Hiện thị phải là số',
                'nnavatarfile.image' => 'Avatar phải là hình ảnh',
                'nnavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $gruop = new GroupCustomers;
        $gruop->listname = $request->listname;
        $gruop->listnumber = $request->nnnumber;
        if($request->hasFile('nnavatarfile')){
                $file = $request->file('nnavatarfile');
                $nameimg = $file->getClientOriginalName(); 
                $hinh = "longtriCo".str_random(6)."_".$nameimg;
                while(file_exists("public/img/customers/".$hinh))
                {
                    $hinh = "longtriCo".str_random(6)."_".$nameimg;
                }
                $file->move("public/img/customers",$hinh);
                $gruop->listimg = $hinh;
            }else{
                $gruop->listimg = "no-img.png";
            }
        $gruop->save();
        return redirect('admin/customers/listgr')->with('thongbao','thêm thành công');
    }
    public function EditgrNews(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidlistpro]);   
        $this->validate($request,[
                'elistname' => 'required',
                'ennnumber' => 'numeric',
                'ennavatarfile' => 'image|max:500000',                
            ],[
                'elistname.required' => 'Bạn cần thêm tên Loại sản phẩm',
                'ennnumber.numeric'     => 'Hiện thị phải là số',
                'ennavatarfile.image' => 'Avatar phải là hình ảnh',
                'ennavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $gruop = GroupCustomers::find($request->ennidlistpro);
        $gruop->listname = $request->elistname;
        $gruop->listnumber = $request->ennnumber;
        if($request->hasFile('ennavatarfile')){
            $file = $request->file('ennavatarfile');
            $nameimg = $file->getClientOriginalName(); 
            $hinh = "longtriCo".str_random(6)."_".$nameimg;
            while(file_exists("public/img/customers/".$hinh))
            {
                $hinh = "longtriCo".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/customers",$hinh);
            // removefile
            $imgold = $request->ennimguserold;
            if($imgold !="no-img.png"){
                while(file_exists("public/img/customers/".$imgold))
                {
                    unlink("public/img/customers/".$imgold);
                }
            }
            
            $gruop->listimg = $hinh;
        }
        $gruop->save();
        return redirect('admin/customers/listgr')->with('thongbao','sửa thành công');
    }
    public function DeletegrNews(Request $request){
        $cus = Customers::where('idgroup',$request->dennidlistpro)->count();
        if($cus == 0){
            $gruop = GroupCustomers::find($request->dennidlistpro);
            $gruop->delete();
            $imgold = $request->dennimglistpro;
                if($imgold !="no-img.png"){
                    while(file_exists("public/img/customers/".$imgold))
                    {
                        unlink("public/img/customers/".$imgold);
                    }
                }
            return redirect('admin/customers/listgr')->with('thongbao','Xóa thành công');
        }else{
            return redirect('admin/customers/listgr')->with('loi','Xóa không thành công, Bạn cần xóa các khách hàng thuộc nhóm này');

        }
        

    }
    //  Customer ==================================
    public function ListCus(){
        $customers = Customers::where('idgroup','<>',2)->get();
        $grcus = GroupCustomers::all();
        return view('computer.admin.customer.customers',['customers'=>$customers,'group'=>$grcus]);
    }
     public function Listsp(){
        $customers = Customers::where('idgroup',2)->get();
        $grcus = GroupCustomers::all();
        return view('computer.admin.customer.supports',['customers'=>$customers,'group'=>$grcus]);
    }
    public function AddCus(Request $request){
      if(isset($request->type)){
        $type = 'sp';
      } else{
        $type = 'cus';
      }
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'nnfullname' => 'required',
                'nnmailcus' => 'required',
                'nnaddcus' => 'required',
                'nnphonecus' => 'required|numeric',
                'nnfacebook' => 'required',
                'nngroupkh' => 'numeric',
                'nnavatarfile' => 'image|max:500000',                
            ],[
                'nngroupkh.numeric' => 'Bạn cần chọn nhóm khách hàng',
                'nnfullname.required' => 'Bạn cần thêm tên khách hàng',
                'nnmailcus.required' => 'Bạn cần thêm email khách hàng',
                'nnphonecus.required' => 'Bạn cần thêm số điện thoại khách hàng',
                'nnaddcus.required' => 'Bạn cần thêm địa chỉ khách hàng',
                'nnfacebook.required' => 'Bạn cần thêm facebook khách hàng hoặc để #',
                'nnphonecus.numeric'     => 'Số điện thoại phải là số',
                'nnavatarfile.image' => 'Avatar phải là hình ảnh',
                'nnavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $customer = new Customers;
        $customer->idgroup = $request->nngroupkh;
        $customer->cusfullname = $request->nnfullname;
        $customer->cusemail = $request->nnmailcus;
        $customer->cusphone = $request->nnphonecus;
        $customer->status = $request->nnhide;
        $customer->cusaddress = $request->nnaddcus;
        $customer->cusface = $request->nnfacebook;
        $customer->cuspass = "nguyennam.90st";
        if($request->hasFile('nnavatarfile')){
                $file = $request->file('nnavatarfile');
                $nameimg = $file->getClientOriginalName(); 
                $hinh = "longtriCo".str_random(6)."_".$nameimg;
                while(file_exists("public/img/customers/".$hinh))
                {
                    $hinh = "longtriCo".str_random(6)."_".$nameimg;
                }
                $file->move("public/img/customers",$hinh);
                $customer->cusimg = $hinh;
            }else{
                $customer->cusimg = "no-img.png";
            }
        $customer->save();
        if($type=='cus') {
        return redirect('admin/customers/list')->with('thongbao','thêm thành công');
      } else {
        return redirect('admin/customers/supports')->with('thongbao','thêm thành công hỗ trợ viên');
      }
    }

    public function EditCus(Request $request){
       if(isset($request->type)){
        $type = 'sp';
      } else{
        $type = 'cus';
      }
      
        session(['actionuser' => 'edit','editid'=>$request->ennidCustomer]);   
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'ennfullname' => 'required',
                'ennmailcus' => 'required',
                'ennaddcus' => 'required',
                'ennphonecus' => 'required|numeric',
                'enngroupkh' => 'numeric',
                'ennfacebook' => 'required',
                'ennavatarfile' => 'image|max:500000',                
            ],[
                'enngroupkh.numeric' => 'Bạn cần chọn nhóm khách hàng',
                'ennfullname.required' => 'Bạn cần thêm tên khách hàng',
                'ennmailcus.required' => 'Bạn cần thêm email khách hàng',
                'ennphonecus.required' => 'Bạn cần thêm số điện thoại khách hàng',
                'ennaddcus.required' => 'Bạn cần thêm địa chỉ khách hàng',
                'ennfacebook.required' => 'Bạn cần thêm facebook khách hàng hoặc để #',
                'ennphonecus.numeric'     => 'Số điện thoại phải là số',
                'ennavatarfile.image' => 'Avatar phải là hình ảnh',
                'ennavatarfile.max' => 'Avatar dung lượng quá lớn',

            ]);
        $customer = Customers::find($request->ennidCustomer);
        $customer->idgroup = $request->enngroupkh;
        $customer->cusfullname = $request->ennfullname;
        $customer->cusemail = $request->ennmailcus;
        $customer->cusphone = $request->ennphonecus;
        $customer->status = $request->ennhide;
        $customer->cusaddress = $request->ennaddcus;
        $customer->cusface = $request->ennfacebook;
        $customer->cuspass = "nguyennam.90st";
        if($request->hasFile('ennavatarfile')){
            $file = $request->file('ennavatarfile');
            $nameimg = $file->getClientOriginalName(); 
            $hinh = "longtriCo".str_random(6)."_".$nameimg;
            while(file_exists("public/img/customers/".$hinh))
            {
                $hinh = "longtriCo".str_random(6)."_".$nameimg;
            }
            $file->move("public/img/customers",$hinh);
            // removefile
            $imgold = $request->ennimguserold;
            if($imgold !="no-img.png" && ($imgold !='')){
                while(file_exists("public/img/customers/".$imgold))
                {
                    unlink("public/img/customers/".$imgold);
                }
            }
            
            $customer->cusimg = $hinh;
        }
        $customer->save();
        if($type=='cus') {
          return redirect('admin/customers/list')->with('thongbao','sửa thành công');
        } else {
          return redirect('admin/customers/supports')->with('thongbao','sửa thành công thông tin hỗ trợ viên');
        }
    }

    public function DeleteCus(Request $request){
        $order = Order::where('idcustomer',$request->dennidCustomer)->count();
        if($order == 0){
            $cus = Customers::find($request->dennidCustomer);
            $cus->delete();
            $imgold = $request->dennimgCustomer;
                if($imgold !="no-img.png" && ($imgold!='')){
                    while(file_exists("public/img/customers/".$imgold))
                    {
                        unlink("public/img/customers/".$imgold);
                    }
                }
            if( $cus->idgroup ==1){
              return redirect('admin/customers/list')->with('thongbao','Xóa thành công');
            } else {
              return redirect('admin/customers/supports')->with('thongbao','Xóa thành công hỗ trợ viên');
            }
        } else{
            return redirect('admin/customers/list')->with('loi','Xóa không thành công, kách hàng đã đặt đơn hàng');
        }
        

    }
    
    
        // feedback===============================
    public function feedback(){
      $feedback = Contactus::all();
      return view('computer.admin.customer.feedback',['feedback'=>$feedback]);
    }
    public function DelFeedback(Request $request){
        $con = Contactus::find($request->dennidCustomer);
        $con->delete();
        return redirect('admin/customers/feedback')->with('thongbao','Xóa thành công');
    }
}
