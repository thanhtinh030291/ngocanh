@extends('computer.master')
@section('title','Tình trạng sản phẩm')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('translate.sttproduct')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-lang" id="nn-add-lang">+ {{ trans('translate.addnew')}}</button>
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
                                        <th>{{ trans('translate.name')}}</th>
                                        <th>Stt</th>
                                        <th>{{ trans('translate.image')}}</th>
                                        <th>{{ trans('translate.detail')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stt as $st)
                                    <tr class="odd gradeX">
                                        <td>{{ $st->sttname }}</td>
                                        <td>{{ $st->stthide }}</td>
                                        <td class="center">
                                            <img src="{{ asset('public/img/listproduct/'.$st->sttimg) }}" style="width: 55px"> 
                                        </td>
                                        <td>
                                            <i class="nneditlang btn btn-info fa fa-edit" id="ennlang{{ $st->id }}" editid="{{ $st->id }}" char="{{ $st->stthide }}" lname="{{ $st->sttname }}" imgo="{{ $st->sttimg }}"> {{ trans('translate.edit')}}</i>
                                            <i class="nndeditslide btn btn-danger fa fa-trash" imgo="{{ $st->sttimg }}" editid="{{ $st->id }}" title="{{ $st->sttname }}"> {{ trans('translate.delete')}} </i>
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

<div class="modal fade nn-modal-add-lang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans('translate.sttproduct')}}</h4>
          </div>
          <form class="form-horizontal" method="post" action="liststt" enctype="multipart/form-data">
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
                        <label for="nnname" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('translate.sttproduct')}}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnname" id="nnname" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnchar" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('admin.show')}}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnchar" id="nnchar" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> {{ trans('translate.image')}}</label>
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
</div>
    <!-- end modal -->

<div class="modal fade nn-modal-edit-lang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans('translate.sttproduct')}}</h4>
          </div>
          <form class="form-horizontal" method="post" action="liststt/edit" enctype="multipart/form-data">
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
                        <label for="ennname" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('translate.sttproduct')}}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennname" id="ennname" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennchar" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('admin.show')}}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennchar" id="ennchar" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                            <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> {{ trans('translate.image')}}</label>
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
    <!-- end modal -->
<div class="modal fade nn-modal-delete-slide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Xóa Tình trạng sản phẩm</h4>
          </div>
          <form class="form-horizontal" method="post" action="liststt/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidslide" id="dennidslide" /> 
          <input type="hidden" name="dennimgslide" id="dennimgslide" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">Bạn có chắc xóa slide <i id="deletename"></i></h4>
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
  <script src="{{ asset('public/js/admin/prostt.js') }}"></script>
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