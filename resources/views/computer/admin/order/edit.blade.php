@extends('computer.master')
@section('title','workflow management - trans("admin.order")')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12 page-header">
          <div class="col-xs-8">
            <h1 >{{ trans("admin.detail_o_num") }} {{ $order->id }}</h1>
          </div>
          <div class="nnstatusorder col-xs-4">

            <span class="alert @if($order->order_status==1)alert-warning">{{ trans("admin.status_1") }}</span> 
            @elseif($order->order_status==2) alert-info">{{ trans("admin.status_2") }}</span> 
            @elseif($order->order_status==3) alert-success">{{ trans("admin.status_3") }}</span> 
            @else alert-danger">{{ trans("admin.status_4") }}</span> 
            @endif
            <a href="{!! url('admin/order/print/'.$order->id)!!}" target="_blank"><span class="alert alert-warning" style="cursor: pointer;"><i class="fa fa-print"></i> {{ trans("admin.print") }}</span></a>
          </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    @if(session('thongbao'))
        <div class="alert-tb alert alert-success">
            <span class="fa fa-check"> </span> {{ session('thongbao') }}
        </div>
    @endif
    <!-- /.row -->
    <div class="row info @if($order->order_status==1)alert-warning @elseif($order->order_status==2) alert-info @elseif($order->order_status==3) alert-success @else alert-danger @endif" style="padding: 15px 0;">         
           <div class="col-xs-6">                        
              <div class="form-group">
                <label for="nn-name-cus" class="col-xs-5 control-label"><i class="fa fa-id-badge"></i> {{ trans("admin.custommer_o") }}:</label>
                <div class="col-xs-7">
                    <p><b>{{ $order->name }}</b></p>
                </div>
              </div>
              <div class="form-group">
                <label for="nn-address-cus" class="col-xs-3 control-label"><i class="fa fa-map-marker"></i> {{ trans("admin.address") }}:</label>
                <div class="col-xs-9">
                  <p>{{ $order->address ? $order->address : '###############' }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="nn-phone-cus" class="col-xs-3 control-label"><i class="fa fa-phone"></i> {{ trans("admin.phone") }}:</label>
                <div class="col-xs-9">
                  <p>{{ $order->telephone ? $order->telephone : '###############'}}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="nn-mail-cus" class="col-xs-3 control-label"><i class="fa fa-envelope-o"></i> {{ trans("admin.email") }}:</label>
                <div class="col-xs-9">
                    <p>{{ $order->email ? $order->email : '###############' }}</p>
                </div>
              </div>                      
              <div class="form-group">
                <label for="nn-key-cus" class="col-xs-4 control-label"><i class="fa fa-money"></i> {{ trans("admin.total_price") }}:</label>
                <div class="col-xs-8" >
                    <span id="nnshowtotal">
                      {{ number_format($order->total_order ? $order->total_order : '0' ) }}
                    </span>                        
                        <input type="hidden" name="nntotalorder" id="nntotalorder" value="{{ $order->total_order }}" />
                </div>
              </div>                  
           </div>
           <div class="col-xs-6">
                <div class="form-group">
                    <label for="nn-phone-cus" class="col-sm-6 control-label"><i class="fa fa-clock-o"></i> {{ trans("admin.payment") }}:</label>
                    <div class="col-sm-6">
                      <p>{{ $order->payment_name ? $order->payment_name : '###############'}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nn-note-cus" class="col-sm-4 control-label"><i class="fa  fa-comments-o"></i> {{ trans("admin.shipping") }}:</label>
                    <div class="col-sm-8">
                      <p>   + {{ trans("admin.address") }}:{{ $order->shipping_name }} <br>
                            + {{ trans("admin.phone") }}:{{ $order->shipping_telephone }} <br>
                            + {{ trans("admin.shipping") }} {{ trans("admin.address") }}:{{ $order->shipping_address }} <br>
                            + {{ trans("admin.fee") }} : {{ $order->shipping_fee }} <br>
                      </p>
                    </div>
                </div>
                <div class="form-group">
                  <label for="nn-phone-cus" class="col-xs-4 control-label"><i class="fa fa-ravelry"></i> {{ trans("admin.request") }}:</label>
                  <div class="col-xs-8" >
                    <p>{{ $order->comment  ? $order->comment : '###############'}}</p>
                  </div>
                </div>               
           </div>   
    </div>
    <div class="row"> 
        <div class="col-xs-12">
             <!-- /.panel-heading -->
          <div class="col-lg-12">
            <h3><b style="color: #B34436">{{ trans("admin.detail") }}:</b></h3>
          </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>{{ trans("admin.device") }}</th>
                        <th>{{ trans("admin.quantity") }}</th>
                        <th>{{ trans("admin.price") }}</th>
                        <th>{{ trans("admin.total_price") }}</th>
                        <th>{{ trans("admin.comment") }}</th>
                        @if($order->order_status!=3)<th>{{ trans("admin.detail") }}</th>@endif
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
                        @if($order->order_status!=3)<td class="center"><span class="nndelorderdetail btn btn-danger" iddetailpro="{{ $de->id }}" total="{{ $de->total }}" ><i class="fa fa-trash"></i> {{ trans("admin.delete") }}</span></td>@endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->  
        </div>
    </div> 
    <div class="row">
      <div class="col-xs-8">
        @if($order->order_status!=3)<button class="btn btn-info" data-toggle="modal" data-target=".nn-add-product">Nhập thêm sản phẩm</button>@endif

        <p style="color:#B34436"><br>P/s: Chú ý xử lý đơn hàng ngôn ngữ nào bạn phải chọn ngôn ngữ quản trị là ngôn ngữ đấy.</p>        
      </div>
      <div class="col-xs-4 alert @if($order->order_status==1)alert-warning @elseif($order->order_status==2) alert-info @elseif($order->order_status==3) alert-success @else alert-danger @endif">
        <select class="form-control" id="nnchangesttorder">
          <option value="1" @if($order->order_status==1) selected="selected" @endif>{{ trans("admin.status_1") }}</option>
          <option value="2" @if($order->order_status==2) selected="selected" @endif>{{ trans("admin.status_2") }}</option>
          <option value="3" @if($order->order_status==3) selected="selected" @endif>{{ trans("admin.status_3") }}</option>
          <option value="4" @if($order->order_status==4) selected="selected" @endif>{{ trans("admin.status_4") }}</option>
        </select>        
      </div>
        
    </div>      
</div>  
<!-- thêm sảm phẩm  ============================================================== -->
<div class="modal fade nn-add-product" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thêm thiết bị</h4>
      </div>
      <div class="modal-body">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="col-xs-12" class="table table-striped table-bordered table-hover" id="dataTables-product-add">
                    <thead>
                        <tr>
                            <th>{{ trans("admin.device") }}</th>
                            <th>{{ trans("admin.quantity") }}</th>
                            <th>{{ trans("admin.price") }}</th>
                            <th>{{ trans("admin.unit") }}</th>
                            <th>{{ trans("admin.comment") }}</th>
                            <th>{{ trans("admin.detail") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listpro as $pro)
                        <tr>
                            <td class='col-sm-3'>{{ $pro->namelang($pro->id)->name }}</td>
                            <td class='col-sm-2'><input style="width: 100%" class='form-control' type="text" name="nn-so-luong-add" value="1"></td>
                            <td class='col-sm-2'><input class='form-control' type="text" name="nn-don-gia-add" value="{{ $pro->namelang($pro->id)->price }}"></td>
                            <td class='col-sm-2'>@if(Session::get('idlocale') == 1)VNĐ @else $ @endif</td>
                            <td class='col-sm-2'><input class='form-control' type="text" name="nn-note-add" placeholder="ghi chú"></td>
                            <td class='col-sm-1'><button type="button" namppro="{{ $pro->namelang($pro->id)->name }}" proid="{{ $pro->id }}" class="nnaddproware btn btn-success">{{ trans("admin.import") }}</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans("admin.close") }}</button>
      </div>
    </div>
  </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-change-order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans("admin.status") }} {{ trans("admin.order") }}</h4>
          </div>
          <form class="form-horizontal" method="post" action="{{ url('admin/order/changestt') }}" enctype="multipart/form-data">          
            <input type="hidden" name="nnidorder" id="nnidorder" value="{{ $order->id }}" />
            <input type="hidden" name="nnnewsttorder" id="nnnewsttorder" />
            <input type="hidden" name="nnorderstt" id="nnorderstt" value="{{ $order->order_status }}" />
            <input type="hidden" name="nnnamestt" id="nnnamestt" value='
            @if($order->order_status==1) {{ trans("admin.status_1") }}
            @elseif($order->order_status==2) {{ trans("admin.status_2") }}
            @elseif($order->order_status==3) {{ trans("admin.status_3") }}
            @else {{ trans("admin.status_4") }}
            @endif' />
            <input type="hidden" name="_token" value="{{ csrf_token()}}" />
            <div class="modal-body">
              <div class="row">
                  <h4 id="nnbodychange" style="text-align: center;">
                    
                  </h4>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans("admin.close") }}</button>
              <button type="submit" class="btn btn-info" id="nnsubmitchange">{{ trans("admin.update") }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
@endsection()
@section('script')
  <script src="{{ asset('public/js/admin/vieworder.js') }}"></script>
@endsection()