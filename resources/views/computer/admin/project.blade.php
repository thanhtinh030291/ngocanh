@extends('computer.master')
@section('title','Kho ứng dụng')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kho ứng dụng</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-slide" id="nn-add-slide">+ Thêm mới   </button>
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
                                        <th>Tiêu đề ứng dụng</th>
                                        <th>Ẩn hiện</th>
                                        <th>Hình ảnh</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $item)
                                    <tr class="odd gradeX">
                                        <td>{{ $item->number }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            @if($item->status==1)
                                                <span class="text-success">Đăng hiện</span>
                                            @else
                                                <span class="text-warning">Đang ẩn</span>
                                            @endif
                                        </td>
                                        <td class="center">
                                            <img src="{{ asset($item->img) }}" style="width: 55px"> 
                                        </td>
                                        <td><i class="nneditslide btn btn-info fa fa-edit" id="ennslide{{ $item->id }}" editid="{{ $item->id }}" hide="{{ $item->status }}" title="{{ $item->title }}" link="{{ $item->link }}" imgo="{{ asset($item->img) }}"  img="{{ $item->img }}" lang="{{ $item->idlang }}" num="{{ $item->number }}"> Sửa</i>
                                            <i class="nndeditslide btn btn-danger fa fa-trash" img="{{ $item->img }}" editid="{{ $item->id }}" title="{{ $item->title }}"> Xóa </i>
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

<div class="modal fade nn-modal-add-slide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Thêm mới ứng dụng</h4>
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
                        <label for="nntitle" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Tên ứng dụng:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nntitle" id="nntitle" placeholder="Nhập tên ứng dụng" value="{!! old('nntitle') !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnlink" class="col-sm-3 control-label"><i class="fa  fa-newspaper-o"></i> Link:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnlink" id="nnlink" placeholder="Link download" value="{!! old('nnlink') !!}">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12"> 
                    <div class="form-group">
                        <label for="nnavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                        <div class="col-sm-8">
                            <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 20%;">
                            <input type="file" name="nnavatarfile" id="nnavatarfile" onchange="showimg(this);">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnhide" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Chế độ:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" value="1" checked> Hiện 
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" value="0"> Ẩn 
                            </label>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="nnnumber" class="col-sm-3 control-label"><i class="fa  fa-sort-numeric-asc"></i> Thứ tự:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnnumber" id="nnnumber" placeholder="Phải là số" value="{!! old('nnnumber') !!}">
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
<div class="modal fade nn-modal-edit-slide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Sửa thông tin ứng dụng</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="ennid" id="ennid" /> 
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
                <di12v class="col-xs-12">
                    <div class="form-group">
                        <label for="enntitle" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Tiêu đề:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="enntitle" id="enntitle" placeholder="Tiêu đề">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennlink" class="col-sm-3 control-label"><i class="fa  fa-newspaper-o"></i> Link:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennlink" id="ennlink" placeholder="Link">
                        </div>
                    </div> 
                <div class="col-xs-12"> 
                    <div class="form-group">
                        <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                        <div class="col-sm-8">
                            <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 20%;">
                            <input type="file" name="ennavatarfile" id="ennavatarfile" onchange="eshowimg(this);" style="display: none">
                            <input type="hidden" name="ennimguserold" id="ennimguserold">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennhide" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Chế độ:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" value="1" checked> Hiện 
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" value="0"> Ẩn 
                            </label>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="ennnumber" class="col-sm-3 control-label"><i class="fa  fa-sort-numeric-asc"></i> Slide số:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennnumber" id="ennnumber" placeholder="Hiện thị số 3< chỉ điền số>">
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
<div class="modal fade nn-modal-delete-slide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Xóa ứng dụng</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennid" id="dennid" /> 
          <input type="hidden" name="dennimg" id="dennimg" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">Bạn có chắc xóa ứng dụng <i id="deletename"></i></h4>
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
  <script src="{{ asset('public/js/admin/project.js') }}"></script>
  <script type="text/javascript">
    @if(session('actionuser')=='add' && count($errors) > 0)
        $('.nn-modal-add-slide').modal('show');
    @endif
    @if (session('actionuser')=='edit' && count($errors) > 0)
        $(document).ready(function(){
          $("#ennslide{{ session('editid') }}").trigger('click');
        });
    @endif
  </script>
@endsection()