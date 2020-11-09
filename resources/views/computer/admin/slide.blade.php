@extends('computer.master')
@section('title','Slide show')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Slide show</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-slide" id="nn-add-slide">+ Thêm Slide show</button>
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
                                    <tr >
                                        <th>Stt</th>
                                        <th>Tiêu đề</th>
                                        <th class="text-center">Ẩn hiện</th>
                                        <th>Hình ảnh</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($slides as $slide)
                                    <tr class="odd gradeX">
                                        <td>{{ $slide->number }}</td>
                                        <td>{{ $slide->title }}</td>
                                        <td class="text-center">
                                            @if($slide->status ==0)
                                                <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                            @else
                                                 <i class="glyphicon glyphicon-ok" style="color:green;"></i>
                                            @endif
                                        </td>
                                        <td class="center">
                                            <img src="{{ asset('public/img/slide/'.$slide->img) }}" style="width: 55px"> 
                                        </td>
                                        <td><i class="nneditslide btn btn-info fa fa-edit" id="ennslide{{ $slide->id }}" editid="{{ $slide->id }}" hide="{{ $slide->status }}" title="{{ $slide->title }}" linknew="{{ $slide->linknew }}" linkyou="{{ $slide->linkyoutube }}" imgo="{{ $slide->img }}" lang="{{ $slide->idlang }}" num="{{ $slide->number }}"> Sửa</i>
                                            <i class="nndeditslide btn btn-danger fa fa-trash" imgo="{{ $slide->img }}" editid="{{ $slide->id }}" title="{{ $slide->title }}"> Xóa </i>
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
            <h4 class="modal-title" id="myModalLabel">Add Slide</h4>
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
                 

                    <div class="form-group">
                        <label for="nnlang" class="col-sm-3 control-label"><i class="fa  fa-ravelry"></i> Ngôn ngữ:</label>
                        <div class="col-sm-9">
                            @foreach($langs as $lang)
                            <label class="radio-inline">
                                <input type="radio" name="nnlang" id="nn-lang-1" value="{{ $lang->id }}" @if($lang->id ==1) checked @endif > {{ $lang->name }}
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nntitle" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Tiêu đề:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nntitle" id="nntitle" placeholder="Tiêu đề slide">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnlinknew" class="col-sm-3 control-label"><i class="fa  fa-newspaper-o"></i> Link bài viết:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnlinknew" id="nnlinknew" placeholder="Link bài viết">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnyoutube" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> Dùng video:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnyoutube" id="nnyoutube" placeholder="link youtube">
                        </div>
                    </div>
                </div>
                <div class="col-xs-6"> 
                    <div class="form-group">
                        <label for="nnavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                        <div class="col-sm-8">
                            <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
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
                        <label for="nnnumber" class="col-sm-3 control-label"><i class="fa  fa-sort-numeric-asc"></i> Slide số:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnnumber" id="nnnumber" placeholder="Hiện thị số 3< chỉ điền số>">
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
            <h4 class="modal-title" id="myModalLabel">Sửa Slide</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="ennidslide" id="ennidslide" /> 
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
                 

                    <div class="form-group">
                        <label for="nnlang" class="col-sm-3 control-label"><i class="fa  fa-ravelry"></i> Ngôn ngữ:</label>
                        <div class="col-sm-9">
                            @foreach($langs as $lang)
                            <label class="radio-inline">
                                <input type="radio" name="ennlang" id="enn-lang-{{ $lang->id }}" value="{{ $lang->id }}" @if($lang->id ==1) checked @endif > {{ $lang->name }}
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="enntitle" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Tiêu đề:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="enntitle" id="enntitle" placeholder="Tiêu đề slide">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennlinknew" class="col-sm-3 control-label"><i class="fa  fa-newspaper-o"></i> Link bài viết:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennlinknew" id="ennlinknew" placeholder="Link bài viết">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennyoutube" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> Dùng video:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennyoutube" id="ennyoutube" placeholder="link youtube">
                        </div>
                    </div>
                </div>
                <div class="col-xs-6"> 
                    <div class="form-group">
                        <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                        <div class="col-sm-8">
                            <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
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
            <h4 class="modal-title" id="myModalLabel">Xóa Slide</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidslide" id="dennidslide" /> 
          <input type="hidden" name="dennimgslide" id="dennimgslide" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">Bạn có chắc xóa slide <i id="deletename"></i></h4>
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
  <script src="{{ asset('public/js/slide.js') }}"></script>
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