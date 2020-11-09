@extends('computer.master')
@section('title','admin')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('translate.Dashboard')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-calendar  fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $order }}</div>
                            <div>{{ trans('translate.Order')}}</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/order/list')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans('translate.viewall')}}!</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-address-card fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $customer }}</div>
                            <div>{{ trans('translate.Customer')}}</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/customers/list')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans('translate.viewall')}}!</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-microchip fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $product }}</div>
                            <div>{{ trans('translate.Product')}}</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/product/list')}}">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans('translate.viewall')}}!</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-clock-o  fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">13</div>
                            <div>{{ trans('translate.warning')}}!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">{{ trans('translate.viewall')}}!</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
<!-- /#page-wrapper -->
<hr>
<div class="row">
    <div class="col-lg-12">
        <h3 style="color:#B34436 ">{{ trans('translate.Orderoverview')}}</h3>
    </div>
    <div class="row col-xs-12">    
        <div class="progress">
          <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="{{ $new }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $new }}%">
            {{ trans('translate.Neworder')}}
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="{{ $hand }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $hand }}%">
            {{ trans('translate.Ordersprocessing')}}
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ $success }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $success }}%">
            {{ trans('translate.Ordersuccess')}}
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="{{ $del }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $del }}%">
            {{ trans('translate.Ordercancel')}}
          </div>
        </div> 
    </div>
</div>
<hr>
    <div class="row">  
        <div class="col-sm-8">
            <h4 style="color:#B34436 ">{{ trans('translate.Neworder')}}</h4>
            <div class="col-xs-12">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>HD</th>
                            <th>{{ trans('translate.Customer')}}</th>
                            <th>{{ trans('translate.phone')}}</th>
                            <th>{{ trans('translate.note')}}</th>
                            <th>{{ trans('translate.detail')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listorder as $order)
                        <tr>
                            <td>DH{{ $order->id }}</td>           
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->telephone }}</td>
                            <td>{{ $order->comment }}</td>     
                            <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg">
                                <a href="{!! url('/admin/order/view/'.$order->id)!!}"><span class="btn btn-default"><i class="fa fa-calendar"></i> {{ trans('translate.detail')}}</span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
        </div>
        <div class="col-sm-4 alert alert-danger">
            <h4>{{ trans('admin.visit') }}</h4>
            <p> 
                {{ trans('admin.online') }}: {{ $online }} <br>
                {{ trans('admin.today') }}: {{ $day }} <br>
                {{ trans('admin.yesterday') }}: {{ $yesterday }} <br>
                {{ trans('admin.this_week') }}: {{ $week }} <br>
                {{ trans('admin.last_week') }}: {{ $lastweek }} <br>
                {{ trans('admin.this_month') }}: {{ $month }} <br>
                {{ trans('admin.this_year') }}: {{ $year }} <br>
                {{ trans('admin.times') }}: {{ $visit }}
            </p>
        </div>
    </div>
<hr>
@endsection() 