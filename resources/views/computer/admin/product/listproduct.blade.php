@extends('computer.master')
@section('title','List Product')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans("admin.cate_p") }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-listpro" id="nn-add-listpro">+ {{ trans("admin.add") }}</button>
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
                                        <th>{{ trans("admin.image") }}</th>
                                        <th>{{ trans("admin.type") }}</th>
                                        <th>{{ trans("admin.detail") }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($listproduct as $listpro)
                                    <tr class="odd gradeX">
                                        <td>{{ $listpro->listnumber }}</td>
                                        <td>{{ $listpro->namelist($listpro->id)->trname }}</td>   
                                        <td class="center">
                                            <img src="{{ asset($listpro->listimg) }}" style="width: 55px"> 
                                        </td>
                                        <td>{{ $listpro->modpro($listpro->listidmod)->trname }}</td> 
                                        <td><i class="nneditlistpro btn btn-info fa fa-edit" id="ennlistpro{{ $listpro->id }}" description="{{ $listpro->description }}" listidmod="{{ $listpro->listidmod }}" type="{{ $listpro->type }}" editid="{{ $listpro->id }}" name="{{ $listpro->namelist($listpro->id)->trname }}" imgo="{{ asset( $listpro->listimg ) }}"  img="{{ $listpro->listimg }}" num="{{ $listpro->listnumber }}"> {{ trans("admin.edit") }}</i>
                                            <i class="nndeditlistpro btn btn-danger fa fa-trash" img="{{ $listpro->listimg }}" editid="{{ $listpro->id }}" name="{{ $listpro->namelist($listpro->id)->trname }}"> {{ trans("admin.delete") }}</i>
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

<div class="modal fade nn-modal-add-listpro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans("admin.add") }} {{ trans("admin.cate_p") }}</h4>
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
                        <label for="nntheloai" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans("admin.theloai") }}:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="nntheloai">
                                <option value='xxx'>--{{ trans("admin.theloai") }}--</option>
                                @foreach($modulepro as $ls)
                                    <option value="{{ $ls->id }}"> {{ $ls->namelist($ls->id)->trname }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="listname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans("admin.name") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="listname" id="listname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnnumber" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans("admin.show") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnnumber" value="0" id="nnnumber" placeholder=" ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans("admin.type") }}:</label>
                        <div class="col-sm-9">
                          <select name="type" id="type" class="form-control" >
                            <option value="0">----</option>
                            <option value="1">Loại hiển thị 1</option>
                            <option value="2">Loại hiển thị 2</option>
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
                        <label for="nnavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> {{ trans("admin.image") }}</label>
                        <div class="col-sm-8">
                            <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
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
<div class="modal fade nn-modal-edit-listpro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans("admin.edit") }}</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="ennidlistpro" id="ennidlistpro" />
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
                        <label for="enntheloai" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans("admin.theloai") }}:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="enntheloai" id="enntheloai">
                                @foreach($modulepro as $ls)
                                    <option value="{{ $ls->id }}"> {{ $ls->namelist($ls->id)->trname }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="elistname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans("admin.name") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="listname" id="elistname" placeholder=" ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennnumber" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> {{ trans("admin.show") }}:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennnumber" id="ennnumber" placeholder=" ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label"><i class="fa  fa-font"></i> {{ trans("admin.type") }}:</label>
                        <div class="col-sm-9">
                          <select name="type" id="etype" class="form-control" >
                            <option value="0">----</option>
                            <option value="1">Loại hiển thị 1</option>
                            <option value="2">Loại hiển thị 2</option>
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
                        <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> {{ trans("admin.image") }}</label>
                        <div class="col-sm-8">
                            <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
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
<div class="modal fade nn-modal-delete-listpro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">{{ trans("admin.delete") }}</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidlistpro" id="dennidlistpro" /> 
          <input type="hidden" name="dennimglistpro" id="dennimglistpro" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete"> {{ trans("admin.delete") }}? <i id="deletename"></i></h4>
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
<div class="modal fade nn-add-view-language" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Đa ngôn ngữ - English</h4>
          </div>
          <form class="form-horizontal" method="post" action="listlang/update" enctype="multipart/form-data">
          <input type="hidden" name="vnnidlistpro" id="vnnidlistpro" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
            <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="form-group">
                          <label for="nnenlish" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Name English:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nnenlish" id="nnenlish" placeholder="Name Category">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="nnvietnam" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Tên TV:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nnvietnam" id="nnvietnam" disabled>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="nnmodule" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Thể loại:</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="nnmodule" id="nnmodule" disabled>
                          </div>
                      </div>                 
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng cửa sổ</button>
              <button type="submit" class="btn btn-info">Cập nhật</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->


@endsection()
@section('script')
  <script src="{{ asset('public/js/admin/listpro.js') }}"></script>
  <script type="text/javascript">
    @if(session('actionuser')=='add' && count($errors) > 0)
        $('.nn-modal-add-listpro').modal('show');
    @endif
    @if (session('actionuser')=='edit' && count($errors) > 0)
        $(document).ready(function(){
          $("#ennlistpro{{ session('editid') }}").trigger('click');
        });
    @endif
  </script>
@endsection()