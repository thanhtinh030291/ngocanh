@extends('computer.master')
@section('title','Mạng xã hội')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('admin.social') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-socical" id="nn-add-socical">+ {{ trans('admin.add_social') }}</button>
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
                                        <th>{{ trans('admin.name') }}</th>
                                        <th>{{ trans('admin.icon') }}</th>
                                        <th>{{ trans('admin.status') }}</th>
                                        <th>{{ trans('admin.detail') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($socicals as $socical)
                                    <tr class="odd gradeX">
                                        <td>{{ $socical->id }}</td>
                                        <td>{{ $socical->name }}</td>
                                        <td class="center">
                                            <i class="fa {{ $socical->icon }}">
                                        </td>
                                        <td>{{ $socical->hide }}</td>        
                                        <td>
                                            <i class="nneditsocical btn btn-info fa fa-edit" id="ennsocical{{ $socical->id }}" editid="{{ $socical->id }}" lang="{{ $socical->idlang }}" hide="{{ $socical->hide }}" name="{{ $socical->name }}" icon="{{ $socical->icon }}" link="{{ $socical->link }}"> {{ trans('translate.edit') }}</i>
                                            <i class="nndeletesocical btn btn-danger fa fa-trash" editid="{{ $socical->id }}" name="{{ $socical->name }}"> {{ trans('translate.delete') }}</i>
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

<div class="modal fade nn-modal-add-socical" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans('admin.social') }}</h4>
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
                        <label for="nnlang" class="col-sm-3 control-label"><i class="fa fa-ravelry"></i> {{ trans('translate.language') }}:</label>
                        <div class="col-sm-9">
                            @foreach($langs as $lang)
                            <label class="radio-inline">
                                <input type="radio" name="nnlang" id="nn-lang-1" value="{{ $lang->id }}" @if($lang->id ==1) checked @endif > {{ $lang->name }}
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans('admin.name') }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnname" id="nnname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnicon" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> {{ trans('admin.icon') }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnicon" id="nnicon" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnlink" class="col-sm-3 control-label"><i class="fa fa-share-alt-square"></i> Link:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnlink" id="nnlink" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnchar" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans('admin.status') }}:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" id="nn-hide-1" value="1" > {{ trans('admin.status_hide') }}
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" id="nn-hide-2" value="2" checked> {{ trans('admin.status_show') }}
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
<div class="modal fade nn-modal-edit-socical" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit mạng xã hội</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <input type="hidden" name="ennidsocical" id="ennidsocical" /> 
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
                        <label for="ennlang" class="col-sm-3 control-label"><i class="fa fa-ravelry"></i> {{ trans('translate.language') }}:</label>
                        <div class="col-sm-9">
                            @foreach($langs as $lang)
                            <label class="radio-inline">
                                <input type="radio" name="ennlang" id="nn-lang-1" value="{{ $lang->id }}"/>{{ $lang->name }}
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans('admin.name') }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennname" id="ennname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennicon" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Icon:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennicon" id="ennicon" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennlink" class="col-sm-3 control-label"><i class="fa fa-share-alt-square"></i> Link:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennlink" id="ennlink" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennhide" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans('admin.status') }}::</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" id="nn-hide-1" value="1" > {{ trans('admin.status_hide') }}
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" id="nn-hide-2" value="2" checked> {{ trans('admin.status_show') }}
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
<div class="modal fade nn-modal-delete-socical" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans('translate.delete')}} {{ trans('admin.social')}}</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidsocical" id="dennidsocical" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">{{ trans('translate.delete')}}? <i id="deletename"></i></h4>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('translate.close')}}</button>
            <button type="submit" class="btn btn-warning">{{ trans('translate.update')}}</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->

@endsection()
@section('script')
  <script src="{{ asset('public/js/admin/socical.js') }}"></script>
  <script type="text/javascript">
    @if(session('actionuser')=='add' && count($errors) > 0)
        $('.nn-modal-add-socical').modal('show');
    @endif
    @if (session('actionuser')=='edit' && count($errors) > 0)
        $(document).ready(function(){
          $("#ennsocical{{ session('editid') }}").trigger('click');
        });
    @endif
  </script>
@endsection()