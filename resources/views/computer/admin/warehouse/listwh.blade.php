@extends('computer.master')
@section('title','Lịch sử')
@section('content')
<div id="page-wrapper">
  <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('admin.his_warehouse_p')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        @if(session('thongbao'))
                            <div class="alert-tb alert alert-success">
                                <span class="fa fa-check"> </span> {{ session('thongbao') }}
                            </div>
                        @endif
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>{{ trans('admin.type') }}</th>
                                        <th>{{ trans('admin.content_p') }}</th>                   
                                        <th>{{ trans('admin.price_import') }}</th>
                                        <th>{{ trans('admin.price_export') }}</th>
                                        <th>{{ trans('admin.staff_p') }}</th>
                                        <th>{{ trans('admin.date_p') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ware as $ware)
                                    <tr class="odd gradeX">
                                        <td>{{ $ware->id }}</td>   
                                        <td>
                                            @if($ware->category ==1)
                                            Nhập
                                            @elseif($ware->category ==2)
                                            Xuất
                                            @else
                                            Hiệu chỉnh
                                            @endif
                                        </td>
                                        <td>{{ $ware->content }}</td>                    
                                        <td>{{ $ware->pricein }}</td>
                                        <td>{{ $ware->priceout }}</td>
                                        <td>{{ $ware->userware }}</td>
                                        <td>{{ $ware->created_at }}</td>
                                        
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

@endsection()