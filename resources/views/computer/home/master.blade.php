<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 


    <title>@yield('title')</title> 
    <meta itemprop="name" content="@yield('title')" />
    <meta name="keywords" content="@yield('seo_keyword')">
    <meta name="description" content="@yield('seo_description')">
    <meta name="generator" content="nt7solution.com">

    <meta property="fb:app_id" content="{{ (!empty($contact)?$contact->fb_app_id:"") }}" /> 
    <meta property="og:type" content="article" /> 
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:image" content="@yield('seo_image')" >
    <meta property="og:description" content="@yield('seo_description')" >
    <meta property="og:url" content="@yield('seo_url')" />
    <meta property="og:site_name" content="{{ (!empty($contact)?$contact->seo_title:"") }}" />

    <link href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/bootstrap/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/header.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/index.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('public/css/home/footer.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('public/css/home/product.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/setting.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/detail_product.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/category.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/news.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/cart.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/checkout.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/login.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/giaohang.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/thanhtoan.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/user.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/search.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/shop-homepage.css') }}" rel="stylesheet">

    <link href="{{ asset('public/css/home/page.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/giahung.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/components.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/home/media.css') }}" rel="stylesheet">
    
    <link href="{{ asset('public/plugin/jquery.bxslider/jquery.bxslider.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugin/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugin/slick/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugin/eagle/eagle.gallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugin/bootstrap.slider/less/bootstrap-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugin/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugin/datepicker_wrapper/jquery.mobile.datepicker.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugin/datepicker_wrapper/jquery.mobile.datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugin/datepicker_wrapper/theme-template.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugin/flexslider/flexslider.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugin/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugin/owl-carousel/owl.theme.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/slide/css/coin-slider-styles.css') }}" rel="stylesheet"> 


    <!--<script src="{{ asset('public/bootstrap/js/jquery.js') }}"></script>-->
    <script src="{{ asset('public/js/home/jquery.min.js') }}"></script>
    <script src="{{ asset('public/bootstrap/js/bootstrap.min.js') }}"></script>  
    <script src="{{ asset('public/plugin/jquery.bxslider/jquery.bxslider.js') }}"></script>  
    <script src="{{ asset('public/plugin/slick/slick.js') }}"></script>  
    <script src="{{ asset('public/js/home/jquery.film_roll.js') }}"></script>  
    <script src="{{ asset('public/js/home/jquery.touchSwipe.js') }}"></script>   
    <script src="{{ asset('public/plugin/eagle/eagle.gallery.min.js') }}"></script>   
    <script src="{{ asset('public/plugin/bootstrap.slider/js/bootstrap-slider.js') }}"></script>  
    <script src="{{ asset('public/plugin/datepicker_wrapper/jquery.mobile.datepicker.js') }}"></script>  
    <script src="{{ asset('public/plugin/datepicker_wrapper/external/jquery-ui/datepicker.js') }}"></script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="{{ asset('public/plugin/scrollreveal/scrollreveal.js') }}"></script>  
    <script src="{{ asset('public/plugin/magnific-popup/jquery.magnific-popup.js') }}"></script> 
    <script src="{{ asset('public/plugin/imagesloaded.pkgd.min.js') }}"></script> 
    <script src="{{ asset('public/plugin/masonry.pkgd.min.js') }}"></script> 
    <script src="{{ asset('public/plugin/flexslider/jquery.flexslider-min.js') }}"></script> 
    <script src="{{ asset('public/plugin/page/wow.min.js') }}"></script> 
    <script src="{{ asset('public/plugin/page/jquery.marquee.js') }}"></script> 
    <script src="{{ asset('public/plugin/page/jssor.js') }}"></script> 
    <script src="{{ asset('public/plugin/page/jssor.slider.js') }}"></script> 
    <script src="{{ asset('public/plugin/owl-carousel/owl.carousel.min.js') }}"></script> 

    <script src="{{ asset('public/plugin/page/modernizr.custom.js') }}"></script> 
    <script src="{{ asset('public/plugin/page/classie.js') }}"></script> 
    <script src="{{ asset('public/plugin/page/uisearch.js') }}"></script> 

    <script src="{{ asset('public/js/home/main.js') }}"></script>  
    <script src="{{ asset('public/js/home/page.js') }}"></script>  

    <script src="{{ asset('public/slide/js/coin-slider.js') }}"></script>   
    
</head>
<b></b>
<body id="page-top">
 

    {!! (!empty($contact)?$contact->google_analyst:"") !!}


    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId={{ (!empty($contact)?$contact->fb_app_id:"") }}";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


    <!-- Header Section -->
    <header id="header" class="header">
        <!-- top-header -->
        <div class="top-header  hidden-xs">
            <!-- container -->
            <div class="container">
                <div class="row">
                    <div class="top-menu col-md-9 col-sm-9">
                        <nav class="navbar navbar-default">                     
                            <div class="navbar-header">
                                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar2" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse" id="navbar2">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{ url('contact') }}" style="font-weight: 0; font-size: 13px; color: #fff; text-transform: uppercase;">{{ $contact->time." - ".$contact->nameco }}</a></li>
                                    
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <ul class="top-social col-md-3 col-sm-3">
                      @foreach($languages as $item)
                      <?php $active = (Session::get("idlocale") == $item->id)?" active ":"" ?>
                      <li class="{{ $active }}"><a href="{{ url('setlocale/'.$item->id) }}"><img src="{{ asset('public/img/lang/'.$item->img) }}"></a></li>
                      @endforeach
                    </ul>
                </div>
            </div><!-- container /- -->
        </div><!-- top-header /- -->
        
        <!-- logo-add-block -->
        <div class="logo-add-block   hidden-xs" style="background-color: #fff;">
            <!-- container -->
            <div class="container">
                <div class="row">
                    <div class="col-md-3 logo-block col-sm-3">
                        <a href="{{ url("") }}"><img src="{{ asset('public/img/logo.png') }}" alt="no logo"></a>                        
                    </div>
                    <div class="col-md-6 col-sm-6 nt7-padding-top">
                        <form action="{{ url('/search') }}"> 
                            <div class="form-group has-deflaut has-feedback">
                              <input type="text" class="form-control" id="inputSuccess2" name="key" aria-describedby="inputSuccess2Status" placeholder="Nhập từ khóa để tìm kiếm sản phẩm, hướng dẫn kỹ thuật, tin tức..." style="border: 1px solid #1d769c;">
                              <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
                              <label class="control-label" for="inputSuccess2" style="color:#de3737;">Mỹ Phẩm thiên nhiên , trị mụn...</label>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3 add-block col-sm-2 nt7-padding-top">
                        <span class="nt7_font_title hidden-sm" style="margin-right: 10px;"><a href="{{ url('login') }}">TÀI KHOẢN <i class="fa fa-user"></i></a></span>
                        <span class="nt7_font_title hidden-md hidden-lg" style="margin-right: 10px;"><a href="{{ url('login') }}"><i class="fa fa-user"></i></a></span>

                        <span class="nt7_font_title hidden-sm"><a href="{{ url('cart') }}">GIỎ HÀNG <i class="fa fa-shopping-cart"> <span class="label label-danger">{{ Cart::count() }}</span> </i></a></span>
                        <span class="nt7_font_title hidden-md hidden-lg"><a href="{{ url('cart') }}"><i class="fa fa-shopping-cart"> <span class="label label-danger">{{ Cart::count() }}</span> </i></a></span>
                        
                    </div>
                </div>
            </div><!-- container /- -->
        </div><!-- logo-add-block /- -->
        
        <!-- menu-block -->
        <div class="menu-block navbar-fixed-top hidden-xs  @if( !Request::is('/')) notindex @endif">
            <!-- container -->
            <div class="container">
                <div class="row">

                    <div class="col-md-3 search-follow ow-right-padding" style="padding-left: 0px;">
                        <a href="" class="follow hidden-xs"><i class="fa fa-phone-square"></i> 0123.456.789</a>
                        <a class="follow visible-xs text-justify" href="{{ url("") }}"><img src="{{ asset('public/img/logoNT7solution.png') }}" alt="NT7Solution" height="60"></a> 
                        <div id="sb-search" class="sb-search">
                            <form action="{{ url('/search') }}">
                                <input class="sb-search-input" placeholder="{{ trans('index.search') }}..." type="text" value="" name="key" id="key">
                                <button class="sb-search-submit"><i class="fa fa-search"></i></button>
                                <span class="sb-icon-search"></span>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <nav class="navbar navbar-default">                     
                            <div class="navbar-header">
                                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a href=""><img src="{{ asset('public/img/logoNT7solution-mobile.png') }}" class="logo_mobile" alt="NT7Solution"></a>
                            </div>
                            <div class="row">
                                <div class="col-md-3 hidden-xs hidden-sm text-center">                                
                                    <div class="navbar-collapse " id="cat">
                                        <ul class="nav navbar-nav" style="width: 100%; padding: 0px;">
                                            <li class="dropdown mega-dropdown wrapper_content_listnews" id="home-cate" style="width: 100%; padding: 0px;"> 
                                                <a href="{{url('/')}}" class="dropdown-toggle" style="width: 100%; padding: 14px;" ><i class="fa fa-home"></i> DANH MỤC SẢN PHẨM <i class="caret" style="font-weight: bold;"></i></a>
                                                
                                                <ul class="hidden-xs dropdown-menu mega-dropdown-menu" style="padding:0; margin-left:15px; margin-right:-15px; border: none;" >
                                                    <li class="col-sm-12" style="padding:0; margin: 0; border: none;">
                                                        <ul class="root-menu root-menu-notindex">
                                                           @foreach($modproducts as $key => $itemmod)  
                                                            <li>
                                                                <a class="parent" href="{{ url('loai-san-pham/'.$itemmod->slug) }}">
                                                                    <img class="icon-menu" alt="Funky roots" src="{{url('/'.$itemmod->modimg)}}" style="margin-top: -5px;" width="25" height="25"> {{ $itemmod->modname }}</a>
                                                                <div class="sub-box-menu col-md-12">
                                                                    <ul class="sub-menu">
                                                                        @foreach($itemmod->listproducts as $itemlist)
                                                                            <li><a href="{{ url('loai-san-pham/'.$itemlist->slug) }}">{{ $itemlist->listname }}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                </ul>
                                                
                                            </li>  
                                        </ul>
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-md-9 nopadding">
                                    <div class="navbar-collapse collapse hidden-xs" id="navbar">
                                        <ul class="nav navbar-nav hidden-xs">                                         
                                             @foreach($modproducts as $key => $itemmod)                          
                                                <li class="dropdown mega-dropdown wrapper_content_listnews hidden-md hidden-lg ">
                                                    <a href="{{ url('loai-san-pham').'/'.$itemmod->slug }}" class="dropdown-toggle" >{{ $itemmod->modname }} </a>
                                                    <ul class="hidden-xs hidden-sm dropdown-menu mega-dropdown-menu">
                                                        <li class="col-sm-4">
                                                            <ul>
                                                                @foreach($itemmod->listproducts as $itemlist)
                                                                <li class="listnews" for_list="content_listnews_{{ $itemlist->id }}" >
                                                                    <a href="{{ url('loai-san-pham').'/'.$itemlist->slug }}">{{ $itemlist->listname }}</a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li> 
                                                @endforeach
                                                
                                            @foreach($modnews as $key => $itemmod)                           
                                                <li class="dropdown hidden-xs">
                                                <?php $c =   0; ?>
                                                  @foreach($itemmod->listnews as $itemlist)
                                                    <?php $c =   $itemlist->count(); ?>
                                                  @endforeach
                                                  <a href="{{ url('loai-tin').'/'.$itemmod->slug }}" class="dropdown-toggle" >{{ $itemmod->modname }}@if($c>0) <b class="hidden-xs hidden-sm caret"></b> @endif</a>
                                                  
                                                  @if($c>0)
                                                    <ul class="hidden-xs hidden-sm dropdown-menu" style="min-width:  250%;">
                                                    @foreach($itemmod->listnews as $itemlist) 

                                                        <li class="mega-dropdown-menu-new">
                                                             <a href="{{ url('loai-tin').'/'.$itemlist->slug }}">  {{ $itemlist->listname }} </a>
                                                        </li>   
                                                    @endforeach                               
                                                    </ul>
                                                @endif
                                                </li>
                                            @endforeach  
                                            <li class="dropdown mega-dropdown hidden-xs hidden-sm ">
                                                 <a href="{{ url('/kho-ung-dung') }}" class="dropdown-toggle" style="text-transform: uppercase;">Kho ứng dụng </a>
                                            </li>                                          
                                            <li class="dropdown mega-dropdown hidden-xs hidden-sm ">
                                                 <a href="{{ url('/contact') }}" class="dropdown-toggle" style="text-transform: uppercase;">Liên Hệ </a>
                                            </li>
                                        </ul>
                                    </div><!-- .nav-collapse /- -->
                                </div>
                            </div>
                        </nav> <!-- nav /- -->
                    </div>
                </div>
            </div><!-- container /- -->
        </div><!-- menu-block /- -->
        {{-- menu mobile --}}        
        <div class="menu-block-nofix visible-xs">
            <!-- container -->
            <div class="container">                
                <div class="row">
                    <div class="col-xs-12">
                        <a  href="{{ url("") }}"><img src="{{ asset('public/img/logoNT7solution.png') }}" alt="NT7Solution" height="40" style="margin-left: 35%;"></a> 
                    </div>
                </div>
            </div><!-- container /- -->
        </div><!-- menu-block /- -->
        <div class="search-mobile visible-xs" style="margin-top: -20px; margin-left: 10px;">
             <div>
                <form action="{{ url('/search') }}">
                    <div class="col-xs-10 " style="padding-right: 0px;" >
                      <input type="text" class="form-control" id="inputSuccess2" name="key" aria-describedby="inputSuccess2Status" placeholder="Nhập từ khóa để tìm kiếm sản phẩm, hướng dẫn kỹ thuật, tin tức..." style="border: 1px solid #1d769c; border-radius: 0; ">                     
                    </div>
                    <div class="col-xs-1" style="padding-left:  0px; padding-right: 15px;">
                        <button type="submit" class="btn btn-info" style=" border-radius: 0;"> <b class="glyphicon glyphicon-search"></b></button>
                    </div>
                </form>
            </div>
        </div>

    </header>
    <!-- Header Section /- --> 

    @yield('content')

    <!-- Footer Section -->
    <div id="footer-section" class="footer-section">
        <!-- container -->
        <div class="container">
            <!-- col-md-4 -->
            <div class="col-md-4">
                <aside class="widget widget_social_icons">
                    <h3 class="widget-title">Kết nối</h3>
                    <ul>
                        @foreach($socials as $item)
                            <li class="item_social"><a href="{{ $item->link }}"><i class="fa {{ $item->icon }}"></i></a></li> 
                        @endforeach
                    </ul>
                </aside> 
                <aside class="widget widget_about_us">
                  <div class="fb-page" data-href="{{ $contact->fanpage }}" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="{{ $contact->fanpage }}" class="fb-xfbml-parse-ignore"><a href="{{ $contact->fanpage }}">{{ $contact->nameco }}</a>
                    </blockquote>
                  </div> 
                <aside>

            </div><!-- col-md-4 /- -->
            <!-- col-md-4 -->
            <div class="col-md-4">
                <aside class="widget widget_latest_post">
                    <h3 class="widget-title">Bài mới đăng</h3>
                    <ul class="post">
                        <?php $count=0; ?>
                        @foreach($news_footer as $item)
                        @if($count < 4)
                        <li>
                            <div class="col-md-3 col-sm-2 col-xs-2">
                                <a href="{{ url('tin-tuc/'.$item->slug) }}"><img src="{{ asset('public/img/news/'.$item->newimg) }}" alt="popular-post"></a>
                            </div>
                            <div class="col-md-9 col-sm-10 col-xs-10">
                                <a href="{{ url('tin-tuc/'.$item->slug) }}" class="post-title">{{ $item->newsname }}</a>
                                <!-- <p class="intro">{{ $item->newintro }}</p> -->
                            </div>
                        </li> 
                        @endif
                        <?php $count++; ?>
                        @endforeach
                    </ul>
                </aside>
            </div><!-- col-md-4 /- -->
            
            <!-- col-md-4 -->
            <div class="col-md-4"> 
                <aside class="widget widget_about_us">
                    <h3 class="widget-title">Giới thiệu</h3>

                    <div class="footerp"> 
                    <h2 class="title-median">{{ $contact->nameco }}</h2>
                    <p><b><i class="fa fa-envelope"></i> Email: </b><a href="{{ $contact->mail }}">{{ $contact->mail }}</a></p>
                    <p><b><i class="fa fa-clock-o"></i> Time: </b>{{ $contact->time }}</p>
                    <p><b><i class="fa fa-phone"></i> Phone: </b>{{ $contact->phone }}</p>
                    </div>
                </aside>
                
            </div><!-- col-md-4 /- -->
        </div><!-- container /- -->
        <!-- Footer Bootom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="col-md-6 col-sm-6">
                    <p>© 2017 techvn All Rights Reserved. </p>
                </div>
                <div class="col-md-6 col-sm-6">
                    <nav class="navbar navbar-default">                     
                        <div class="navbar-header">
                            <button aria-controls="navbar" aria-expanded="false" data-target="#footer-menu" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                    </nav>
                </div>
            </div>
        </div><!-- Footer Bootom /- -->
    </div>
    <!-- Footer Section /- -->
 


    <!-- back-top -->
    <!-- <div id="back-top" style="display: block;">
        <a href="#" class="mypresta_scrollup hidden-phone bg_hbh">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div> -->
    <!-- back-top -->


    <!-- setting -->
    <div class="wrapper_setting hidden-xs">
        <div class="button_show_setting"><i class="fa fa-cogs"></i></div>
        <h2>{{ trans('index.setting') }}</h2>
        <div class="content_box_setting">
            <div class="filter_main">
                  <p class="title_item_setting">{{ trans('category.field_product') }}</p>
                <div class="filter_list_product">
                  <?php $count=0; ?>
                  @foreach($modproducts as $item_mod)
                  @if( $count<15)
                      @foreach($item_mod->listproducts as $item_list)
                        @if($count%3 == 0)
                        <!--<div class="row">-->
                        @endif
                          <div class="col-xs-6 col-md-4" style=" padding: 1px;"> 
                            <div class="item_filter_list_product">
                                <a href="{{ url('loai-san-pham').'/'.$item_list->slug }}"  data-toggle="tooltip" title="{{ $item_list->trname }}" >
                                @if($item_list->listimg !='no-img.png')
                                    <img class="img-responsive" src="{{ asset($item_list->listimg) }}" alt="{{ $item_list->trname }}">
                                @else
                                  <img class="img-circle" src="{{ asset('public/img/product/no-img.png') }}" alt="img">
                                @endif
                                </a>
                            </div>
                            <h3 style="display:none"><a href="{{ url('loai-san-pham').'/'.$item_list->slug }}">{{ $item_list->trname }}</a></h3>
                          </div>
                        @if($count%3 == 0)
                        <!--</div>-->
                        @endif
                      <?php $count++; ?>
                      @endforeach
                    @endif
                  @endforeach
                </div>

            </div>
        </div>
    </div> 

    <!-- menu -->
    <div class="wrapper_menu visible-xs">   
        <div class="button_show_menu" style="color: #fff; margin-left: 0px; z-index: 222222222;"><i class="glyphicon glyphicon-th-list"></i></div>
            <div class="nav-side-menu"> 
                <div class="brand"> TechVN 
                    <span class="nt7_font_title hidden-md hidden-lg pull-right" style="margin-right: 10px; color: #fff;"><a href="{{ url('cart') }}"><i class="fa fa-shopping-cart" style="color: #fff;"> <span class="label label-danger">{{ Cart::count() }}</span> </i></a></span>
                </div>    
                <div class="menu-list">          
                    <ul id="menu-content" class="menu-content ">
                        <li>
                          <a href="{{url('')}}" style="color: #1d769c; font-weight: 700;"><i class="fa fa-home fa-lg"></i> Trang chủ</a>
                        </li>
                        @foreach($modproducts as $key => $itemmod)
                            <?php $count =0; ?>
                            @foreach($itemmod->listproducts as $itemlist)
                                <?php $count = $itemlist->count(); ?>
                            @endforeach
                        <li  data-toggle="collapse" data-target="#{{ $itemmod->slug }}" class="collapsed">
                          <a href="{{ url('loai-san-pham/'.$itemmod->slug) }}"> 
                            <img src="{{url('/'.$itemmod->modimg)}}" alt="icon" style="margin-top: -5px; margin-left: 8px;" width="20" height="20"> 
                            {{ $itemmod->modname }} 
                            </a>
                            @if($count >0) 
                            <span class="fa fa-chevron-down pull-right" style="margin-top: 10px; margin-right:15px; font-size: 15px; color: #e84d1c;"></span> @endif 
                        </li>
                            <ul class="sub-menu collapse" id="{{ $itemmod->slug }}">
                            @foreach($itemmod->listproducts as $itemlist)
                                <li ><a href="{{ url('loai-san-pham/'.$itemlist->slug) }}">{{$itemlist->listname}}</a></li>
                            @endforeach
                            </ul>                        
                        @endforeach  
                        {{-- danh muc tin tuc  --}}
                        @foreach($modnews as $key => $itemmod)
                            <?php $count =0; ?>
                            @foreach($itemmod->listnews as $itemlist)
                                <?php $count = $itemlist->count(); ?>
                            @endforeach
                        <li  data-toggle="collapse" data-target="#{{ $itemmod->slug }}" class="collapsed">
                          <a href="{{ url('loai-tin/'.$itemmod->slug) }}"> 
                          <img src="{{url('/'.$itemmod->modimg)}}" alt="icon" style="margin-top: -5px; margin-left: 8px;" width="20" height="20"> {{ $itemmod->modname }} </a> @if($count >0) <span class="fa fa-chevron-down pull-right" style="margin-top: 10px; margin-right:15px; font-size: 15px; color: #e84d1c;"></span> @endif
                        </li>
                            <ul class="sub-menu collapse" id="{{ $itemmod->slug }}">
                            @foreach($itemmod->listnews as $itemlist)
                                <li ><a href="{{ url('loai-tin/'.$itemlist->slug) }}">{{$itemlist->listname}}</a></li>
                            @endforeach
                            </ul>                        
                        @endforeach  
                        <li >
                         <b class="fa fa-th-large" style="padding-left: 15px;"></b><a href="{{ url('/kho-ung-dung') }}" class="dropdown-toggle" style="text-transform: uppercase;">Kho ứng dụng </a>
                        </li>
                        {{-- end danh muc tin tuc   --}}
                    </ul>
                </div>
        </div>
            
    </div> 
    <!-- end menu left -->

    <!-- popup -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modal_main">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modal_main_title">Modal title</h4>
          </div>
          <div class="modal-body" id="modal_main_content"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn_normal" data-dismiss="modal">{{ trans('index.close') }}</button>
          </div>
        </div>
      </div>
    </div><!-- /.modal -->
    <!-- end popup -->

