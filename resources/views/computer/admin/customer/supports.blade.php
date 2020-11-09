@extends('computer.master')
@section('title','workflow management - customer')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Hỗ trợ trực tuyến</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-add-customer" id="nn-add-cust">+ {{ trans("admin.add") }}</button>
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
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-customer">
                        <thead>
                            <tr>
                                <th>{{ trans("admin.name") }}</th>
                                <th>{{ trans("admin.info") }}</th>
                                <th>{{ trans("admin.phone") }}</th>
                                <th>{{ trans("admin.status") }}</th>
                                <th>{{ trans("admin.detail") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $cus)
                            <tr class="odd gradeX">
                                <td>{{ $cus->cusfullname }}</td>
                                <td>{{ $cus->cusemail }}</td>
                                <td>{{ $cus->cusphone }}</td>
                                
                                <td class="center">

                                <img @if($cus->idloginsocial==null) src="{{ asset('public/img/customers/'.$cus->cusimg) }}" @else src="{{ $cus->cusimg }}" @endif style="width: 55px">
                                </td>                                        
                                <td>
                                    <i class="nneditcustomer btn btn-info fa fa-edit" id="enngr{{ $cus->id }}" editid="{{ $cus->id }}" name="{{ $cus->cusfullname }}" imgo="{{ $cus->cusimg }}" phone="{{ $cus->cusphone }}" cusemail="{{ $cus->cusemail }}" status="{{ $cus->status }}" cusaddress="{{ $cus->cusaddress }}" cusface="{{ $cus->cusface }}" hide="{{ $cus->status }}" idgroup="{{ $cus->idgroup }}"> {{ trans("admin.edit") }}</i>
                                    <i class="nndremovecus btn btn-danger fa fa-trash" imgo="{{ $cus->cusimg }}" editid="{{ $cus->id }}" name="{{ $cus->cusfullname }}"> {{ trans("admin.delete") }}</i>
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


        <!-- end modal -->

<div class="modal fade nn-add-customer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans("admin.add") }}</h4>
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
                <div class="col-xs-6">
                    <div class="form-group" style="display: none;">                        
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="type" id="type" value="sp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nngroupkh" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans("admin.group") }}:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="nngroupkh">
                                <option value="2">Hỗ trợ trực tuyến</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnfullname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans("admin.name") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnfullname" id="nnfullname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnmailcus" class="col-sm-3 control-label"><i class="fa  fa-newspaper-o"></i>{{ trans("admin.email") }}:</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" name="nnmailcus" id="nnmailcus" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnphonecus" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> {{ trans("admin.phone") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnphonecus" id="nnphonecus" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnaddcus" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> {{ trans("admin.address") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnaddcus" id="nnaddcus" placeholder=" ">
                        </div>
                    </div>                    

                </div>
                <div class="col-xs-6"> 
                    <div class="form-group">
                        <label for="nnavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> {{ trans("admin.image") }}</label>
                        <div class="col-sm-8">
                            <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                            <input type="file" name="nnavatarfile" id="nnavatarfile" onchange="showimg(this);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnhide" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans("admin.status") }}:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" value="1" checked> Vip 
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" value="1" > Mới 
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" value="0"> Ẩn 
                            </label>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="nnfacebook" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> Link FB KH:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnfacebook" id="nnfacebook" placeholder="Facebook Khách hàng">
                        </div>
                    </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans("admin.close") }}</button>
            <button type="submit" class="btn btn-primary">{{ trans("admin.add") }}</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-edit-Customer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans("admin.edit") }}</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="ennidCustomer" id="ennidCustomer" /> 
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
                <div class="col-xs-6">
                    <div class="form-group" style="display: none;">                        
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="type" id="type" value="sp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="enngroupkh" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans("admin.group") }}:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="enngroupkh">
                                <option value="2">Hỗ trợ trực tuyến</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennfullname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans("admin.name") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennfullname" id="ennfullname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennmailcus" class="col-sm-3 control-label"><i class="fa  fa-newspaper-o"></i> {{ trans("admin.email") }}:</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" name="ennmailcus" id="ennmailcus" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennphonecus" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> {{ trans("admin.phone") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennphonecus" id="ennphonecus" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennaddcus" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> {{ trans("admin.address") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennaddcus" id="ennaddcus" placeholder=" ">
                        </div>
                    </div>                    

                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> {{ trans("admin.image") }}</label>
                        <div class="col-sm-8">
                            <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                            <input type="file" name="ennavatarfile" id="ennavatarfile" onchange="eshowimg(this);" style="display: none">
                            <input type="hidden" name="ennimguserold" id="ennimguserold">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennhide" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans("admin.status") }}:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" value="1" checked> Vip 
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" value="1" > Mới 
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" value="0"> Ẩn 
                            </label>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="ennfacebook" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> Facebook:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennfacebook" id="ennfacebook" placeholder=" ">
                        </div>
                    </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans("admin.close") }}</button>
            <button type="submit" class="btn btn-primary">{{ trans("admin.update") }}</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-delete-Customer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans("admin.delete") }}</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidCustomer" id="dennidCustomer" /> 
          <input type="hidden" name="dennimgCustomer" id="dennimgCustomer" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">{{ trans("admin.delete") }}? <i id="deletename"></i></h4>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans("admin.close") }}</button>
            <button type="submit" class="btn btn-warning">{{ trans("admin.delete") }}</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
@endsection()
@section('script')
  <script src="{{ asset('public/js/admin/customer.js') }}"></script>
  <script type="text/javascript">
    @if(session('actionuser')=='add' && count($errors) > 0)
        $('.nn-add-customer').modal('show');
    @endif
    @if (session('actionuser')=='edit' && count($errors) > 0)
        $(document).ready(function(){
          $("#enngr{{ session('editid') }}").trigger('click');
        });
    @endif
  </script>
@endsection()