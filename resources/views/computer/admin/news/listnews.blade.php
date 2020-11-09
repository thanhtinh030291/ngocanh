@extends('computer.master')
@section('title','List News')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">List News</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-listpro" id="nn-add-listpro">+ Thêm loại Tin</button>
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
                                        <th>Thể loại TT</th>                  
                                        <th>Tên loại TT</th>
                                        <th>Hình ảnh</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($news as $listpro)
                                    <tr class="odd gradeX">
                                        <td>{{ $listpro->listnumber }}</td>
                                        <td>{{ $listpro->modnew->modname }}</td>
                                        <td>{{ $listpro->listname }}</td>   
                                        <td class="center">
                                            <img src="{{ asset($listpro->listimg) }}" style="width: 55px"> 
                                        </td> 
                                        <td><i class="nneditlistpro btn btn-info fa fa-edit" id="ennlistpro{{ $listpro->id }}" description="{{ $listpro->description }}" editid="{{ $listpro->id }}" listidmod="{{ $listpro->listidmod }}" name="{{ $listpro->listname }}" imgo="{{ asset($listpro->listimg) }}" img="{{ $listpro->listimg }}" num="{{ $listpro->listnumber }}"> Sửa</i>
                                            <i class="nndeditlistpro btn btn-danger fa fa-trash" img="{{ $listpro->listimg }}" editid="{{ $listpro->id }}" name="{{ $listpro->listname }}"> Xóa </i>
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
            <h4 class="modal-title" id="myModalLabel">Thêm loại SP</h4>
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
                        <label for="nntheloai" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Thể loại:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="nntheloai">
                              <option value="xxxx"> Vui Lòng Chọn Thể loại</option>
                                @foreach($modulepro as $ls)
                                    <option value="{{ $ls->id }}"> {{ $ls->modname }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="listname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Tiêu đề:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="listname" id="listname" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnnumber" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Hiện thị:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnnumber" id="nnnumber" placeholder="Thứ tự hiện thị < số >">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nndescription" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Mô tả:</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="nndescription" id="nndescription" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                        <div class="col-sm-8">
                            <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                            <input type="file" name="nnavatarfile" id="nnavatarfile" onchange="showimg(this);">
                        </div>
                    </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng cửa sổ</button>
            <button type="submit" class="btn btn-primary">Tạo mới</button>
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
            <h4 class="modal-title" id="myModalLabel">Sửa listpro</h4>
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
                        <label for="enntheloai" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Thể loại:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="enntheloai" id="enntheloai">
                              <option value="xxxx"> Vui Lòng Chọn Thể loại</option>
                                @foreach($modulepro as $ls)
                                    <option value="{{ $ls->id }}"> {{ $ls->modname }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="elistname" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Tiêu đề:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="listname" id="elistname" placeholder="Tên loại Sp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennnumber" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Hiện thị:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennnumber" id="ennnumber" placeholder="Thứ tự hiện thị < số >">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="enndescription" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Mô tả:</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="enndescription" id="enndescription" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                        <div class="col-sm-8">
                            <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                            <input type="file" name="ennavatarfile" id="ennavatarfile" onchange="eshowimg(this);" style="display: none">
                            <input type="hidden" name="ennimguserold" id="ennimguserold">
                        </div>
                    </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng cửa sổ</button>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
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
            <h4 class="modal-title" id="myModalLabel">Xóa listpro</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidlistpro" id="dennidlistpro" /> 
          <input type="hidden" name="dennimglistpro" id="dennimglistpro" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">Bạn có chắc xóa listpro <i id="deletename"></i></h4>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Đóng cửa sổ</button>
            <button type="submit" class="btn btn-warning">Xóa</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-view-language" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Đa ngôn ngữ</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="vnnidlistpro" id="vnnidlistpro" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                tab add
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Đóng cửa sổ</button>
            <button type="submit" class="btn btn-warning">Xóa</button>
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