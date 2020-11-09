@extends('computer.master')
@section('title','workflow management - Đơn hàng')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12 page-header">
          <div class="col-xs-12">
            <h1 >Đơn hàng số {{ $order->id }}</h1>
          </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row" style="padding: 15px 0;">         
           <div class="col-xs-6">                        
              <div class="form-group">
                <label for="nn-name-cus" class="col-xs-5 control-label"><i class="fa fa-id-badge"></i> Khách hàng:</label>
                <div class="col-xs-7">
                    <p><b>{{ $order->name }}</b></p>
                </div>
              </div>
              <div class="form-group">
                <label for="nn-address-cus" class="col-xs-5 control-label"><i class="fa fa-map-marker"></i> Addr:</label>
                <div class="col-xs-7">
                  <p>{{ $order->address }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="nn-phone-cus" class="col-xs-5 control-label"><i class="fa fa-phone"></i> Phone:</label>
                <div class="col-xs-7">
                  <p>{{ $order->telephone }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="nn-mail-cus" class="col-xs-5 control-label"><i class="fa fa-envelope-o"></i> Mail:</label>
                <div class="col-xs-7">
                    <p>{{ $order->email }}</p>
                </div>
              </div>                      
              <div class="form-group">
                <label for="nn-key-cus" class="col-xs-5 control-label"><i class="fa fa-money"></i> Tổng tiền:</label>
                <div class="col-xs-7" >
                    <span id="nnshowtotal">
                      {{ number_format($order->total_order) }}
                    </span>                        
                        <input type="hidden" name="nntotalorder" id="nntotalorder" value="{{ $order->total_order }}" />
                </div>
              </div>                  
           </div>
           <div class="col-xs-6">
                <div class="form-group">
                    <label for="nn-phone-cus" class="col-xs-5 control-label"><i class="fa fa-clock-o"></i> HT TT :</label>
                    <div class="col-xs-7">
                      <p>{{ $order->payment_name }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nn-note-cus" class="col-xs-12 control-label"><i class="fa  fa-comments-o"></i> Vận chuyển:</label>
                    <div class="col-xs-12" style="padding-left: 30px;">
                      <p>   + D/v vận chuyển:{{ $order->shipping_name }} <br>
                            + SĐT nhận hàng:{{ $order->shipping_telephone }} <br>
                            + Đ/c nhận hàng:{{ $order->shipping_address }} <br>
                            + Phí vận chuyển: {{ $order->shipping_fee }} <br>
                      </p>
                    </div>
                </div>
                <div class="form-group">
                  <label for="nn-phone-cus" class="col-xs-5 control-label"><i class="fa fa-ravelry"></i> Yêu cầu:</label>
                  <div class="col-xs-7" >
                    <p>{{ $order->comment }}</p>
                  </div>
                </div>               
           </div>   
    </div>
    <div class="row"> 
        <div class="col-xs-12">
             <!-- /.panel-heading -->
          <div class="col-lg-12">
            <h4><b style="color: #B34436">Sản phẩm theo đơn hàng:</b></h4>
          </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody id="nnaddokproduct">
                @foreach($detail as $de)
                    <tr>
                        <td>{{ $de->name }}</td>
                        <td>{{ $de->quantity }}</td>
                        <td>{{ $de->price }}</td>
                        <td>{{ $de->total }}</td>
                        <td>{{ $de->note }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->  
        </div>
    </div> 
    <div class="row" style="text-align: center">
      <div class="col-xs-6">
        <p>Người nhận</p>
      </div>
      <div class="col-xs-6">
        <p>Tp.HCM, Ngày ...... Tháng ...... Năm ......<br/>
            Người bàn giao</p>
      </div>         
    </div>      
</div> 
@endsection()
@section('script')
  <script type="text/javascript">
    $(window).load(function() {
        setTimeout(function () { window.print(); }, 0);
        window.onfocus = function () { setTimeout(function () { window.close(); }, 0); }
    });
  </script>
@endsection()