<?php

namespace App\Http\Controllers;

use App\Order;
use App\Customers;
use App\Product;
use App\ProductDetail;
use App\Shipping;
use App\Payment;
use App\Warehouse;
use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Counter;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function HomeAdmin(){
        $time_now = time();
        $time_out = 120;
        $ip_address = $_SERVER['REMOTE_ADDR'];

        $online  = Counter::whereraw("(UNIX_TIMESTAMP(last_visit)+$time_out) > $time_now ")->count();

        $visit = Counter::all()->count(); 

        $day       = Counter::whereraw(" DAYOFMONTH(last_visit) = DAYOFMONTH(CURDATE())  AND YEAR(last_visit) = YEAR(CURDATE()) ")->count();
        $yesterday = Counter::whereraw(" DAYOFMONTH(last_visit) = DAYOFMONTH(CURDATE()) - 1  AND YEAR(last_visit) = YEAR(CURDATE()) ")->count();
        $week      = Counter::whereraw(" WEEKOFYEAR(last_visit) = WEEKOFYEAR(CURDATE())  AND YEAR(last_visit) = YEAR(CURDATE()) ")->count();
        $lastweek  = Counter::whereraw(" WEEKOFYEAR(last_visit) = WEEKOFYEAR(CURDATE()) - 1  AND YEAR(last_visit) = YEAR(CURDATE()) ")->count();
        $month     = Counter::whereraw(" MONTH(last_visit) = MONTH(CURDATE())  AND YEAR(last_visit) = YEAR(CURDATE()) ")->count();
        $year      = Counter::whereraw(" YEAR(last_visit) = YEAR(CURDATE()) ")->count();
 

        $product = Product::all()->count() ? : 1;
        $customer = Customers::all()->count() ? : 1;
        $order = Order::all()->count() ?:1;
        $newc = Order::where('order_status',1)->count();
        $new = ($newc ? $newc  : 0)/$order*100;
        $handc = Order::where('order_status',2)->count();
        $hand = ($handc ? $handc : 0/$order)*100;
        $successc = Order::where('order_status',3)->count();
        $success = ($successc ? $successc : 0)/$order*100;
        $delc = Order::where('order_status',4)->count();
        $del = ($delc ? $delc : 0)/$order*100;
        $orderlist = Order::where('order_status',1)->orderBy('created_at','asc')->get() ? : 1;


       return view('computer.admin.index', ['listorder'=>$orderlist,'product'=>$product,'customer'=>$customer,'order'=>$order,'new'=>$new,'hand'=>$hand,'success'=>$success,'del'=>$del,'online'=>$online,'visit'=>$visit,'day'=>$day,'yesterday'=>$yesterday,'week'=>$week,'lastweek'=>$lastweek,'month'=>$month,'year'=>$year  ]); 
    }
    public function GetOrder()
    {   
        $customer = Customers::all();
        $Product = Product::all();
        $order = Order::orderBy('created_at','asc')->get();
        foreach ($Product as $pro) {
            if(ProductDetail::where('idproduct',$pro->id)->count() == 0){
                return redirect('admin/product/addcontent/'.$pro->id)->with('loi','Vui lòng thêm thông tin sản phẩm');
            }
        }
        return view('computer.admin.order.list',['listorder'=>$order,'customer'=>$customer,'listpro'=>$Product]);
    }
    public function ViewOrder($id){
        $order = Order::find($id);
        $Product = Product::orderBy('created_at', 'desc')->get();
        foreach ($Product as $pro) {
            if(ProductDetail::where('idproduct',$pro->id)->count() == 0){
                return redirect('admin/product/addcontent/'.$pro->id)->with('loi','Vui lòng thêm thông tin sản phẩm');
            }
        }
        $detail = OrderProduct::where('idorder',$order->id)->get();
        return view('computer.admin.order.edit',['order'=>$order,'detail'=>$detail,'listpro'=>$Product]);
    }
