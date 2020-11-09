@extends('computer.master')
@section('title','workflow management - customer')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans("admin.info") }} {{ trans("admin.custommer") }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row info alert-info" style="padding: 15px 0;">         
           <div class="col-xs-6">                        
              <div class="form-group">
                <label for="nn-name-cus" class="col-xs-3 control-label"><i class="fa fa-id-badge"></i> {{ trans("admin.name") }}:</label>
                <div class="col-xs-9">
                    <p><b>{{ $customer->cusfullname ? $customer->cusfullname : '###############'  }}</b></p>
                </div>
              </div>
              <div class="form-group">
                <label for="nn-address-cus" class="col-xs-3 control-label"><i class="fa fa-map-marker"></i> {{ trans("admin.address") }}:</label>
                <div class="col-xs-9">
                  <p>{{ $customer->cusaddress ? $customer->cusaddress : '###############'  }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="nn-phone-cus" class="col-xs-3 control-label"><i class="fa fa-phone"></i> {{ trans("admin.phone") }}:</label>
                <div class="col-xs-9">
                  <p>{{ $customer->cusphone ? $customer->cusphone : '###############' }}</p>
                </div>
              </div>
              <div class="form-group">
                <label for="nn-mail-cus" class="col-xs-3 control-label"><i class="fa fa-envelope-o"></i> {{ trans("admin.email") }}:</label>
                <div class="col-xs-9">
                    <p>{{ $customer->cusemail ? $customer->cusemail : '###############'  }}</p>
                </div>
              </div>                      
              <div class="form-group">
                <label for="nn-key-cus" class="col-xs-3 control-label"><i class="fa fa-image"></i> image:</label>
                <div class="col-xs-9">
                        <img style="width: 100%;" @if($customer->idloginsocial==null) src="{{ asset('public/img/customers/'.$customer->cusimg) }}" @else src="{{ $customer->cusimg }}" @endif >
                </div>
              </div>                  
           </div>
           <div class="col-xs-6">
                <div class="form-group">
                    <label for="nn-phone-cus" class="col-xs-3 control-label"><i class="fa fa-clock-o"></i> {{ trans("admin.group") }}:</label>
                    <div class="col-xs-9">
                      <p>{{ $customer->listgr->listname ? $customer->listgr->listname  : '###############'}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nn-note-cus" class="col-xs-3 control-label"><i class="fa  fa-comments-o"></i> {{ trans("admin.statistical") }}:</label>
                    <div class="col-xs-9">
                      <p>   + {{ trans("admin.total_order") }}: {{ $count }} <br>
                            + {{ trans("admin.total_price_order") }}: {{ number_format($sum) }} <br>
                      </p>
                    </div>
                </div>

              <div class="form-group">
                <label for="nn-phone-cus" class="col-xs-4 control-label"><i class="fa fa-ravelry"></i> {{ trans("admin.custommer") }}:</label>
                <div class="col-xs-8" >
                  <p>@if($customer->status==1) Vip @elseif($customer->status==2) Mới @else Ẩn @endif</p>
                </div>
              </div>
               
           </div>   
    </div>
    <div class="row"> 
        <div class="col-xs-12">
             <!-- /.panel-heading -->
          <div class="col-lg-12">
            <h3><b style="color: #B34436">{{ trans("admin.history") }}:</b></h3>
          </div>
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>{{ trans("admin.order") }}</th>
                        <th>{{ trans("admin.comment") }}</th>
                        <th>{{ trans("admin.date") }}</th>
                        <th>{{ trans("admin.status") }}</th>
                        <th>{{ trans("admin.price_total") }}</th>
                        <th>{{ trans("admin.staff") }}</th>
                        <th>{{ trans("admin.detail") }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($listorder as $order)
                    <tr>
                        <td>ĐH-số {{ $order->id }}</td>
                        <td>{{ $order->comment }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                          <span class="btn @if($order->order_status==1)btn-warning">{{ trans("admin.status_1") }}</span> 
@elseif($order->order_status==2) btn-info">{{ trans("admin.status_2") }}</span> 
@elseif($order->order_status==3) btn-success">{{ trans("admin.status_3") }}</span>
 @else btn-danger">{{ trans("admin.status_4") }}</span> @endif
                        </td>
                        <td>{{ number_format($order->total_order) }}</td>
                        <td>{{ $order->user_name }}</td>
                        <td class="center"><a href="{!! url('/admin/order/view/'.$order->id)!!}"><span class="btn btn-info"><i class="fa fa-calendar"></i> {{ trans("admin.detail") }}</span></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->  
        </div>
    </div> 
</div>   
          
@endsection()