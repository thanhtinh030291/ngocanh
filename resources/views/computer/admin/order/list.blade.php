@extends('computer.master')
@section('title',"trans('admin.order')")
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('admin.order') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-job" id="nn-add-job">+ {{ trans('admin.add_order') }}</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        @if(session('thongbao'))
                            <div class="alert-tb alert alert-success">
                                <span class="fa fa-check"> </span> {{ session('thongbao') }}
                            </div>
                        @endif
                        @if(session('loi'))
                            <div class="alert-tb alert alert-danger">
                                <span class="fa fa-check"> </span> {{ session('loi') }}
                            </div>
                        @endif
                        @if(count($errors)>0)
                            <div class="alert-tb alert alert-danger">
                                @foreach($errors->all() as $err)
                                  <i class="fa fa-exclamation-circle"></i> {{ $err }}<br/>
                                @endforeach
                            </div>
                        @endif
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>{{ trans('admin.date_o') }}</th>
                                        <th>HD</th>
                                        <th>{{ trans('admin.custommer_o') }}</th>
                                        <th>{{ trans('admin.phone_o') }}</th>
                                        <th>{{ trans('admin.comment_o') }}</th>
                                        <th>{{ trans('admin.date_order_at') }}</th>
                                        <th>{{ trans('admin.status') }}</th>
                                        <th>{{ trans('admin.detail') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($listorder as $order)
                                    <tr>
                                        <td>{{ $order->created_at }}</td>
                                        <td>DH{{ $order->id }}</td>           
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->telephone }}</td>
                                        <td>{{ $order->comment }}</td>
                                        <td>{{ $order->date_order_at }}</td>
                                        <td class="center">
                                            <span class="btn @if($order->order_status==1)btn-warning">{{ trans('admin.status_1') }}</span> 
                                            @elseif($order->order_status==2) btn-info">{{ trans('admin.status_2') }}</span> 
                                            @elseif($order->order_status==3) btn-success">{{ trans('admin.status_3') }}</span> 
                                            @else btn-danger">{{ trans('admin.status_4') }}</span> 
                                            @endif
                                        </td>      
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg">
                                            <a href="{!! url('/admin/order/view/'.$order->id)!!}"><span class="btn btn-default"><i class="fa fa-calendar"></i> {{ trans('admin.detail') }}</span></a>
                                            <a href="{!! url('admin/order/print/'.$order->id)!!}" target="_blank"><span class="btn btn-success"><i class="fa fa-print"></i> {{ trans('admin.print') }}</span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
</div>
<!-- model -->

