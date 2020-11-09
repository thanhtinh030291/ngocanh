@extends('computer.master')
@section('title','Tin Tức')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('translate.news') }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-news" id="nn-add-job">+ Thêm Tin Tức</button>
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
                                        <th>Tên bài viết</th>
                                        <th>Tóm tắt</th>
                                        <th>Hình ảnh</th>
                                        <th>Người viết</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lnews as $new)
                                    <tr class="odd gradeX info">
                                        <td>{{ $new->newsname }}</td>
                                        <td>{{ $new->newintro }}</td>
                                        <td class="center">
                                            <img src="{{ asset('public/img/news/'.$new->newimg) }}" style="width: 55px"> 
                                        </td>
                                        <td class="center info">Nguyễn Nam</td>                                        
                                        <td>
                                            <i class="nneditnew btn btn-info fa fa-edit" id="ennnew{{ $new->id }}"  idlistnew="{{ $new->idlistnew }}" 
                                            idmod=" @if($new->idlistnew !=''){{$new->modnews($new->id)->idmod }}@else{{$new->idmodnew}} 
                                                    @endif" 
                                                    editid="{{ $new->id }}" name="{{ $new->newsname }}" imgo="{{ $new->newimg }}" num="{{ $new->newnumber }}" intro="{{ $new->newintro }}" newvideo="{{ $new->newvideo }}" newcontent="{{ $new->newcontent }}" newkeywords="{{ $new->newkeywords }}" newtag="{{ $new->newtag }}" > Sửa</i>
                                            <i class="nndeditnew btn btn-danger fa fa-trash" imgo="{{ $new->newimg }}" editid="{{ $new->id }}" name="{{ $new->newsname }}"> Xóa </i>
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

