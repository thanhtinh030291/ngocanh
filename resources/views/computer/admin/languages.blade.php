@extends('computer.master')
@section('title','Ngôn ngữ')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('admin.lang') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-lang" id="nn-add-lang">+ {{ trans('admin.add_lang') }}/button>
                        </div> -->
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
                                        <th>{{ trans('admin.key_lang') }}</th>
                                        <th>{{ trans('admin.name_lang') }}</th>
                                        <th>{{ trans('admin.ensign_lang') }}</th>
                                        <th>{{ trans('admin.curency_lang') }}</th>
                                        <th>{{ trans('admin.detail') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($languages as $lang)
                                    <tr class="odd gradeX">
                                        <td>{{ $lang->char }}</td>
                                        <td>{{ $lang->name }}</td>              
                                        <td class="center">
                                            <img src="{{ asset('public/img/lang/'.$lang->img) }}" style="width: 55px"> 
                                        </td>
                                        <td>{{ $lang->currency }}</td>
                                        <td><i class="nneditlang btn btn-info fa fa-edit" id="ennlang{{ $lang->id }}" editid="{{ $lang->id }}" char="{{ $lang->char }}" lname="{{ $lang->name }}" imgo="{{ $lang->img }}" currency="{{ $lang->currency }}"> {{ trans('translate.edit') }}</i></td>
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

<!-- <div class="modal fade nn-modal-add-lang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ngôn ngữ</h4>
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
                        <label for="name" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('admin.name_lang') }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="name" id="name" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnchar" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('admin.key_lang') }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnchar" id="nnchar" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nncurrency" class="col-sm-3 control-label"><i class="fa  fa-money"></i> {{ trans('admin.curency_lang') }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nncurrency" id="nncurrency" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> {{ trans('admin.ensign_lang') }}</label>
                        <div class="col-sm-8">
                            <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                            <input type="file" name="nnavatarfile" id="nnavatarfile" onchange="showimg(this);">
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
</div> -->
    <!-- end modal -->

<div class="modal fade nn-modal-edit-lang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans('admin.lang')}}</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <input type="hidden" name="ennidlang" id="ennidlang" /> 
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
                        <label for="ennname" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('admin.name_lang') }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennname" id="ennname" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennchar" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('admin.key_lang') }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennchar" id="ennchar" placeholder=" " readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="enncurrency" class="col-sm-3 control-label"><i class="fa  fa-money"></i> {{ trans('admin.curency_lang') }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="enncurrency" id="enncurrency" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> {{ trans('admin.ensign_lang') }}</label>
                            <div class="col-sm-8">
                                <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                                <input type="file" name="ennavatarfile" id="ennavatarfile" onchange="eshowimg(this);" style="display: none">
                                <input type="hidden" name="ennimguserold" id="ennimguserold">
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


@endsection()
@section('script')
  <script src="{{ asset('public/js/lang.js') }}"></script>
  <script type="text/javascript">
    @if(session('actionuser')=='add' && count($errors) > 0)
        $('.nn-modal-add-lang').modal('show');
    @endif
    @if (session('actionuser')=='edit' && count($errors) > 0)
        $(document).ready(function(){
          $("#ennlang{{ session('editid') }}").trigger('click');
        });
    @endif
  </script>
@endsection()