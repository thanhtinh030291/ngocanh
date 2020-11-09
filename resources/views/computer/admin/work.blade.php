@extends('computer.master')
@section('title','Đơn hàng')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đơn hàng</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-modal-add-job" id="nn-add-job">+ Thêm đơn hàng</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Khách hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Trạng thái</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX info">
                                        <td>Coffee Man</td>
                                        <td>Internet Explorer 4.0</td>
                                        <td>Nguyễn Nam</td>
                                        <td class="center info">Đã nhận</td>                                        
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="even gradeC info">
                                        <td>Coffee Man</td>
                                        <td>Internet Explorer 5.0</td>
                                        <td>Nguyễn Nam</td>
                                        <td class="center info">Đã nhận</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="odd gradeA info">
                                        <td>Coffee Man</td>
                                        <td>Internet Explorer 5.5</td>
                                        <td>Nguyễn Nam</td>
                                        <td class="center info">Đã nhận</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="even gradeA info">
                                        <td>Coffee Man</td>
                                        <td>Internet Explorer 6</td>
                                        <td>Hồng Thủy</td>
                                        <td class="center info">Đã nhận</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="odd gradeA info">
                                        <td>Coffee Man</td>
                                        <td>Internet Explorer 7</td>
                                        <td>Mrs.Hương</td>
                                        <td class="center info">Đã nhận</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="even gradeA info">
                                        <td>Coffee Man</td>
                                        <td>AOL browser (AOL desktop)</td>
                                        <td>Mr.Hiệp</td>
                                        <td class="center info">Đã nhận</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA info">
                                        <td>Coffee Man</td>
                                        <td>Firefox 1.0</td>
                                       <td>Mrs.Hương</td>
                                        <td class="center info">Đã nhận</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA warning">
                                        <td>Coffee Man</td>
                                        <td>Firefox 1.5</td>
                                       <td>Mrs.Hương</td>
                                        <td class="center warning">Trễ</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA warning">
                                        <td>Coffee Man</td>
                                        <td>Firefox 2.0</td>
                                       <td>Mrs.Hương</td>
                                        <td class="center warning">Trễ</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA info">
                                        <td>Coffee Man</td>
                                        <td>Firefox 3.0</td>
                                        <td>Nguyễn Nam</td>
                                        <td class="center info">Đã nhận</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA warning">
                                        <td>Coffee Man</td>
                                        <td>Camino 1.0</td>
                                        <td>Hồng Thủy</td>
                                        <td class="center warning">Trễ</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA warning">
                                        <td>Coffee Man</td>
                                        <td>Camino 1.5</td>
                                        <td>Hồng Thủy</td>
                                        <td class="center warning">Trễ</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA info">
                                        <td>Coffee Man</td>
                                        <td>Netscape 7.2</td>
                                        <td>Hồng Thủy</td>
                                        <td class="center info">Đã nhận</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA info">
                                        <td>Coffee Man</td>
                                        <td>Netscape Browser 8</td>
                                        <td>Hồng Thủy</td>
                                        <td class="center info">Đã nhận</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA warning">
                                        <td>Coffee Man</td>
                                        <td>Netscape Navigator 9</td>
                                       <td>Mrs.Hương</td>
                                        <td class="center warning">Trễ</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA success">
                                        <td>Coffee Man</td>
                                        <td>Mozilla 1.0</td>
                                        <td>Hồng Thủy</td>
                                        <td class="center success">Hoàn thành</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA warning">
                                        <td>Coffee Man</td>
                                        <td>Mozilla 1.1</td>
                                        <td>Hồng Thủy</td>
                                        <td class="center warning">Trễ</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA danger">
                                        <td>Coffee Man</td>
                                        <td>Mozilla 1.2</td>
                                        <td>Hồng Thủy</td>
                                        <td class="center danger">Đã hủy</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA info">
                                        <td>Coffee Man</td>
                                        <td>Mozilla 1.3</td>
                                        <td>Hồng Thủy</td>
                                        <td class="center info">Đã nhận</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA success">
                                        <td>Coffee Man</td>
                                        <td>Mozilla 1.4</td>
                                        <td>Hồng Thủy</td>
                                        <td class="center success">Hoàn thành</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
                                    <tr class="gradeA danger">
                                        <td>Coffee Man</td>
                                        <td>Mozilla 1.5</td>
                                        <td>Hồng Thủy</td>
                                        <td class="center danger">Đã hủy</td>
                                        <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                                    </tr>
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