<div class="modal fade nn-modal-add-job" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ trans('admin.order') }}</h4>
      </div>
      <form action="add" method="post" class="form-horizontal"  enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token()}}" />
      <div class="modal-body">
        <div class="row">
            <div class="col-xs-7">
                <div class="alert alert-warning nn-full-bg">
                    <div class="col-xs-12 form-group">
                        <label class="col-sm-3 control-label" for="id_label_single"><i class="fa fa-address-card-o"></i> KH:</label>
                        <div class="col-sm-9">
                          <select class="nn-basic-single" id="id_label_single" name="nnselectcus" style="width: 100%">
                                <option value="xxx" cusemail="Hãy chọn khách hàng" cusphone="Hãy chọn khách hàng" cusaddress="Hãy chọn khách hàng" ></option>
                            @foreach($customer as $cus)
                                <option value="{{ $cus->id }}" cusemail="{{ $cus->cusemail }}" cusphone="{{ $cus->cusphone }}" cusaddress="{{ $cus->cusaddress }}" >{{ $cus->cusfullname }}</option>
                            @endforeach
                          </select>         
                        </div>
                    </div>
                    <hr>
                    <div class="col-xs-12">                        
                        <p><i class="fa fa-map-marker"></i> <abbr title="address">{{ trans('admin.address') }}</abbr>: <span id="nn-add-cus"></span></p>
                        <p><i class="fa fa-phone"></i> 
                            <abbr title="Phone">{{ trans('admin.phone') }}</abbr>: <span id="nn-phone-cus"></span></p>
                        <p><i class="fa fa-envelope-o"></i> 
                            <abbr title="Email">{{ trans('admin.email') }}</abbr>: <a href="#"><span id="nn-mail-cus"></span></a>
                        </p>
                        <p><i class="fa fa-clock-o"></i> 
                        <abbr title="Hours">08:00 AM - 17:00 PM</abbr></p>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="nnnotewareadd"><i class="fa fa-tag"></i> {{ trans('admin.comment') }}</label>
                            <div class="col-sm-9">
                                <textarea cols="5" class="form-control" name="nnnotewareadd"  id="nnnotewareadd"></textarea>
                            </div>
                        </div>
                        
                    </div>
                </div>                
            </div>            
            <div class="col-xs-5">
                <div class="col-xs-12">
                    <img src="{{ asset('public/img/user/'.Auth::user()->avatar ) }}" style="width: 50%">
                    <p><i class="fa fa-user"></i> <abbr title="name">{{ trans('admin.staff') }}</abbr>:<b>  {{ Auth::user()->fullname }}</b></p>
                    <p> <i class="fa fa-font"></i> {{ trans('admin.order') }}: -- </p>
                    <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">{{ Carbon\Carbon::now() }}</abbr></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive">
                  <table class="table" id="nn-pro-add-new">
                        <th class="active">{{ trans('admin.device') }}</th>
                        <th class="success">SL</th>
                        <th class="info">{{ trans('admin.price') }}</th>
                        <th class="warning">{{ trans('admin.total_price') }}</th>
                        <th >{{ trans('admin.comment') }}</th>
                        <th class="danger">{{ trans('admin.delete') }}</th>                      
                  </table>
                  
                </div>
                <p>{{ trans('admin.total_price') }}: <b id="nn-total-add-pro">0.00 </b> @if(Session::get('idlocale') == 1)VNĐ @else $ @endif</p>
                <input type="hidden" name="nntotalorder" id="nntotalorder">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info nn-float-left" data-toggle="modal" data-target=".nn-add-product">{{ trans('admin.add_product') }}</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('admin.close') }}</button>
        <button type="submit" class="btn btn-primary">{{ trans('admin.created') }}</button>
      </div>
    </form>
    </div>
  </div>
</div>

    <!-- end modal -->

    <!-- end modal -->

<div class="modal fade nn-add-product" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ trans('admin.add_product') }}</h4>
      </div>
      <div class="modal-body">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="col-xs-12" class="table table-striped table-bordered table-hover" id="dataTables-product-add">
                    <thead>       
                        <tr>
                                        <th>{{ trans('admin.device') }}</th>
                                        <th>{{ trans('admin.quantity') }}</th>
                                        <th>{{ trans('admin.price') }}</th>
                                        <th>{{ trans('admin.unit') }}</th>
                                        <th>{{ trans('admin.comment_o') }}</th>
                                        <th>{{ trans('admin.detail') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listpro as $pro)
                        <tr>
                            <td class='col-sm-3'>{{ $pro->namelang($pro->id)->name}}</td>
                            <td class='col-sm-2'><input style="width: 100%" class='form-control' type="text" name="nn-so-luong-add" value="1"></td>
                            <td class='col-sm-2'><input class='form-control' type="text" name="nn-don-gia-add" value="{{ $pro->namelang($pro->id)->price }}"></td>
                            <td class='col-sm-2'>@if(Session::get('idlocale') == 1)VNĐ @else $ @endif</td>
                            <td class='col-sm-2'><input class='form-control' type="text" name="nn-note-add" placeholder=""></td>
                            <td class='col-sm-1'><button type="button" namppro="{{ $pro->namelang($pro->id)->name }}" proid="{{ $pro->id  }}" class="nnaddproware btn btn-success">{{ trans('admin.import') }}</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('admin.close') }}</button>
      </div>
    </div>
  </div>
</div>


@endsection()
@section('script')
  <script src="{{ asset('public/js/admin/order.js') }}"></script>
  <script type="text/javascript">
    @if(session('actionuser')=='add' && count($errors) > 0)
        $('.nn-modal-add-gr').modal('show');
    @endif
    @if (session('actionuser')=='edit' && count($errors) > 0)
        $(document).ready(function(){
          $("#enngr{{ session('editid') }}").trigger('click');
        });
    @endif
  </script>
@endsection()