@extends('computer.master')
@section('title','Module Product')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans("admin.module_p") }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-modproduct" id="nn-add-modproduct">+ {{ trans("admin.add") }}</button>
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
                                        <th>Stt</th>
                                        <th>{{ trans("admin.name") }}</th>
                                        <th>Icon</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($modproducts as $modproduct)
                                    <tr class="odd gradeX">
                                        <td>{{ $modproduct->modnumber }}</td>
                                        <td>{{ $modproduct->namelist($modproduct->id)->trname }}</td>
                                        <td class="center">
                                            <img src="{{ asset($modproduct->modimg) }}" style="width: 25px"> 
                                        </td>    
                                        <!-- <td><i class="btn btn-success fa fa-sitemap" editid="{{ $modproduct->id }}" name="{{ $modproduct->namelist($modproduct->id)->trname }}"> {{ trans("admin.see") }}</i></td>  -->     
                                        <td>
                                            <i class="nneditmodproduct btn btn-info fa fa-edit" description="{{ $modproduct->description }}" imgo="{{ asset($modproduct->modimg) }}" img="{{ $modproduct->modimg }}" id="ennmodproduct{{ $modproduct->id }}" editid="{{ $modproduct->id }}" lang="{{ $modproduct->idlang }}" name="{{ $modproduct->namelist($modproduct->id)->trname }}" num="{{ $modproduct->modnumber }}"> {{ trans("admin.edit") }}</i>
                                            <i class="nndeletemodproduct btn btn-danger fa fa-trash" img="{{ $modproduct->modimg }}" editid="{{ $modproduct->id }}" name="{{ $modproduct->namelist($modproduct->id)->trname }}"> {{ trans("admin.delete") }}</i>
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
            <h4 class="modal-title" id="myModalLabel">{{ trans("admin.module_p") }}</h4>
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

<!--                     <div class="form-group">
                        <label for="nnlang" class="col-sm-3 control-label"><i class="fa fa-ravelry"></i> Ngôn ngữ:</label>
                        <div class="col-sm-9">
                            @foreach($langs as $lang)
                            <label class="radio-inline">
                                <input type="radio" name="nnlang" id="nn-lang-1" value="{{ $lang->id }}" @if($lang->id ==1) checked @endif > {{ $lang->name }}
                            </label>
                            @endforeach
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="modname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans("admin.name") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="modname" id="modname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnnumber" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans("admin.show") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnnumber" id="nnnumber" placeholder=" ">
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="nnmodtype" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans("admin.type") }}:</label>
                        <div class="col-sm-9">
                          <select name="nnmodtype" id="nnmodtype" class="form-control">
                            <option value="0">---</option>
                            <option value="1" >Món ăn</option>
                            <option value="2" >Nước mắm</option>
                          </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="nndescription" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Mô tả:</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="nndescription" id="nndescription" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i>Icon</label>
                        <div class="col-sm-8">
                            <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 15%;">
                            <input type="file" name="nnavatarfile" id="nnavatarfile" onchange="showimg(this);">
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
<div class="modal fade nn-modal-edit-modproduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans("admin.module_p") }}</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
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

<!--                     <div class="form-group">
                        <label for="ennlang" class="col-sm-3 control-label"><i class="fa fa-ravelry"></i> Ngôn ngữ:</label>
                        <div class="col-sm-9">
                            @foreach($langs as $lang)
                            <label class="radio-inline">
                                <input type="radio" name="ennlang" id="nn-lang-1" value="{{ $lang->id }}" @if($lang->id ==1) checked @endif > {{ $lang->name }}
                            </label>
                            @endforeach
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="emodname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans("admin.name") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="modname" id="emodname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennnumber" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans("admin.show") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennnumber" id="ennnumber" placeholder=" ">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label for="ennmodtype" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans("admin.type") }}:</label>
                        <div class="col-sm-9">
                          <select name="ennmodtype" id="ennmodtype" class="form-control">
                            <option value="0">---</option>
                            <option value="1" >Món ăn</option>
                            <option value="2" >Nước mắm</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="enndescription" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Mô tả:</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="enndescription" id="enndescription" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> Icon</label>
                        <div class="col-sm-8">
                            <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 15%;">
                            <input type="file" name="ennavatarfile" id="ennavatarfile" onchange="eshowimg(this);" style="display: none">
                            <input type="hidden" name="ennimguserold" id="ennimguserold">
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
<div class="modal fade nn-modal-delete-modproduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans("admin.delete") }} {{ trans("admin.module_p") }}</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidmodproduct" id="dennidmodproduct" /> 
          <input type="hidden" name="dennimgmod" id="dennimgmod" />  
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
  <script src="{{ asset('public/js/admin/modproduct.js') }}"></script>
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