<div class="modal fade nn-modal-add-job" tabindex="-2" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thêm công việc</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-xs-6">
			    <form class="form-horizontal">
				  <div class="form-group">
				    <label for="nninputname" class="col-sm-3 control-label"><i class="fa fa-linode"></i> Name</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="nninputname" placeholder="Tên công việc">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-3 control-label"><i class="fa fa-commenting-o"></i> Note</label>
				    <div class="col-sm-9">
				      <textarea class="form-control" rows="3" id="comment"></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="nntime" class="col-sm-3 control-label"><i class="fa fa-clock-o"></i> Time</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="nntime" placeholder="Thời gian làm">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-3 control-label"><i class="fa fa-user"></i> User</label>
				    <div class="col-sm-9">
				      <select class="form-control" id="sel1">
				        <option>Mọi người</option>
				        <option>Nguyễn Nam</option>
				        <option>Hồng Thủy</option>
				        <option>Admin</option>
				      </select>				    
				    </div>
				  </div>
				</form>
            </div>
            <div class="col-xs-6">
                <div class="alert alert-warning nn-full-bg">
                	<div class="col-xs-12 form-group">
					    <label class="col-sm-3 control-label" for="id_label_single"><i class="fa fa-address-card-o"></i> Customer</label>
					    <div class="col-sm-9">
					      <select class="nn-basic-single" id="id_label_single" style="width: 100%">
					      @for($i=1;$i<=20;$i++)
					        <option value="CL">Coffee Light-{{$i}}</option>
					        <option value="CN">Coffee Nguyễn-{{$i}}</option>
					        <option value="CT">Coffee Thủy-{{$i}}</option>
					        <option value="CA">Coffee Admin-{{$i}}</option>
					        @endfor
					      </select>		    
					    </div>
					</div>
					<hr>
					<div class="col-xs-12">
	                    <p><i class="fa fa-map-marker"></i> <abbr title="address">Địa chỉ</abbr>: 16 Nguyễn Hành - Cẩm Lệ - Đà Nẵng</p>
	                    <p><i class="fa fa-phone"></i> 
	                        <abbr title="Phone">Điện thoại</abbr>: 0123.456.789</p>
	                    <p><i class="fa fa-envelope-o"></i> 
	                        <abbr title="Email">Email</abbr>: <a href="#">nguyennam.90st@gmail.com</a>
	                    </p>
	                    <p><i class="fa fa-clock-o"></i> 
	                    <abbr title="Hours">08:00 AM - 17:00 PM</abbr></p>
	                    <button type="button" class="btn btn-waring">Xem khách hàng</button>
	                    <button type="button" class="btn btn-info nn-float-right" data-toggle="modal" data-target=".nn-add-customer">+ Khách hàng mới</button>
                    </div>
                </div>                
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive">
                  <table class="table">
                      <th class="active">STT</th>
                      <th class="success">Tên thiết bị</th>
                      <th class="danger">Số lượng</th>
                      <th class="info">Thành tiền</th>
                  </table>
                  <p>Tổng giá trị đơn hàng: <b>0.00 VND</b></p>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info nn-float-left" data-toggle="modal" data-target=".nn-add-product">Nhập thêm thiết bị</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Tạo mới</button>
      </div>
    </div>
  </div>
</div>

    <!-- end modal -->

@endsection()