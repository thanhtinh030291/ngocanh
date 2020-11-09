@extends('computer.master')
@section('title','Quảng Cáo')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quảng Cáo</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-advert" id="nn-add-advert">+ Thêm Quảng Cáo</button>
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
                                        <th>NN</th>
                                        <th>Vị trí</th>
                                        <th>Hiện thị</th>
                                        <th>Hình ảnh</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($adverts as $advert)
                                    <tr class="odd gradeX">
                                        <td>{{ $advert->idlang }}</td>
                                        <td class="text-center">
                                            @if($advert->area ==1)
                                                <span style="color: #1f796d;">Đầu trang</span>
                                            @elseif($advert->area ==2)
                                                <span style="color: #16690c;">Giữa trang</span>
                                            @elseif($advert->area ==3)
                                                <span style="color: red;">Cuối trang </span>    
                                            @else
                                                <span style="color: #673020;">Trang chủ</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($advert->hide ==1)
                                                <span class="glyphicon glyphicon-remove" style="color: red;"></span>
                                            @else
                                                 <i class="glyphicon glyphicon-ok" style="color:green;"></i>
                                            @endif
                                        </td>
                                        <td class="center">
                                            <img src="{{ asset('public/img/advert/'.$advert->img) }}" style="width: 55px"> 
                                        </td>
                                        <td>
                                            <i class="nneditadvert btn btn-info fa fa-edit" id="ennadvert{{ $advert->id }}" editid="{{ $advert->id }}" lang="{{ $advert->idlang }}" hide="{{ $advert->hide }}" area="{{ $advert->area }}"  link="{{ $advert->link }}" imgo="{{ $advert->img }}"> Sửa</i>
                                            <i class="nndeditlistpro btn btn-danger fa fa-trash"  editid="{{ $advert->id }}" imgo="{{ $advert->img }}" title="{{ $advert->id }}" > Xóa</i>
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

<div class="modal fade nn-modal-add-advert" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Quảng cáo</h4>
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
                        <label for="name" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Ngôn ngữ:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="nnlang" id="nn-lang-1" value="1" checked> VN
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnlang" id="nn-lang-2" value="2"> EN
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnchar" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Hiện thị:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" id="nn-hide-1" value="1" > Ẩn
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnhide" id="nn-hide-2" value="2" checked> Hiện
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nnchar" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Khu vực:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="nnshowin" id="nn-show-1" value="1" > Đầu trang
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnshowin" id="nn-show-2" value="2" checked> Giữa trang
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnshowin" id="nn-show-3" value="3"> Cuối trang
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nnshowin" id="nn-show-4" value="4"> Trang chủ
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nnlink" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Link:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nnlink" id="nnlink" placeholder="link bài viết quảng cáo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nnavatar" class="col-sm-3 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                        <div class="col-sm-9">
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

<div class="modal fade nn-modal-edit-advert" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ngôn ngữ</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/edit" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <input type="hidden" name="ennidadvert" id="ennidadvert" /> 
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
                        <label for="ennlang" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Ngôn ngữ:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="ennlang" id="nn-lang-1" value="1"> VN
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennlang" id="nn-lang-2" value="2"> EN
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennhide" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Hiện thị:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" id="nn-hide-1" value="1" > Ẩn
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennhide" id="nn-hide-2" value="2"> Hiện
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ennshowin" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Khu vực:</label>
                        <div class="col-sm-9">
                            <label class="radio-inline">
                                <input type="radio" name="ennshowin" id="nn-show-1" value="1" > Đầu trang
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennshowin" id="nn-show-2" value="2"> Giữa trang
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennshowin" id="nn-show-3" value="3"> Cuối trang
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="ennshowin" id="nn-show-4" value="4"> Trang chủ
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ennlink" class="col-sm-3 control-label"><i class="fa  fa-free-code-camp"></i> Link:</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="ennlink" id="ennlink" placeholder="link bài viết quảng cáo">
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

    <!-- end modal -->
<div class="modal fade nn-modal-delete-listpro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Xóa Quảng Cáo</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidlistpro" id="dennidlistpro" /> 
          <input type="hidden" name="dennimglistpro" id="dennimglistpro" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">Bạn có chắc xóa Quảng Cáo <i id="deletename"></i></h4>
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
  <script src="{{ asset('public/js/advert.js') }}"></script>
  <script type="text/javascript">
    @if(session('actionuser')=='add' && count($errors) > 0)
        $('.nn-modal-add-advert').modal('show');
    @endif
    @if (session('actionuser')=='edit' && count($errors) > 0)
        $(document).ready(function(){
          $("#ennadvert{{ session('editid') }}").trigger('click');
        });
    @endif
  </script>
@endsection()