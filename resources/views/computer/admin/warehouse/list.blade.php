@extends('computer.master')
@section('title','Sản phẩm')
@section('content')
<div id="page-wrapper">
  <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('admin.warehouse_p')}}</h1>
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
                                        <th>{{ trans('admin.name_p') }}</th>
                                        <th>{{ trans('admin.image_p') }}</th>                   
                                        <th>{{ trans('admin.quantity_p') }}</th>
                                        <th>{{ trans('admin.detail_p') }}</th>
                                        <th>{{ trans('admin.tool_p') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $product)
                                    <tr class="odd gradeX">
                                        <td>{{ $product->namelang($product->id)->name }}</td>
                                        <td class="center">
                                            <img src="{{ asset('public/img/product/'.$product->image) }}" style="width: 55px"> 
                                        </td>                              
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            <i class="nnviewproduct btn btn-info fa fa-edit" namep="{{ $product->namelang($product->id)->name }}" editid="{{ $product->id }}" quantity="{{ $product->quantity }}" imgo="{{ $product->image }}" price="{{ $product->namelang($product->id)->price }}" cate="{{ $product->loaisp->listname }}"> {{ trans('admin.see_p') }}</i>
                                            
                                        </td>
                                        <td namep="{{ $product->namelang($product->id)->name }}" editid="{{ $product->id }}" quantity="{{ $product->quantity }}" imgo="{{ $product->image }}" price="{{ $product->namelang($product->id)->price }}"  >
                                          <i class="nnpostinpro btn btn-success fa fa-edit" id="nnpostin{{ $product->id }}"> {{ trans('admin.import_p') }}</i>
                                            <i class="xnndeditproduct btn btn-warning  fa fa-close" id="nnpostout{{ $product->id }}" > {{ trans('admin.export_p') }} </i>
                                            <i class="hnndeditproduct btn btn-danger fa fa-edit" id="nnpostedit{{ $product->id }}" > {{ trans('admin.edit_p') }} </i>
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
<div class="modal fade nn-modal-edit-warehouse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Nhập xuất hiệu chỉnh</h4>
          </div>
          <form class="form-horizontal" method="post" action="list" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <input type="hidden" name="typepost" id="typepost" />
          <input type="hidden" name="productid" id="productid" />
          <div class="modal-body">
            <div class="row">
                @if(count($errors)>0)
                    <div class="alert-tb alert alert-danger">
                        @foreach($errors->all() as $err)
                          <i class="fa fa-exclamation-circle"></i> {{ $err }}<br/>
                        @endforeach
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="nnnameproduct" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans('admin.name_p') }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnnameproduct" id="nnnameproduct" disabled>
                        </div>
                    </div>    
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="nnnumproduct" class="col-sm-5 control-label"><i class="fa  fa-toggle-on"></i> {{ trans('admin.quantity_co_p') }}:</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="nnnumproduct" id="nnnumproduct" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nnnumproductnew" class="col-sm-5 control-label"><i class="fa  fa-toggle-on"></i> {{ trans('admin.quantity_nhap_p') }} <span class="nnnamecate"></span>:</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="nnnumproductnew" id="nnnumproductnew">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="nnpriceproduct" class="col-sm-5 control-label"><i class="fa  fa-toggle-on"></i> {{ trans('admin.price_sell_p') }} :</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="nnpriceproduct" id="nnpriceproduct" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nnproprice" class="col-sm-5 control-label"><i class="fa  fa-toggle-on"></i>{{ trans('admin.price_p') }} <span class="nnnamecate"></span>:</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name="nnproprice" id="nnproprice" placeholder="5000000">
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="form-group">
                        <label for="nncungcap" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans('admin.supplier_p') }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nncungcap" id="nncungcap" value="Long Trì Company">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnnoteware" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans('admin.comment_p') }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnnoteware" id="nnnoteware" value="Không có ghi chú">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnusername" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans('admin.staff_p') }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnusername" id="nnusername" value="{{ Auth::user()->fullname }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> {{ trans('admin.image_p') }}</label>
                        <div class="col-sm-8">
                            <img id="nnimgproduct" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                        </div>
                    </div>
                    
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('translate.close') }}</button>
            <button type="submit" class="btn btn-primary" id="nnenter">Tiến hành</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
   <!-- model -->

<div class="modal fade nn-view-warehouse" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
          <input type="hidden" name="productviewid" id="productviewid" />          
            <div class="row">
                <div class="col-sm-6">
                    <div class="alert alert-info" role="alert">
                        <h3>{{ trans('admin.name_p') }}: <span id="nn-view-name-pro"></span></h3>
                        <p>{{ trans('admin.quantity_p') }} : <span id="nn-view-quanty-pro"></span></p>
                        <p><i class="fa fa-money"></i> 
                            {{ trans('admin.price_sell_p') }}: <span id="nn-view-price-pro"></span></p>
                        <p><i class="fa fa-envelope-o"></i> {{ trans('admin.type_p') }}: <span id="nn-view-cate-pro"></span>
                        </p>
                    </div>                
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nnviewimgproduct" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> {{ trans('admin.image_p') }}</label>
                        <div class="col-sm-8">
                            <img id="nnviewimgproduct" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                      <table class="table" id="nnappendok">
                          <th class="active">{{ trans('admin.date_p') }}</th>
                          <th class="success">{{ trans('admin.content_p') }}</th>
                          <th class="danger">{{ trans('admin.price_p') }}</th>
                          <th class="info">{{ trans('admin.staff_p') }}</th>                         
                      </table>
                    </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('translate.close') }}</button>
          </div>
        </div>
      </div>
    </div>
</div>

    <!-- end modal -->

@endsection()
@section('script')
  <script src="{{ asset('public/js/admin/warehouse.js') }}"></script>
  <script type="text/javascript">
    @if (session('actionuser')=='postedit' && count($errors) > 0)
        $(document).ready(function(){
          $("#nnpostedit{{ session('editid') }}").trigger('click');
        });
    @endif
    @if (session('actionuser')=='postin' && count($errors) > 0)
        $(document).ready(function(){
          $("#nnpostin{{ session('editid') }}").trigger('click');
        });
    @endif
    @if (session('actionuser')=='postout' && count($errors) > 0)
        $(document).ready(function(){
          $("#nnpostout{{ session('editid') }}").trigger('click');
        });
    @endif
  </script>
@endsection()