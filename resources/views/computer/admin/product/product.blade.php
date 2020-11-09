@extends('computer.master')
@section('title','Sản phẩm')
@section('content')
<div id="page-wrapper">
  <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('translate.Product')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-product" id="nn-add-product">+ {{ trans('admin.add')}}</button>
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
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>{{ trans('admin.cate_p')}}</th>
                                        <th>{{ trans('admin.image')}}</th>                   
                                        <th>{{ trans('admin.quantity')}}</th>
                                        <th>{{ trans('admin.module_p')}}</th>
                                        <th>{{ trans('admin.group')}}</th>
                                        <th>{{ trans('admin.loaimon')}}</th>
                                        <th>{{ trans('admin.show')}}</th>
                                        <th>{{ trans('admin.edit')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $product)
                                    <tr class="odd gradeX">
                                        <td>{{ $product->namelang($product->id)['name'] }}</td>
                                        <!-- <td>{{ $product->loaisp->listname }}</td> -->
                                        <td class="center">
                                            <img src="{{ asset('public/img/product/'.$product->image) }}" style="width: 55px"> 
                                            
                                        </td>                              
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->tinhtrang->sttname }}</td> 
                                        <td>{{ $product->modproduct($product->id)->trname }}</td> 
                                        <td>{{ ($product->type == 1)?" Khai vị ":(($product->type == 2)?" Món chính ":(($product->type == 3)?" Tráng miệng ":"")) }}</td> 
                                        <td editid="{{ $product->id }}">@if($product->hide==NULL || $product->hide == 0)<span class="nn_change_hide btn btn-info">{{ trans('admin.show')}}</span>@else<span class="nn_change_hide btn btn-warning">{{ trans('admin.hide')}}</span>@endif</td>            
                                        <td>
                                            <i class="nneditproduct btn btn-info fa fa-edit" id="ennproduct{{ $product->id }}" editid="{{ $product->id }}"  type="{{ $product->type }}" status="{{ $product->status }}" unit="{{ $product->quantity_sale }}" vat="{{ $product->vat }}" sale="{{ $product->sale }}" idlist="{{ $product->idlist }}" idmod="{{ $product->modproduct($product->id)->idmod }}" imgo="{{ $product->image }}"> {{ trans('admin.edit')}}</i>
                                            <i class="nndeditproduct btn btn-danger fa fa-trash" imgo="{{ $product->image }}" editid="{{ $product->id }}" name="{{ $product->id }}"> {{ trans('admin.delete')}}</i>
                                            <a href="{!! url('/admin/product/addcontent/'.$product->id)!!}"><i class="nnimgproduct btn btn-success fa fa-images nn-float-right">{{ trans('admin.detail')}}</i></a>
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

<div class="modal fade nn-modal-add-product" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans('admin.product')}}</h4>
          </div>
          <form class="form-horizontal" method="post" action="list" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
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
                        <label for="nnmodnews" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans('admin.module_p')}}:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="nnmodnews" id="nn-mod-news">
                                <option value="null">--{{ trans('admin.module_p')}}--</option>
                                @foreach($modulepro as $ls)
                                    <option value="{!! $ls->id !!}"> {{ $ls->namelist($ls->id)->trname }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnlistnew" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans('admin.cate_p')}}:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="nnlistnew" id="nn-list-new">
                                <option value="null">--{{ trans('admin.cate_p')}}--</option>
                                @foreach($lpro as $ls)
                                    <option value="{!! $ls->id !!}"> {{ $ls->listname }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="nnunit" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i>{{ trans('admin.qty_si')}}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnunit" id="nnunit" placeholder=" " >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnstatus" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('admin.status')}}:</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="nnstatus" >
                                @foreach($stt as $ls)
                                    <option value="{{ $ls->id }}"> {{ $ls->sttname }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnprovat" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> VAT:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnprovat" id="nnprovat" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnsale" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('admin.price_giam')}}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnsale" id="nnsale" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> {{ trans('admin.image')}}</label>
                        <div class="col-sm-8">
                            <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                            <input type="file" name="nnavatarfile" id="nnavatarfile" onchange="showimg(this);">
                        </div>
                    </div>
                
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('admin.close')}}</button>
            <button type="submit" class="btn btn-primary">{{ trans('admin.add')}}</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->

<div class="modal fade nn-modal-edit-product" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans('admin.product')}}</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <input type="hidden" name="ennidproduct" id="ennidproduct" /> 
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
                        <label for="ennmodnews" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans('admin.module_p')}}:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="enmodnews" id="enn-mod-news">
                                <option value="null">--{{ trans('admin.module_p')}}--</option>
                                @foreach($modulepro as $ls)
                                    <option value="{!! $ls->id !!}"> {{ $ls->modname }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennlistnew" class="col-sm-3 control-label"> {{ trans('admin.cate_p')}}:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="ennlistnew" id="enn-list-new">
                                @foreach($lpro as $ls)
                                    <option value="{!! $ls->id !!}"> {{ $ls->listname }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="ennunit" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('admin.qty_si')}}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennunit" id="ennunit" placeholder=" " >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennstatus" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('admin.status')}}:</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="ennstatus" id="ennstatus">
                                @foreach($stt as $ls)
                                    <option value="{!! $ls->id !!}"> {{ $ls->sttname }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennprovat" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> VAT:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennprovat" id="ennprovat" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennsale" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('admin.price_giam')}}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennsale" id="ennsale" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> {{ trans('admin.image')}}</label>
                            <div class="col-sm-8">
                                <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                                <input type="file" name="ennavatarfile" id="ennavatarfile" onchange="eshowimg(this);" style="display: none">
                                <input type="hidden" name="ennimguserold" id="ennimguserold">
                            </div>
                        </div>
                
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('admin.close')}}</button>
            <button type="submit" class="btn btn-primary">{{ trans('admin.update')}}</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
    <!-- end modal -->
<div class="modal fade nn-modal-delete-news" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans('admin.delete')}}</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidnew" id="dennidnew" /> 
          <input type="hidden" name="dennimgnew" id="dennimgnew" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">{{ trans('admin.delete')}}? <i id="deletename"></i></h4>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.close')}}</button>
            <button type="submit" class="btn btn-warning">{{ trans('admin.delete')}}</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->

@endsection()
@section('script')
  <script src="{{ asset('public/js/admin/product.js') }}"></script>
  <script type="text/javascript">
    @if(session('actionuser')=='add' && count($errors) > 0)
        $('.nn-modal-add-product').modal('show');
    @endif
    @if (session('actionuser')=='edit' && count($errors) > 0)
        $(document).ready(function(){
          $("#ennproduct{{ session('editid') }}").trigger('click');
        });
    @endif
  </script>
@endsection()