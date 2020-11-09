@extends('computer.master')
@section('title','workflow management - customer')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ trans('admin.custommer')}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target=".nn-add-customer" id="nn-add-cust">+ Thêm khách hàng</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-customer">
                        <thead>
                            <tr>
                                <th>Tên quán</th>
                                <th>Thông tin</th>
                                <th>Số ĐT</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0; $i <=30; $i++)
                            <tr class="odd gradeX">
                                <td>Coffee {{ rand(1000,9999) }}</td>
                                <td>kaka-neymar-ronando</td>
                                <td>0123456789</td>
                                
                                <td class="center">Tiêu chuẩn</td>                                        
                                <td class="center" data-toggle="modal" data-target=".nn-info-customer"><i class="fa fa-eye"></i> Chi tiết</td>
                            </tr>
                            @endfor
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

    <div class="modal fade nn-info-customer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Khách hàng</h4>
          </div>
          <div class="modal-body">
            <div class="row info alert-info" style="padding: 15px 0;">         
                   <div class="col-xs-6">                        
                      <div class="form-group">
                        <label for="nn-name-cus" class="col-xs-3 control-label"><i class="fa fa-id-badge"></i> Name:</label>
                        <div class="col-xs-9">
                            <p><b>Quán Số Company</b></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nn-address-cus" class="col-xs-3 control-label"><i class="fa fa-map-marker"></i> Addr:</label>
                        <div class="col-xs-9">
                          <p>16 Nguyễn Hành - Cẩm lệ - Đà Nẵng</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nn-phone-cus" class="col-xs-3 control-label"><i class="fa fa-phone"></i> Phone:</label>
                        <div class="col-xs-9">
                          <p>0123456789</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nn-mail-cus" class="col-xs-3 control-label"><i class="fa fa-envelope-o"></i> Mail:</label>
                        <div class="col-xs-9">
                            <p>Nguyennam.90st@gmail.com</p>
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label for="nn-key-cus" class="col-xs-3 control-label"><i class="fa fa-key"></i> Key:</label>
                        <div class="col-xs-9">
                                + 01 Phần mềm vĩnh viễn <br>
                                + 02 tablet vĩnh viễn <br>
                                + 01 Kitchen vĩnh viễn.
                        </div>
                      </div>                  
                   </div>
                   <div class="col-xs-6">
                        <div class="form-group">
                            <label for="nn-phone-cus" class="col-xs-3 control-label"><i class="fa fa-clock-o"></i> Time:</label>
                            <div class="col-xs-9">
                              <p>08:00 Am - 17:00 PM</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nn-note-cus" class="col-xs-3 control-label"><i class="fa  fa-comments-o"></i> Note:</label>
                            <div class="col-xs-9">
                              <p>   + 01 Phần mềm vĩnh viễn <br>
                                    + 02 tablet vĩnh viễn <br>
                                    + 01 Kitchen vĩnh viễn.
                              </p>
                            </div>
                        </div>

                      <div class="form-group">
                        <label for="nn-phone-cus" class="col-xs-4 control-label"><i class="fa fa-ravelry"></i> Tỉnh thành:</label>
                        <div class="col-xs-8" >
                          <p>Đà nẵng</p>
                        </div>
                      </div>
                       
                   </div>   
            </div>
            <div class="row"> 
                <div class="col-xs-12">
                     <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tên công việc</th>
                                <th>Nhân viên</th>
                                <th>Ngày tháng</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                        @for($s=0;$s<=2;$s++)
                            <tr>
                                <td>Cài đặt hệ thống</td>
                                <td>Nguyễn Nam</td>
                                <td>22-2-2017</td>
                                <td>Hoàn thành</td>
                                <td class="center" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-eye"></i> Chi tiết</td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->  
                </div>
            </div>    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

        <!-- end modal -->


@endsection()