<!-- chat fb -->

  {{-- <div id="cfacebook">
      <a href="javascript:;" class="chat_fb" onclick="return:false;"><i class="fa fa-facebook-square"></i> {{ trans('index.title_comment_fb')}}</a>
      <div class="fchat">
        <div class="fb-page" data-tabs="messages" data-href="{{ $contact->fanpage }}" data-width="270" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
      </div>
  </div> --}}

<!-- chat fb -->
{{-- phone --}}
<div class="phonenow visible-xs">
    <a class="btn-call-now" href="tel:0123.456.789" onclick="_gaq.push(['_trackEvent', 'Contact', 'Call Now Button', 'Phone']);">
    <img src="http://giahungtech.vn/public/img/phonenow.png"> 0123.456.789</a>
</div>
{{-- end phone --}}
<style type="text/css" media="screen">
    #myBtn {
        display: none; 
        position: fixed; 
        bottom: 20px; 
        left: 30px; 
        z-index: 99; 
        border: none; 
        outline: none;
        color: #fff; 
        cursor: pointer; 
        padding: 5px; 
        border-radius: 5px;
        background-color: #e84d1c;
    }
        @media (max-width: 768px){
            #myBtn {
                left: 5px; 
                bottom: 50px; 
            }
        
        }
    #myBtn:hover {
        color: #555; /* Add a dark-grey background on hover */
    }
</style>
<script>
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
       if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
           document.getElementById("myBtn").style.display = "block";
       } else {
           document.getElementById("myBtn").style.display = "none";
        }
    }

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Chrome, Safari and Opera 
    document.documentElement.scrollTop = 0; // For IE and Firefox
}
</script>
 <button onclick="topFunction()" id="myBtn" title="Về đầu trang"><b class="fa fa-arrow-up"></b></button>
<div class="hidden-xs">
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/59883393dbb01a218b4db159/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })
();
</script>
<!--End of Tawk.to Script-->
</div>
</body>

</html>
