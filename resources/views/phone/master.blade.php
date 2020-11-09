<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" href="{{ asset('public/favicon.ico') }}">

    <title>@yield('title')</title>

    <link href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/bootstrap/metisMenu/metisMenu.min.css') }}" rel="stylesheet">  
    <link href="{{ asset('public/bootstrap/css/sb-admin-2.css') }}" rel="stylesheet">          
    <link href="{{ asset('public/css/page.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/bootstrap/css/font-awesome.css') }}" rel="stylesheet"> 
    <script src="{{ asset('public/bootstrap/js/jquery.js') }}"></script>

</head>

<body>
    <div id="wrapper">
                <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top navbar-fixed-top" role="navigation" style="margin-bottom: 0 ;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/')}}">Quán Số v1.0.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Công việc chưa nhận</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Công việc đang làm</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Công việc hoàn thành</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ url('/')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('/work')}}"><i class="fa fa-ravelry fa-fw"></i> Công việc</a>
                        </li>
                        <li>
                            <a href="{{ url('/product')}}"><i class="fa fa-free-code-camp fa-fw"></i> Thiết bị</a>
                        </li>
                        <li>
                            <a href="{{ url('/customer')}}"><i class="fa fa-address-card-o fa-fw"></i> Khách hàng</a>
                        </li>
                        <li>
                            <a href="{{ url('/user')}}"><i class="fa fa-users fa-fw"></i> Thành viên</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<!-- content -->
    @yield('content')

<!-- end content -->

    </div>

    <!-- model -->

<div class="modal fade nn-view-work-phone" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tên công việc cần làm</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="alert alert-success" role="alert">
                        <p>Cài đặt phần mềm - máy in<br> + Kiểm tra máy in ...</p>
                    </div> 
                    <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">08:00 AM - 11:30 AM</abbr></p>  
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt obcaecati, quaerat tempore officia voluptas debitis consectetur culpa amet, accusamus dolorum fugiat, animi dicta aperiam, enim incidunt quisquam maxime neque eaque.</p> 
                </div>
                <div class="col-sm-6">
                    <div class="alert alert-warning" role="alert">
                        <h3>Cty Quán Số</h3>
                        <p>Địa chỉ khách hàng : 16 Nguyễn Hành - Cẩm Lệ - Đà Nẵng</p>
                        <p><i class="fa fa-phone"></i> 
                            <abbr title="Phone">0123.456.789</p>
                        <p><i class="fa fa-envelope-o"></i> 
                            <abbr title="Email">Email</abbr>: <a href="#">nguyennam.90st@gmail.com</a>
                        </p>
                        <p><i class="fa fa-clock-o"></i> 
                        <abbr title="Hours">08:00 AM - 17:00 PM</abbr></p>
                    </div>                
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12">
                @for($a=0;$a<=4;$a++)
                    <div class="col-sm-6 nn-pro-wp">
                        <div class="col-xs-3">
                            <img src="https://ytc.com.vn/wp-content/uploads/2016/07/Setting-icon-250x250.png">
                        </div>
                        <div class="col-xs-9">
                            <p>Tên sản phẩm<br>
                            <i>Số lượng: 02</i><br>
                            <i>Đơn giá : 2.000.000 </i>
                            </p>
                        </div>
                    </div>
                @endfor
                    <button type="button" class="btn btn-info nn-float-right" data-toggle="modal" data-target=".nn-add-pro-wp">Nhập thêm thiết bị</button>
                </div>
            </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Nhận công việc</button>
          </div>
        </div>
      </div>
    </div>
</div>

    <!-- end modal -->
<!-- end modal -->

    <div class="modal fade nn-add-pro-wp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Thêm sản phẩm</h4>
          </div>
          <div class="modal-body">
                <div class="row">
                @for($a=0;$a<=4;$a++)
                    <div class="col-sm-6 nn-pro-wp nn-pro-wp-in">
                        <div class="col-xs-3">
                            <img src="https://ytc.com.vn/wp-content/uploads/2016/07/Setting-icon-250x250.png">
                            <button type="button" class="btn btn-danger nn-float-right nn-add-pro-ok">Nhập +</button>
                        </div>
                        <div class="col-xs-9">
                            <div>
                                <p><b>Tên sản phẩm </b></p>
                            </div>
                            <input type="text" name="nn-number-wp" class="form-control nn-input-wp" value="1">
                            <input type="text" name="nn-price-wp" class="form-control nn-input-wp" value="2.000.000">  
                            <input type="text" name="nn-note-wp" class="form-control nn-input-wp" placeholder="Ghi chú">                         
                        </div>
                    </div>
                @endfor
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

        <!-- end modal -->
</body>
    <script src="{{ asset('public/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/bootstrap/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('public/bootstrap/js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('public/js/pagephone.js') }}"></script>
</html>