<div class="modal fade nn-modal-add-news" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Thêm Tin Tức</h4>
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
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="nnmodnews" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Thể Loại:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="nnmodnews" id="nn-mod-news" required>
                                    <option value="">---Vui Lòng Chọn Thể loại---</option>
                                    @foreach($modulepro as $ls)
                                        <option value="{!! $ls->id !!}"> {{ $ls->modname }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nnlistnew" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Loại Tin:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="nnlistnew" id="nn-list-new">
                                    <option value="">---Vui Lòng Chọn Thể loại---</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="newsname" class="col-sm-3 control-label"><i class="fa  fa-newspaper-o"></i> Tiêu đề:</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="newsname" id="nntitlenew" placeholder="Link bài viết" value="{!! old('newsname') !!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nnyoutubenew" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> Dùng Video:</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nnyoutubenew" id="nnyoutube" placeholder="link youtube" value="{!! old('nnyoutubenew') !!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nnkeywords" class="col-sm-3 control-label"><i class="fa  fa-note"></i> Keywords:</label>
                            <div class="col-sm-9">
                              <textarea name="nnkeywords" class="form-control" rows="3">{!! old('nnkeywords') !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-6"> 
                        <div class="form-group">
                            <label for="nnavatar" class="col-sm-3 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                            <div class="col-sm-9">
                                <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                                <input type="file" name="nnavatarfile" id="nnavatarfile" onchange="showimg(this);">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nntagnew" class="col-sm-3 control-label"><i class="fa  fa-note"></i> Tag:</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" rows="3" name="nntagnew">{!! old('nntagnew') !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nnhide" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Chế độ:</label>
                            <div class="col-sm-9">
                                <label class="radio-inline">
                                    <input type="radio" name="nnhide" value="2" checked> Nổi bật 
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nnhide" value="1" > Hiện 
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="nnhide" value="0"> Ẩn 
                                </label>
                            </div>                        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <div class="form-group">
                            <label for="nntomtatnew" class="col-sm-2 control-label"><i class="fa  fa-note"></i> Tóm tắt:</label>
                            <div class="col-sm-10">
                              <textarea name="nntomtatnew" class="form-control" rows="2">{!! old('nntomtatnew') !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nncontentnew" class="col-sm-2 control-label"><i class="fa  fa-note"></i> Nội Dung:</label>
                            <div class="col-sm-10">
                              <textarea name="nncontentnew" class="form-control" rows="5">{!! old('nncontentnew') !!}</textarea>
                              <script type="text/javascript">ckeditor("nncontentnew") </script>
                            </div>
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
<div class="modal fade nn-modal-edit-news" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Sửa Tin Tức</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="ennidnews" id="ennidnews" />
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
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="ennmodnews" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Thể Loại:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="ennmodnews" id="enn-mod-news">
                                    <option value="">--Vui Lòng Chọn Thể loại--</option>
                                    @foreach($modulepro as $ls)
                                        <option value="{!! $ls->id !!}"> {{ $ls->modname }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ennlistnew" class="col-sm-3 control-label"><i class="fa  fa-font"></i> Loại Tin:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="ennlistnew" id="enn-list-new">
                                    <option value="">--Vui Lòng Chọn Thể loại--</option>
                                    @foreach($typenews as $ls)
                                        <option value="{!! $ls->id !!}"> {{ $ls->listname }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="newsname" class="col-sm-3 control-label"><i class="fa  fa-newspaper-o"></i> Tiêu đề:</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="newsname" id="enntitlenew" placeholder="Link bài viết" value="{!! old('newsname') !!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ennyoutubenew" class="col-sm-3 control-label"><i class="fa  fa-youtube"></i> Dùng Video:</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="ennyoutubenew" id="ennyoutubenew" placeholder="link youtube" value="{!! old('ennyoutubenew') !!}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ennkeywords" class="col-sm-3 control-label"><i class="fa  fa-note"></i> Keywords:</label>
                            <div class="col-sm-9">
                              <textarea name="ennkeywords" id="ennkeywords" class="form-control" rows="3">{!! old('ennkeywords') !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-6"> 
                        <div class="form-group">
                            <label for="ennavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                            <div class="col-sm-8">
                                <img id="ennavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                                <input type="file" name="ennavatarfile" id="ennavatarfile" onchange="eshowimg(this);" style="display: none">
                                <input type="hidden" name="ennimguserold" id="ennimguserold">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="enntagnew" class="col-sm-3 control-label"><i class="fa  fa-note"></i> Tag:</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" rows="3" name="enntagnew" id="enntagnew">{!! old('enntagnew') !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ennhide" class="col-sm-3 control-label"><i class="fa  fa-toggle-on"></i> Chế độ:</label>
                            <div class="col-sm-9">
                                <label class="radio-inline">
                                    <input type="radio" name="ennhide" value="2" checked> Nổi bật 
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="ennhide" value="1" > Hiện 
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="ennhide" value="0"> Ẩn 
                                </label>
                            </div>                        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <div class="form-group">
                            <label for="enntomtatnew" class="col-sm-2 control-label"><i class="fa  fa-note"></i> Tóm tắt:</label>
                            <div class="col-sm-10">
                              <textarea name="enntomtatnew" class="form-control" rows="2" id="enntomtatnew">{!! old('enntomtatnew') !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="enncontentnew" class="col-sm-2 control-label"><i class="fa  fa-note"></i> Nội Dung:</label>
                            <div class="col-sm-10">
                              <textarea id="enncontentnew" name="enncontentnew" class="form-control" rows="5">{!! old('enncontentnew') !!}</textarea>
                              <script type="text/javascript">ckeditor("enncontentnew")</script>
                            </div>
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
<div class="modal fade nn-modal-delete-news" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Xóa Tin</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidnew" id="dennidnew" /> 
          <input type="hidden" name="dennimgnew" id="dennimgnew" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">Bạn có chắc xóa tin <i id="deletename"></i></h4>
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
  <script src="{{ asset('public/js/admin/news.js') }}"></script>
  <script type="text/javascript">
    @if(session('actionuser')=='add' && count($errors) > 0)
        $('.nn-modal-add-news').modal('show');
    @endif
    @if (session('actionuser')=='edit' && count($errors) > 0)
        $(document).ready(function(){
          $("#ennnew{{ session('editid') }}").trigger('click');
        });
    @endif
  </script>
@endsection()