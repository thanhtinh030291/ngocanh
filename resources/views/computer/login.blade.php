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
    <link href="{{ asset('public/css/login.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/bootstrap/css/font-awesome.css') }}" rel="stylesheet"> 
    <script src="{{ asset('public/bootstrap/js/jquery.js') }}"></script>
    <script src="{{ asset('public/js/login.js') }}"></script>


</head>

<body>
	<div class="login-body">
	    <article class="container-login center-block">
			<section>
				<ul id="top-bar" class="nav nav-tabs nav-justified">
					<li class="active"><a href="#login-access" style="color: #">TECHVN</a></li>
					<li><a href="#">Quên mật khẩu?</a></li>
				</ul>
				<div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12">
					<div id="login-access" class="tab-pane fade active in">
						<h2><i class="glyphicon glyphicon-log-in"></i> Đăng nhập Admin</h2>						
						<form method="POST" accept-charset="utf-8" autocomplete="off" role="form" class="form-horizontal" action="login">
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<div class="form-group ">
								<input type="email" class="form-control" name="username" placeholder="Địa chỉ Email" tabindex="1" value="" />
							</div>
							<div class="form-group ">
								<input type="password" class="form-control" name="nnpassword" placeholder="Mật khẩu" tabindex="2" />
							</div>
							<div class="checkbox">
									<label class="control-label" for="remember_me">
										<input type="checkbox" name="remember_me" id="nn-remember-pass" value="1" class="" tabindex="3" /> Nhớ mật khẩu
									</label>
							</div>
							<br/>
							<div class="form-group ">				
									<button type="submit" name="nn-login-sm" id="nn-submit" tabindex="5" class="btn btn-lg btn-primary">Đăng nhập</button>
							</div>
						</form>	
						@if (count($errors) >0)
						<div class="alert-tb alert alert-danger">
							@foreach($errors->all() as $err)
								{{ $err }}<br/>
							@endforeach
						</div>
						@endif
						@if (session('thongbao'))
						<div class="alert-tb alert alert-warning">
								{{ session('thongbao') }}
						</div>
						@endif
					</div>
				</div>
			</section>
		</article>
	</div>
</body>