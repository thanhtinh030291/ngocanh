@extends('computer.master')
@section('title','workflow management - users')
@section('content')
<div id="page-wrapper">
  <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách thành viên</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-add-user-new" id="nn-add-product-new">+ Thêm thành viên</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">                
                @if(session('thongbao'))
                    <div class="alert-tb alert alert-success">
                        <span class="fa fa-check"> </span> {{ session('thongbao') }}
                    </div>
                @endif
                @if(session('errorus'))
                    <div class="alert-tb alert alert-danger">
                        <span class="fa fa-close"> </span> {{ session('errorus') }}
                    </div>
                @endif
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-product">
                        <thead>
                            <tr>
                                <th>Level</th>
                                <th>Họ tên</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th>Hình ảnh</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $us)
                            <tr class="odd gradeX">
                              @if($us->level==99)
                                <td>Boss</td> 
                              @elseif($us->level==9)
                                <td>Admin</td> 
                              @else
                                <td>Member</td> 
                              @endif                          
                                <td>{{ $us->fullname }}</td>
                                <td>{{ $us->address }}</td>
                                <td>{{ $us->phone }}</td>
                                
                                <td class="center">
                                  <img src="{{ asset('public/img/user/'.$us->avatar) }}" style="width: 55px">
                                </td>                                        
                                <td class="center nnedit" uname="{{ $us->username }}" editid="{{ $us->id }}" fname="{{ $us->fullname }}" addr="{{ $us->address }}" phone="{{ $us->phone }}" htown="{{ $us->hometown }}" imgo="{{ $us->avatar }}" note="{{ $us->note }}" bday="{{ $us->birthday }}" level="{{ $us->level }}">
                                  <i id="ennuser{{ $us->id }}" class="nnedituser btn btn-info fa fa-edit"> Sữa</i> &nbsp; &nbsp; 
                                  <i class="enndeleteusser btn btn-danger fa fa-trash"> Xóa </i>
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

   <!-- end modal -->

    <div class="modal fade nn-add-user-new" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Thêm mới thành viên</h4>
          </div>
          <form class="form-horizontal" method="post" action="listuser" enctype="multipart/form-data">    
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
                        <label for="username" class="col-sm-4 control-label"><i class="fa   fa-envelope-o"></i> Email</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" name="username" placeholder="Email đăng nhập">
                        </div>
                      </div>                       
                      <div class="form-group">
                        <label for="nnfullname" class="col-sm-4 control-label"><i class="fa   fa-user-circle-o"></i> Họ tên</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nnfullname" placeholder="Nguyễn Văn A">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nnaddress" class="col-sm-4 control-label"><i class="fa fa-location-arrow"></i> Địa chỉ</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nnaddress" placeholder="Đà Nẵng">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nnphone" class="col-sm-4 control-label"><i class="fa fa-mobile"></i> Điện thoại</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nnphone" placeholder="0123456789">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nnhometown" class="col-sm-4 control-label"><i class="fa fa-map-signs"></i> Quê quán</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nnhometown" placeholder="Quê quán">
                        </div>
                      </div>                      
                      <div class="form-group">
                            <label for="nnnote" class="col-sm-4 control-label"><i class="fa  fa-comments-o"></i> Ghi chú</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" rows="5" name="nnnote"></textarea>
                            </div>
                        </div>              
                   </div>
                   <div class="col-xs-6">
                        <div class="form-group">
                            <label for="nnbirthday" class="col-sm-4 control-label"><i class="fa fa-birthday-cake"></i> Ngày sinh</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="nnbirthday" placeholder="22/02/2002">
                            </div>
                          </div>
                      
                       <div class="form-group">
                            <label for="nnavatar" class="col-sm-4 control-label"><i class="fa  fa-picture-o"></i> Hình ảnh</label>
                            <div class="col-sm-8">
                                <img id="nnavatar" src="http://shopproject30.com/wp-content/themes/venera/images/placeholder-camera-green.png" alt="..." class="img-thumbnail" style="width: 50%;">
                                <input type="file" name="nnavatarfile" id="nnavatarfile" onchange="showimg(this);">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="nn-level-user" class="col-sm-4 control-label"><i class="fa fa-toggle-on"></i> Level</label>
                          <div class="col-sm-8">
                              <label class="radio-inline">
                                <input type="radio" name="nnlevel" id="nn-level-1" value="99" > Boss
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="nnlevel" id="nn-level-2" value="9"> Admin
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="nnlevel" id="nn-level-3" value="0" checked=""> Mem
                              </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="password" class="col-sm-4 control-label"><i class="fa fa-key"></i> Mật khẩu</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" placeholder="mật khẩu">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="nnrepass" class="col-sm-4 control-label"><i class="fa fa-key"></i> Nhập lại Mk</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" name="nnrepass" placeholder="Nhập lại mật khẩu">
                          </div>
                        </div>
                   </div>
               
            </div>     
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info" >Nhập mới</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- end modal -->
       <!-- end modal -->

    <div class="modal fade nn-edit-user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Sửa thành viên</h4>
          </div>
          <form class="form-horizontal" method="post" action="listuser/edit" enctype="multipart/form-data">    
          <input type="hidden" name="_token" value="{{ csrf_token()}}" /> 
          <input type="hidden" name="enniduser" id="enniduser" /> 
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
                        <label for="ennusername" class="col-sm-4 control-label"><i class="fa   fa-envelope-o"></i> Email</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" name="ennusername" id="ennusername" readonly>
                        </div>
                      </div>                       
                      <div class="form-group">
                        <label for="ennfullname" class="col-sm-4 control-label"><i class="fa   fa-user-circle-o"></i> Họ tên</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="ennfullname" id="ennfullname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nnaddress" class="col-sm-4 control-label"><i class="fa fa-location-arrow"></i> Địa chỉ</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="ennaddress" id="ennaddress">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nnphone" class="col-sm-4 control-label"><i class="fa fa-mobile"></i> Điện thoại</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="ennphone" id="ennphone">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nnhometown" class="col-sm-4 control-label"><i class="fa fa-map-signs"></i> Quê quán</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="ennhometown" id="ennhometown">
                        </div>
                      </div>                      
                      <div class="form-group">
                            <label for="nnnote" class="col-sm-4 control-label"><i class="fa  fa-comments-o"></i> Ghi chú</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" rows="5" name="ennnote" id="ennnote"></textarea>
                            </div>
                        </div>              
                   </div>
                   <div class="col-xs-6">
                        <div class="form-group">
                            <label for="nnbirthday" class="col-sm-4 control-label"><i class="fa fa-birthday-cake"></i> Ngày sinh</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="ennbirthday" id="ennbirthday">
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
                        <div class="form-group">
                          <label for="enn-level-user" class="col-sm-4 control-label"><i class="fa fa-toggle-on"></i> Level</label>
                          <div class="col-sm-8">
                              <label class="radio-inline">
                                <input type="radio" name="ennlevel" id="enn-level-1" value="99" > Boss
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="ennlevel" id="enn-level-2" value="9"> Admin
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="ennlevel" id="enn-level-3" value="0" checked=""> Mem
                              </label>
                          </div>
                        </div>
                        @if(Auth::user()->id==1)
                          <div class="form-group">
                              <label for="newpassword" class="col-sm-12 control-label"> Đổi mật khẩu chỉ dành cho Quản Trị Viên Cao Cấp.</label>
                            </div>
                            <div class="form-group">
                              <label for="newpassword" class="col-sm-4 control-label"><i class="fa fa-key"></i> Mật khẩu</label>
                              <div class="col-sm-8">
                                <input type="password" class="form-control" name="newpassword" placeholder="mật khẩu mới">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="nnrepassnew" class="col-sm-4 control-label"><i class="fa fa-key"></i> Nhập lại Mk</label>
                              <div class="col-sm-8">
                                <input type="password" class="form-control" name="nnrepassnew" placeholder="Nhập lại mật khẩu mới">
                              </div>
                            </div>
                        @endif
                   </div>
               
            </div>     
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-info" >Hoàn tất sửa</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- end modal -->
    <!-- end modal -->
<div class="modal fade nn-modal-delete-user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Xóa User</h4>
          </div>
          <form class="form-horizontal" method="post" action="listuser/delete" enctype="multipart/form-data">
          <input type="hidden" name="enndeleteuid" id="enndeleteuid" /> 
          <input type="hidden" name="dennimgslide" id="dennimgslide" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">Bạn có chắc xóa User <i id="deletename"></i></h4>
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
  <script src="{{ asset('public/js/user.js') }}"></script>
  <script type="text/javascript">
    @if(session('actionuser')=='add' && count($errors) > 0)
        $('.nn-add-user-new').modal('show');
    @endif
    @if (session('actionuser')=='edit' && count($errors) > 0)
        $(document).ready(function(){
          $("#ennuser{{ session('editid') }}").trigger('click');
        });
    @endif
  </script>
@endsection()