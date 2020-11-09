<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    
	    <link rel="icon" href="{{ asset('public/favicon.ico') }}">

	    <title>@yield('title')</title>

        <link href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/header.css') }}" rel="stylesheet"> 
        <link href="{{ asset('public/css/index.css') }}" rel="stylesheet">         
        <link href="{{ asset('public/css/footer.css') }}" rel="stylesheet"> 
        <link href="{{ asset('public/css/product.css') }}" rel="stylesheet"> 
    	<link href="{{ asset('public/bootstrap/css/font-awesome.css') }}" rel="stylesheet"> 
    	<script src="{{ asset('public/bootstrap/js/jquery.js') }}"></script>       
    	<script src="{{ asset('public/bootstrap/js/bootstrap.js') }}"></script>       
    </head>
    <body>
			<nav class="navbar navbar-patison navbar-fixed-top animate">
			        <div class="container navbar-more visible-xs">
			            <ul class="nav navbar-nav">
			    			<li><a href="tel:0123456789" style="color: #484848;"> (044) <span style="color: #888">233-25-21</span></li>
			                <li><a href="tel:+380974857627" style="color: #484848;"> (097) <span style="color: #888">485-76-27</span></a></li>
			                <li><a href="tel:+380632332521" style="color: #484848;">(063) <span style="color: #888">233-25-21</span></a></li>
			                <li><a href="tel:+380506136211" style="color: #484848;">(050) <span style="color: #888">613-62-11</span></a></li>
						</ul>
					</div>
					<div class="container">
						<!--div class="navbar-header hidden-xs">
							<a class="navbar-brand" href="#">Brand</a>
						</div-->
			            <ul class="nav navbar-nav navbar-left hidden-xs">
						<li class="hidden-xs">
								<a href="#">
									<i class="menu-icon fa fa-clock-o"></i>
									Thời gian: 07:00 AM - 20:00 PM
								</a>
							</li>	
						</ul>
						<ul class="nav navbar-nav navbar-right mobile-bar">
							<li>
								<a href="#">
									<span class="menu-icon fa fa-home"></span>
									Home
								</a>
							</li>
							<li>
								<a href="#">
									<span class="menu-icon fa fa-info"></span>
									<span class="hidden-xs">Long Trì Company</span>
									<span class="visible-xs">Long Trì Company</span>
								</a>
							</li>				
							<li class="hidden-xs">
								<a href="#">
									<span class="menu-icon fa fa-bell-o"></span>
									Long Trì Company
								</a>
							</li>
							<li class="hidden-xs">
								<a href="#">
									<span class="menu-icon fa fa-phone"></span>						
									<span class="hidden-xs">Long Trì Company</span>
								</a>
							</li>
							<li class="visible-xs">
								<a href="">
									<span class="menu-icon fa fa-phone"></span>
									Long Trì Company
								</a>
							</li>
						</ul>
					</div>
				</nav>
			<div class="header-patison-with-menu">
				<section class="header-patison">
					<div class="container-fluid" style="padding: 60px;">
						<div id="logo" class="col-sm-6 col-md-2 col-xs-5">
							<a href="/"><img src="{{ asset('public/img/logo1.png') }}" alt="longtricompany"></a>
						</div>
						<div id="phone" class="col-sm-6 col-md-3 col-xs-6 hidden-xs">
							<div class="content pull-left">
								<span><a href="tel:0123456789" style="color: #ff9a16;"> (08) <span >123.456</span></a></span>
								<span><a href="tel:0123456789" style="color: #ff9a16;"> (08) <span >123.456</span></a></span><br>
								<span><a href="tel:0123456789" style="color: #ff9a16;">(08) <span >123.456</span></a></span>
								<span><a href="tel:0123456789" style="color: #ff9a16;">(08) <span >123.456</span></a></span>
							</div>
							<div class="pull-left head-users-buttons">
								<div class="head-users-button button-callback">
								<a href="../icon/shopping-cart"><i class="fa fa-phone fa-2x"></i><span class="dotted"> Hotline Company</span></a></div>
							</div>
						</div>
						<div id="search" class="col-sm-12 col-md-5  hidden-xs">
							<form action="index.php" method="get" name="formpoisk" id="formpoisk">
								<div class="input-group input-group-sm">
									<input type="text" name="searchstring" class="pform form-control search ac_input" id="targetDiv" value="" placeholder="Search..." autocomplete="off">
									<span class="input-group-btn">
									<button class="btn btn-lg btn-pat-blue" type="button"><i class="fa fa-search"></i></button>
									</span>
								</div><!-- /input-group --> 
							</form>
							<span style="margin-top: 5px;" class="visible-md-block visible-lg-block">Long Trì Company - Uy tín - Chất lượng là hạnh phúc</span>
						</div>
						<!-- cart -->
						<div class="clearfix col-md-2 col-xs-7 pull-right head-users-buttons">
						<div class="col-md-6 col-xs-6 head-users-button button-cart"><i class="fa fa-shopping-cart fa-2x"></i></a></div>
						<div class="col-md-6 col-xs-6 head-users-button button-cart"><i class="fa fa-user fa-2x"></i></a></div>

					<!-- cart -->
					</div>
				</section>
				<section>
					<nav class="header-menu-patison">
					  <div class="container-fluid">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed header-menu-patison-btn" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span>Menu list</span>  
							<i class="fa fa-chevron-down" aria-hidden="true"></i>
					      </button>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
						<div class="container">
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav">       
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Trang chủ<span class="caret"></span></a>       
					        </li>
							<li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Giới thiệu<span class="caret"></span></a>  		  
					        </li>
							 <li><a href="#">Liên hệ</a></li>
							 <li><a href="#">Sản phẩm</a></li>
							 <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tin tức<span class="caret"></span></a>  		  
					        </li>
							<li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tuyển dụng<span class="caret"></span></a>  		  
					        </li>
					      </ul> 
					    </div>	  
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
				</section>
			</div>
			    	


		<!-- body  -->
		<div id="nn_page">
			<header id="nn-header">
				
			</header>
			<!-- content body -->
			<div id="nn-content">
				<div class="container">
					<div id="nn-ct-slide">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							  <!-- Indicators -->
							  <ol class="carousel-indicators">
							    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
							  </ol>

							  <!-- Wrapper for slides -->
							  <div class="carousel-inner" role="listbox">
							    <div class="item active">
							      <img src="http://www.kynangkinhdoanh.com/wp-content/uploads/2016/07/chien-luoc-kinh-te-sang-tao-cua-honda.jpg" alt="Slide 1">
							      <div class="carousel-caption">
							        Slide 1
							      </div>
							    </div>
							    <div class="item">
							      <img src="https://dantricdn.com/thumb_w/640/18be5f307b/2016/11/21/honda-accord-6-1479715141676.jpg" alt="Slide 2">
							      <div class="carousel-caption">
							        Slide 2
							      </div>
							    </div>
							  </div>

							  <!-- Controls -->
							  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							  </a>
							</div>
					</div>
					<div id="nn-ct-cate">
						<div class="col-xs-12 col-sm-6 nn-ct-cate-col">
							<img class="nn-padding-right" src="{{ asset('public/img/q1.jpg') }}">	
						</div>
						<div class="col-xs-12 col-sm-6 nn-ct-cate-col">
							<img class="nn-padding-left" src="{{ asset('public/img/q2.jpg') }}">	
						</div>
					</div>
				</div>
				<div class="container">
					<div class="nn-ct-product">						
						<h4 class="nn-bg-title">Sản Phẩm Mới</h4>
						<div class="nn-bg-note">
							<i>Đây là những mẫu sản phẩm mới nhất của cty mới nhập về ... Hân hạnh được phục vụ quý khách hàng của công ty.</i>
						</div>
						<!-- product -->
						<div class="container">        
					        <div id="carousel-example" class="carousel slide" data-ride="carousel">
					            <!-- Wrapper for slides -->
					            <div class="carousel-inner">
					                <div class="item active">
					                    <div class="row">
					                    	@for($i=1;$i<=4;$i++)
					                        <div class="col-sm-6 col-md-3">
					                        	<div class="col-xs-12">
					                        		<div class="col-item">
						                                <div class="photo">
						                                    <img src="{{ asset('public/img/h'.$i.'.png') }}" class="img-responsive" alt="a" />
						                                </div>
						                                <div class="info">
						                                    <div class="row">
						                                        <div class="price col-md-6">
						                                            <h5>
						                                                Long Trì Company</h5>
						                                            <h5 class="price-text-color">
						                                                68.000 VND</h5>
						                                        </div>
						                                        <div class="rating hidden-sm col-md-6">
						                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
						                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
						                                            </i><i class="fa fa-star"></i>
						                                        </div>
						                                    </div>
						                                    <div class="separator clear-left">
						                                        <p class="btn-add">
						                                            <i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm">Mua hàng</a></p>
						                                        <p class="btn-details">
						                                            <i class="fa fa-list"></i><a href="#" class="hidden-sm">Chi tiết</a></p>
						                                    </div>
						                                    <div class="clearfix">
						                                    </div>
						                                </div>
						                            </div>
					                        	</div>
					                            <div class="col-xs-12">
					                        		<div class="col-item">
						                                <div class="photo">
						                                    <img src="{{ asset('public/img/h'.$i.'.png') }}" class="img-responsive" alt="a" />
						                                </div>
						                                <div class="info">
						                                    <div class="row">
						                                        <div class="price col-md-6">
						                                            <h5>
						                                                Long Trì Company</h5>
						                                            <h5 class="price-text-color">
						                                                68.000 VND</h5>
						                                        </div>
						                                        <div class="rating hidden-sm col-md-6">
						                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
						                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
						                                            </i><i class="fa fa-star"></i>
						                                        </div>
						                                    </div>
						                                    <div class="separator clear-left">
						                                        <p class="btn-add">
						                                            <i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm">Mua hàng</a></p>
						                                        <p class="btn-details">
						                                            <i class="fa fa-list"></i><a href="#" class="hidden-sm">Chi tiết</a></p>
						                                    </div>
						                                    <div class="clearfix">
						                                    </div>
						                                </div>
						                            </div>
					                        	</div>
					                        </div>
					                        @endfor
					                    </div>
					                </div>
					                <div class="item">
					                    <div class="row">
					                    	@for($i=1;$i<=4;$i++)
					                        <div class="col-sm-6 col-md-3">
					                        	<div class="col-xs-12">
					                        		<div class="col-item">
						                                <div class="photo">
						                                    <img src="{{ asset('public/img/h'.$i.'.png') }}" class="img-responsive" alt="a" />
						                                </div>
						                                <div class="info">
						                                    <div class="row">
						                                        <div class="price col-md-6">
						                                            <h5>
						                                                Long Trì Company</h5>
						                                            <h5 class="price-text-color">
						                                                68.000 VND</h5>
						                                        </div>
						                                        <div class="rating hidden-sm col-md-6">
						                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
						                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
						                                            </i><i class="fa fa-star"></i>
						                                        </div>
						                                    </div>
						                                    <div class="separator clear-left">
						                                        <p class="btn-add">
						                                            <i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm">Mua hàng</a></p>
						                                        <p class="btn-details">
						                                            <i class="fa fa-list"></i><a href="#" class="hidden-sm">Chi tiết</a></p>
						                                    </div>
						                                    <div class="clearfix">
						                                    </div>
						                                </div>
						                            </div>
					                        	</div>
					                            <div class="col-xs-12">
					                        		<div class="col-item">
						                                <div class="photo">
						                                    <img src="{{ asset('public/img/h'.$i.'.png') }}" class="img-responsive" alt="a" />
						                                </div>
						                                <div class="info">
						                                    <div class="row">
						                                        <div class="price col-md-6">
						                                            <h5>
						                                                Long Trì Company</h5>
						                                            <h5 class="price-text-color">
						                                                68.000 VND</h5>
						                                        </div>
						                                        <div class="rating hidden-sm col-md-6">
						                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
						                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
						                                            </i><i class="fa fa-star"></i>
						                                        </div>
						                                    </div>
						                                    <div class="separator clear-left">
						                                        <p class="btn-add">
						                                            <i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm">Mua hàng</a></p>
						                                        <p class="btn-details">
						                                            <i class="fa fa-list"></i><a href="#" class="hidden-sm">Chi tiết</a></p>
						                                    </div>
						                                    <div class="clearfix">
						                                    </div>
						                                </div>
						                            </div>
					                        	</div>
					                        </div>
					                        @endfor
					                    </div>
					                </div>
					            </div>
					        </div>
				            <div class="col-xs-12">
				                <!-- Controls -->
				                <div class="controls pull-right">
				                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
				                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
				                            data-slide="next"></a>
				                </div>
				            </div> 
						</div>


						<!-- end product -->
						<div class="nn-ct-new">
							<div class="nn-ct-new-top">
								<h2>Tin Tức Nổi Bật</h2>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<img class="img-thumbnail" src="{{ asset('public/img/q1.jpg') }}" alt="Nguyễn Nam 90st">
									<h4>CÔNG TY TNHH - DV XUẤT NHẬP KHẨU LONG TRÌ</h4>
								</div>
								<div class="col-sm-6 nn-ct-new-item">
									@for($i=1;$i<=4;$i++)
									<div class="media">
									  <div class="media-left media-middle">
									    <a href="#">
									      <img class="media-object  img-thumbnail" src="{{ asset('public/img/h'.$i.'.png') }}" alt="Nguyễn Nam 90st">
									    </a>
									  </div>
									  <div class="media-body">
									    <h4 class="media-heading">Tin tức Long Trì Company</h4>
									    <i>Đây là những mẫu sản phẩm mới nhất của cty mới nhập về ... Hân hạnh được phục vụ quý khách hàng của công ty.</i>
									  </div>
									</div>
									@endfor
								</div>
							</div>
						</div>
						<h4 class="nn-bg-title">Top Sale</h4>
						<div class="nn-bg-note">
							<i>Đây là những mẫu sản phẩm mới nhất của cty mới nhập về ... Hân hạnh được phục vụ quý khách hàng của công ty.</i>
						</div>
						<div class="container">
							<div class="col-xs-12 nn-ct-sale">
								<div class="col-sm-6">
									<img class="img-responsive" src="{{ asset('public/img/q2.jpg') }}" alt="Nguyễn Nam 90st">
								</div>
								<div class="col-sm-6">
									<h3>Tên Sản Phẩm Sale</h3>
									<p><i>Đây là những mẫu sản phẩm mới nhất của cty mới nhập về ... Hân hạnh được phục vụ quý khách hàng của công ty.</i></p>								
									<div class="nn-ct-sale-info">
										<p class="nn-ct-sale-price">68.000 VND <b class="nn-under-line"> 88.000 VND</b> </p>
										<ul>
											<li class="nn-bg-day">23<span class="nn-note-sale-bottom">Ngày</span></li>
											<li class="nn-bg-day">11<span class="nn-note-sale-bottom">Giờ</span></li>
											<li class="nn-bg-day">59<span class="nn-note-sale-bottom">Phút</span></li>
											<li class="nn-bg-day">59<span class="nn-note-sale-bottom">Giây</span></li>
										</ul>
										<p class="nn-ct-sale-cart"><span class="fa fa-shopping-cart"></span> Mua hàng</p>
									</div>
								</div>
							</div>	
						</div>					

					</div>
				</div>
				<div class="container-fluid nn-bg-full-w">
					<div class="container">
						<div class="nn-bg-note">
							<i>Đây là những mẫu sản phẩm mới nhất của cty mới nhập về ... Hân hạnh được phục vụ quý khách hàng của công ty.</i>
						</div>
						<div class="row">
	                    	@for($i=1;$i<=4;$i++)
	                        <div class="col-sm-6 col-md-3">
	                        	<div class="col-xs-12">
	                        		<div class="col-item">
		                                <div class="photo">
		                                    <img src="{{ asset('public/img/h'.$i.'.png') }}" class="img-responsive" alt="a" />
		                                </div>
		                                <div class="info">
		                                    <div class="row">
		                                        <div class="price col-md-6">
		                                            <h5>
		                                                Long Trì Company</h5>
		                                            <h5 class="price-text-color">
		                                                68.000 VND</h5>
		                                        </div>
		                                        <div class="rating hidden-sm col-md-6">
		                                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
		                                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
		                                            </i><i class="fa fa-star"></i>
		                                        </div>
		                                    </div>
		                                    <div class="separator clear-left">
		                                        <p class="btn-add">
		                                            <i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm">Mua hàng</a></p>
		                                        <p class="btn-details">
		                                            <i class="fa fa-list"></i><a href="#" class="hidden-sm">Chi tiết</a></p>
		                                    </div>
		                                    <div class="clearfix">
		                                    </div>
		                                </div>
		                            </div>
	                        	</div>
	                        </div>
	                        @endfor
	                    </div>
					</div>
				</div>
				<div class="container ">
					<div class="nn-ct-footer col-xs-12 col-sm-4">
						<h4 class="nn-ct-sale-cart">Category 1</h4>
						<div class="nn-ct-ft-item">
							@for($i=1;$i<=4;$i++)
							<div class="media">
							  <div class="media-left media-middle">
							    <a href="#">
							      <img class="media-object  img-thumbnail" src="{{ asset('public/img/h'.$i.'.png') }}" alt="Nguyễn Nam 90st">
							    </a>
							  </div>
							  <div class="media-body">
							    <h4 class="media-heading">Long Trì Product</h4>
							    <p><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="fa fa-star"></i></p>
							    <b>99.000 VND</b>
							  </div>
							</div>
							@endfor
						</div>
					</div>
					<div class="nn-ct-footer col-xs-12 col-sm-4">
						<h4 class="nn-ct-sale-cart">Category 1</h4>
						<div class="nn-ct-ft-item">
							@for($i=1;$i<=4;$i++)
							<div class="media">
							  <div class="media-left media-middle">
							    <a href="#">
							      <img class="media-object  img-thumbnail" src="{{ asset('public/img/h'.$i.'.png') }}" alt="Nguyễn Nam 90st">
							    </a>
							  </div>
							  <div class="media-body">
							    <h4 class="media-heading">Long Trì Product</h4>
							    <p><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="fa fa-star"></i></p>
							    <b>99.000 VND</b>
							  </div>
							</div>
							@endfor
						</div>
					</div>
					<div class="nn-ct-footer col-xs-12 col-sm-4">
						<h4 class="nn-ct-sale-cart">Category 1</h4>
						<div class="nn-ct-ft-item">
							@for($i=1;$i<=4;$i++)
							<div class="media">
							  <div class="media-left media-middle">
							    <a href="#">
							      <img class="media-object  img-thumbnail" src="{{ asset('public/img/h'.$i.'.png') }}" alt="Nguyễn Nam 90st">
							    </a>
							  </div>
							  <div class="media-body">
							    <h4 class="media-heading">Long Trì Product</h4>
							    <p><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="fa fa-star"></i></p>
							    <b>99.000 VND</b>
							  </div>
							</div>
							@endfor
						</div>
					</div>

				</div>
			</div>
			<!-- end content body -->\
		</div>
		<!-- endbody  -->
		<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> <b> Danh Mục </b> </h3>
                    <ul>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> <b> Danh Mục </b> </h3>
                    <ul>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> <b> Danh Mục </b> </h3>
                    <ul>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> <b> Danh Mục </b> </h3>
                    <ul>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                        <li> <a href="#"> <b> Danh Mục </b> </a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> <b> Danh Mục </b> </h3>
                    <ul class="social">
                        <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-pinterest">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
                    </ul>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
    
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> Copyright © Long Trì Company </p>
            <div class="pull-right">
                <ul class="nav nav-pills payments">
                    <li><i class="fa fa-cc-visa"></i></li>
                    <li><i class="fa fa-cc-mastercard"></i></li>
                    <li><i class="fa fa-cc-amex"></i></li>
                    <li><i class="fa fa-cc-paypal"></i></li>
                </ul> 
            </div>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>

    </body>
</html>

