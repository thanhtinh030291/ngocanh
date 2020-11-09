@extends('computer.master')
@section('title','Module Payment')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('admin.payment_title')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-modproduct" id="nn-add-modproduct">+ {{ trans('admin.add_payment') }}</button>
                        </div>
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
                                        <th>Stt</th>
                                        <th>{{ trans('admin.payment_title') }}</th>
                                        <th>{{ trans('admin.payment_lang') }}</th>
                                        <th>{{ trans('admin.payment_detail') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($modnews as $modproduct)
                                    <tr class="odd gradeX">
                                        <td>{{ $modproduct->status }}</td>
                                        <td>{{ $modproduct->name }}</td>
                                        <td>{{ $modproduct->lang->name }}</td>      
                                        <td>
                                            <i class="nneditmodproduct btn btn-info fa fa-edit" id="ennmodproduct{{ $modproduct->id }}" editid="{{ $modproduct->id }}" lang="{{ $modproduct->idlang }}" name="{{ $modproduct->name }}" num="{{ $modproduct->status }}" payment="{{ $modproduct->type }}" > {{ trans('translate.edit')}}</i>
                                            <i class="nndeletemodproduct btn btn-danger fa fa-trash" editid="{{ $modproduct->id }}" name="{{ $modproduct->name }}"> {{ trans('translate.delete')}}</i>
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

<div class="modal fade nn-modal-add-modproduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">hình thức thanh toán</h4>
          </div>
          <form class="form-horizontal" method="post" action="payment" enctype="multipart/form-data">
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
                        <label for="nnlang" class="col-sm-3 control-label"><i class="fa fa-ravelry"></i> {{ trans('translate.language')}}:</label>
                        <div class="col-sm-9">
                            @foreach($admin_lang as $lang)
                            <label class="radio-inline">
                                <input type="radio" name="nnlang" id="nn-lang-1" value="{{ $lang->id }}" @if($lang->id ==1) checked @endif > {{ $lang->name }}
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="modname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> T{{ trans('admin.payment_title')}}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="modname" id="modname" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnnumber" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans('admin.show')}}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnnumber" id="nnnumber" placeholder="">
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="nnpaymenttype" class="col-sm-3 control-label"><i class="fa fa-pencil"></i> {{ trans('admin.payment_type')}}:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="nnpaymenttype" id="nn-payment-1" value="1" > ATM                                
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnpaymenttype" id="nn-payment-2" value="2" > CASH                               
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnpaymenttype" id="nn-payment-3" value="3" > CREDITCARD                                
                            </label>
                        </div>
                    </div>               
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('translate.close')}}</button>
            <button type="submit" class="btn btn-primary">{{ trans('translate.addnew')}}</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-edit-modproduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit hình thức thanh toán</h4>
          </div>
          <form class="form-horizontal" method="post" action="payment/edit" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <input type="hidden" name="ennidmodproduct" id="ennidmodproduct" /> 
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
                        <label for="ennlang" class="col-sm-3 control-label"><i class="fa fa-ravelry"></i> {{ trans('translate.language')}}:</label>
                        <div class="col-sm-9">
                            @foreach($admin_lang as $lang)
                            <label class="radio-inline">
                                <input type="radio" name="ennlang" id="nn-lang-1" value="{{ $lang->id }}" @if($lang->id ==1) checked @endif > {{ $lang->name }}
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emodname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans('admin.payment_title')}}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="emodname" id="emodname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennnumber" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans('admin.show')}}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennnumber" id="ennnumber" placeholder=" ">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label for="ennpaymenttype" class="col-sm-3 control-label"><i class="fa fa-pencil"></i> {{ trans('admin.payment_type')}}:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="ennpaymenttype" id="enn-payment-1" value="1" > ATM                                
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennpaymenttype" id="enn-payment-2" value="2" > CASH                               
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennpaymenttype" id="enn-payment-3" value="3" > CREDITCARD                                
                            </label>
                        </div>
                    </div>               
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('translate.close')}}</button>
            <button type="submit" class="btn btn-primary">{{ trans('translate.update')}}</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-delete-modproduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans('translate.delete')}} {{ trans('admin.payment_title')}}</h4>
          </div>
          <form class="form-horizontal" method="post" action="payment/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidmodproduct" id="dennidmodproduct" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">{{ trans('translate.delete')}}? <i id="deletename"></i></h4>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('translate.close')}}</button>
            <button type="submit" class="btn btn-warning">{{ trans('translate.delete')}}</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->

@endsection()
@section('script')
  <script src="{{ asset('public/js/admin/payment.js') }}"></script>
  <script type="text/javascript">
    @if(session('actionuser')=='add' && count($errors) > 0)
        $('.nn-modal-add-modproduct').modal('show');
    @endif
    @if (session('actionuser')=='edit' && count($errors) > 0)
        $(document).ready(function(){
          $("#ennmodproduct{{ session('editid') }}").trigger('click');
        });
    @endif
  </script>
@endsection()