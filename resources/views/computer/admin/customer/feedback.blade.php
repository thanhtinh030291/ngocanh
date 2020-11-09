@extends('computer.master')
@section('title','workflow management - Feedback')
@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ý kiến khách hàng</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
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
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-customer">
                        <thead>
                            <tr>
                                <th>Tên </th>
                                <th>Email</th>
                                <th>Nội dung</th>
                                <th>Ngày</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feedback as $fb)
                            <tr class="odd gradeX">
                                <td>{{ $fb->name }}</td>
                                <td>{{ $fb->email }}</td>
                                <td>{!! str_limit($fb->content, $limit = 100, $end = '...') !!}</td>
                                <td>{{ $fb->created_at }}</td>
                                <td editid="{{ $fb->id }}" content="{{ $fb->content }}" name="{{ $fb->name }}" mail="{{ $fb->email }}" date="{{ $fb->created_at }}">
                                    <span class="btn btn-default view_feedback"><i class="fa fa-calendar"></i> Chi tiết</span>
                                    <span class="btn btn-danger nndremovecus"><i class="fa fa-trash"></i> Xóa</span>
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
<div class="modal fade nn-modal-view-feedback" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Nội Dung Góp ý</h4>
          </div>
          <form class="form-horizontal" method="post" action="list/delete" enctype="multipart/form-data">
          <div class="modal-body" id="content_feedback">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Đóng cửa sổ</button>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <!-- end modal -->
<div class="modal fade nn-modal-delete-Customer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Xóa Customer</h4>
          </div>
          <form class="form-horizontal" method="post" action="feedback/delete" enctype="multipart/form-data">
          <input type="hidden" name="dennidCustomer" id="dennidCustomer" /> 
          <input type="hidden" name="_token" value="{{ csrf_token()}}" />
          <div class="modal-body">
            <div class="row">
                <h4 class="nnbodydelete">Bạn có chắc xóa Customer <i id="deletename"></i></h4>
            </div>
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
  <script src="{{ asset('public/js/admin/feedback.js') }}"></script>
@endsection()