// Chart=====================================================
    public function ChartOrder(){
        $order = Order::all()->count() ?:1;
        $newc = Order::where('order_status',1)->count();
        $new = ($newc ? $newc  : 0)/$order*100;
        $handc = Order::where('order_status',2)->count();
        $hand = ($handc ? $handc : 0/$order)*100;
        $successc = Order::where('order_status',3)->count();
        $success = ($successc ? $successc : 0)/$order*100;
        $delc = Order::where('order_status',4)->count();
        $del = ($delc ? $delc : 0)/$order*100;
        $total =  Order::where('order_status',3)
                ->join('orderproduct', 'order.id', '=', 'orderproduct.idorder')
                ->get();
        $grby = $total->groupBy('idproduct');
        return view('computer.admin.order.total',['total'=>$total,'new'=>$new,'hand'=>$hand,'success'=>$success,'del'=>$del,'order'=>$order,'newc'=>$newc,'handc'=>$handc,'successc'=>$successc,'delc'=>$delc,'grby'=>$grby  ]);
    }

// Chart=====================================================


    public function PrinterOrder($id){
        $order = Order::find($id);
        $detail = OrderProduct::where('idorder',$order->id)->get();
        return view('computer.admin.order.print',['order'=>$order,'detail'=>$detail]);
    }
    public function DelAddOrder(Request $request){
        if($request->ajax()){
            $id = (int)$request->idop;
            $orderp = OrderProduct::find($id);
            $totalde = $orderp->total;
            $idorder = $orderp->idorder;
             if($orderp->delete()){
                $order = Order::find($idorder);
                $order->total_order = (int)$order->total_order - (int)$totalde;
                $order->save();
                return 1;
             }else return 0;
        }
    }

    public function EditAddOrder(Request $request){
        if($request->ajax()){
            $detail = new OrderProduct;
            $detail->name       = $request->name;
            $detail->quantity   = (int)$request->quantity;
            $detail->price      = $request->price;
            $detail->total      = $request->total;
            $detail->idproduct  = (int)$request->idproduct;
            $detail->idorder    = (int)$request->idorder;
            $detail->note       = $request->note;
            if($detail->save()){
                $order = Order::find($detail->idorder);
                $order->total_order = (int)$order->total_order + (int)$detail->total;
                $order->save();
                return $detail->id;
            }else return 0;
            
        }
    }
    // Order ===============================================================
    public function PostADOrder(Request $request){
        $this->validate($request,[
            'nnaddpname' => 'required',               
            'nnselectcus' => 'numeric',               
        ],[             
            'nnaddpname.required'=> 'Vui lòng thêm sản phẩm/dịch vụ',
            'nnselectcus.numeric'=> 'Vui lòng chọn khách hàng',          

        ]);
        $names = $request->nnaddpname;
        $nums = $request->nnaddpnum;
        $prices = $request->nnaddpprice;
        $totals = $request->nnaddptotal;
        $notes = $request->nnaddpnote;
        $cusid = $request->nnselectcus;
        $proid = $request->nnidproductadd;


        $customer = Customers::find($cusid); 
        $order = new Order;
        $order->idcustomer = $customer->id;      
        $order->user_name = Auth::user()->fullname;      
        $order->user_name = Auth::user()->fullname;      
        $order->name = $customer->cusfullname;      
        $order->address = $customer->cusaddress;      
        $order->telephone = $customer->cusphone;      
        $order->email = $customer->cusemail;      
        $order->total_order = $request->nntotalorder;
        $order->total_pay = $request->nntotalorder;      
        $order->comment = $request->nnnotewareadd;      
        $order->ip = 0;      
        $order->idpayment = 1; 
        $order->payment_name = $request->nnnotewareadd;      
        $order->payment_telephone = $request->nnnotewareadd; 
        $order->payment_address = $request->nnnotewareadd;      
        $order->payment_credit_number = $request->nnnotewareadd; 
        $order->payment_credit_name = $request->nnnotewareadd;      
        $order->payment_credit_expdate = $request->nnnotewareadd; 
        $order->idshipping = 1;      
        $order->shipping_name = $request->nnnotewareadd; 
        $order->shipping_telephone = $customer->id;      
        $order->shipping_address = $request->nnnotewareadd; 
        $order->shipping_fee = 0; 
        if($order->save()){
            foreach($names as $key => $n ) 
            {
                $detail = new OrderProduct;
                $detail->name       = $names[$key];
                $detail->quantity   = $nums[$key];
                $detail->price      = $prices[$key];
                $detail->total      = $totals[$key];
                $detail->idproduct  = $proid[$key];
                $detail->idorder    = $order->id;
                $detail->note       = $notes[$key];
                $detail->save();
            } 
            return redirect('admin/order/list')->with('thongbao','Thêm thành công');
        }else       
            return redirect('admin/order/list')->with('errors','Thêm thất bại');

    }

    // Shipping ============================================================
    public function ListShipping(){
        $modnew = Shipping::all();
        return view('computer.admin.order.shipping',['modnews'=>$modnew]);
    }
    public function AddShipping(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'modname' => 'required|unique:modnews',
                'nnnumber' => 'required|numeric',               
                'nnpriceship' => 'required|numeric',               
            ],[
                'modname.required'=> 'Tên không được bỏ trống',
                'modname.unique'=> 'Tên không được đã sử dụng',
                'nnnumber.required'=> 'Thứ tự hiện thị không được bỏ trống',
                'nnnumber.numeric'=> 'Thứ tự hiện thị phải là số',
                'nnpriceship.required'=> 'Thứ tự hiện thị không được bỏ trống',
                'nnpriceship.numeric'=> 'Thứ tự hiện thị phải là số',

            ]);
        $modnew = new Shipping;
        $modnew->idlang = $request->nnlang;
        $modnew->name = $request->modname;
        $modnew->status = $request->nnnumber;
        $modnew->fee = $request->nnpriceship;
        $modnew->save();
        return redirect('admin/order/shipping')->with('thongbao','thêm thành công');
    }
    public function EditShipping(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidmodproduct]);   
        $this->validate($request,[
                'emodname' => 'required',
                'ennpriceship' => 'required|numeric',               
                'ennnumber' => 'required|numeric',               
            ],[
                'emodname.required'=> 'Tên không được bỏ trống',
                'ennnumber.required'=> 'Thứ tự hiện thị không được bỏ trống',
                'ennnumber.numeric'=> 'Thứ tự hiện thị phải là số',
                'ennpriceship.required'=> 'Thứ tự hiện thị không được bỏ trống',
                'ennpriceship.numeric'=> 'Thứ tự hiện thị phải là số',

            ]);
        $modnew = Shipping::find($request->ennidmodproduct);
        $modnew->idlang = $request->ennlang;
        $modnew->name = $request->emodname;
        $modnew->status = $request->ennnumber;
        $modnew->fee = $request->ennpriceship;
        $modnew->save();
        return redirect('admin/order/shipping')->with('thongbao','sửa thành công');
    }
    public function DeleteShipping(Request $request){

        $order = Order::where('idshipping',$request->dennidmodproduct)->count();
        if($order == 0 ){
            $modnew = Shipping::find($request->dennidmodproduct);
            $modnew->delete();
        
            return redirect('admin/order/shipping')->with('thongbao','Xóa thành công');
        }else{
            return redirect('admin/order/shipping')->with('thongbao','Xóa không thành công, Bạn có đơn hàng có Hình thức vận chuyển này!');
        }

    }
        // Payment ============================================================
    public function ListPayment(){
        $modnew = Payment::all();
        return view('computer.admin.order.payment',['modnews'=>$modnew]);
    }
    public function AddPayment(Request $request){
        session(['actionuser' => 'add']);        
        $this->validate($request,[
                'modname' => 'required|unique:modnews',
                'nnnumber' => 'required|numeric',
                'nnpaymenttype' => 'required',                               
            ],[
                'modname.required'=> 'Tên không được bỏ trống',
                'modname.unique'=> 'Tên không được đã sử dụng',
                'nnnumber.required'=> 'Thứ tự hiện thị không được bỏ trống',
                'nnnumber.numeric'=> 'Thứ tự hiện thị phải là số',
                'nnpaymenttype.required'=> 'Vui lòng chọn hình thức thanh toán',

            ]);
        $modnew = new Payment;
        $modnew->idlang = $request->nnlang;
        $modnew->name = $request->modname;
        $modnew->status = $request->nnnumber;
        $modnew->type = $request->nnpaymenttype;
        $modnew->save();
        return redirect('admin/order/payment')->with('thongbao','thêm thành công');
    }
    public function EditPayment(Request $request){
        session(['actionuser' => 'edit','editid'=>$request->ennidmodproduct]);   
        $this->validate($request,[
                'emodname' => 'required',
                'ennpaymenttype' => 'required',                               
                'ennnumber' => 'required|numeric',               
            ],[
                'emodname.required'=> 'Tên không được bỏ trống',
                'ennnumber.required'=> 'Thứ tự hiện thị không được bỏ trống',
                'ennpaymenttype.required'=> 'Vui lòng chọn hình thức thanh toán',
                'ennnumber.numeric'=> 'Thứ tự hiện thị phải là số',

            ]);
        $modnew = Payment::find($request->ennidmodproduct);
        $modnew->idlang = $request->ennlang;
        $modnew->name = $request->emodname;
        $modnew->status = $request->ennnumber;
        $modnew->type = $request->ennpaymenttype;
        $modnew->save();
        return redirect('admin/order/payment')->with('thongbao','sửa thành công');
    }
    public function DeletePayment(Request $request){

        $order = Order::where('idpayment',$request->dennidmodproduct)->count();
        if($order == 0 ){
            $modnew = Payment::find($request->dennidmodproduct);
            $modnew->delete();
            return redirect('admin/order/payment')->with('thongbao','Xóa thành công');
        }else{
            return redirect('admin/order/payment')->with('thongbao','Xóa không thành công, bạn có đơn hàng có Hình thức thanh toán này!');
        }

    }

    // chang stt order ==========================================================
    public function ChangesttOrder(Request $request){
        $idorder = $request->nnidorder;

        $order = Order::find($idorder);
        $oldstt = $order->order_status;
        $order->order_status = $request->nnnewsttorder;
        
        if($order->save()){
            if($request->nnnewsttorder==3){
                $lissp = OrderProduct::where('idorder',$idorder)->get();
                foreach ($lissp as $op) {
                    $pro = Product::find($op->idproduct);
                    $pro->quantity = $pro->quantity - $op->quantity;
                    $pro->save();
                    $ware = new Warehouse;
                    $ware->idproduct = $pro->id;
                    $ware->category = 2;
                    $ware->content = "Xuất bán ".$op->quantity." sản phẩm, theo đơn hàng số".$idorder." giá nhập: ".$op->price;
                    $ware->userware = Auth::user()->fullname;
                    $ware->pricein = 0;
                    $ware->priceout = $op->price;
                    $ware->iduser = Auth::user()->id;
                    $ware->save();
                }
            }elseif($oldstt==3 && $request->nnnewsttorder==4){
                $lisop = OrderProduct::where('idorder',$idorder)->get();
                foreach ($lisop as $op) {
                    $pro = Product::find($op->idproduct);
                    $pro->quantity = $pro->quantity + $op->quantity;
                    $pro->save();
                    $ware = new Warehouse;
                    $ware->idproduct = $pro->id;
                    $ware->category = 2;
                    $ware->content = "Nhập trả ".$op->quantity." sản phẩm, theo đơn hàng số".$idorder." - Giá trả: ".$op->price;
                    $ware->userware = Auth::user()->fullname;
                    $ware->pricein =  $op->price;
                    $ware->priceout = 0;
                    $ware->iduser = Auth::user()->id;
                    $ware->save();
                }
            }
        }

        return redirect('admin/order/view/'.$idorder)->with('thongbao','Cập nhật thành công');
    }
}
