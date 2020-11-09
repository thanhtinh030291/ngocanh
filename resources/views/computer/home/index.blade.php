@extends('computer.home.master')
@section('title', (!empty($contact)?$contact->seo_title:""))
@section('seo_keyword', (!empty($contact)?$contact->seo_keyword:""))
@section('seo_description', (!empty($contact)?$contact->seo_description:""))
@section('seo_image', (!empty($contact)?asset($contact->seo_image):""))
@section('seo_url', url()->current())
@section('content')

    <!-- Slider Section -->
    @if (Request::is('/'))
    @include('computer.home.slide-menu-home')
    @endif
    <!-- Slider Section /- -->

    <!-- Latest Updates -->
    <div class="container hidden-xs">
        <div class="latest-update col-md-2 no-padding">
            <h3>Latest Updates</h3>
        </div>
        <div class="col-md-10 latest-post-list no-padding">
            <div class="marquee"> 
                @foreach($news_new as $item)
                <a href="{{ url('tin-tuc/'.$item->slug) }}">
                    <img src="{{ asset('public/img/news/'.$item->newimg) }}" alt="latest-post-marquee"> 
                    {{ $item->newsname }}
                </a>
                @endforeach  
            </div>
        </div>
    </div>
    <!-- Latest Updates /- -->
    <!-- slide -->
    @if (Request::is('/'))
        <div class="visible-xs" style="margin-left: 5px; margin-right: 5px; margin-top: 65px;">
            <!-- slider1-container -->
            <div id='coin-slider-home'>
                @foreach($slides as $row)
                  <a href="{{$row->linknew}}" target="_blank">
                    <img src='{{url('public/img/slide/'.$row->img)}}'>
                    
                  </a>
                @endforeach                  
            </div>
        </div>
    @endif
<!-- end slide -->
<div class="container nopadding">
    <div class="col-md-9"> 
        <!-- Post Section /- -->
        <?php $count_s = 0; ?>
        @foreach($modproducts as $key => $itemmod)
        <?php $class=(($count_s%2==0)?" section-dark ":" section-dark "); ?>                          
        <div id="category-post-section" class="section-padding {{ $class }} category-post-section owl-carousel-section">
            <!-- Section Header -->

            <?php 
                $check = false;
                foreach($itemmod->listproducts as $itemlist){
                        foreach($itemlist->products as $itemproduct) {
                            if($itemproduct->count() >0){
                                $check = true;
                            } else {
                                $check = false;
                            }
                        }
                        
                    }
            ?>

            @if($check)
            <div class="nt7-tabs">
                <a class="root" href="{{ url('/loai-san-pham'.'/'.$itemmod->slug) }}" title="{{ $itemmod->modname }}">{{ $itemmod->modname }}</a> 
                <?php $c =0; ?>
                    @foreach($itemmod->listproducts as $itemlist)
                    <?php $c = $c +1; ?>
                    @if($c <6)
                       <a class="sub hidden-xs hidden-sm" href="{{ url('/loai-san-pham'.'/'.$itemlist->slug) }}" title="{{  $itemlist->listname }}">{{  $itemlist->listname }}</a>
                    @endif
                    @endforeach
                    @if($c >6)
                    <a class="all" href="{{ url('/loai-san-pham'.'/'.$itemmod->slug) }}" title="">Xem tất cả <i class="glyphicon glyphicon-menu-right"></i></a>
                   
                @endif
                  <div class="clearfix">   
                </div>

            </div>
            @endif
            <!-- Section Header /- -->
            <!-- Container -->
            <div class="col-xs-12">
                <div class="nt7_product">
                    @foreach($itemmod->listproducts as $itemlist)
                        <?php $count = 0; ?>
                        @foreach($itemlist->products as $itemproduct) 
                            <!-- col-md-4 -->
                            @if($count < 8)
                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" style="padding-right:3px; padding-left: 3px;">
                                <div class="product-item">
                                  <div class="pi-img-wrapper">
                                    <img src="{{ asset('public/img/product/'.$itemproduct->image) }}" alt="Berry Lace Dress">
                                    <div>
                                      <a href="{{ url('san-pham/'.$itemproduct->slug) }}" class="btn">Xem</a>
                                      <a href="{{ url('san-pham/'.$itemproduct->slug) }}" class="btn share_link_fb"><span class="fa fa-share-alt"></span></a>
                                    </div>
                                  </div>
                                  <h3><a href="{{ url('san-pham/'.$itemproduct->slug) }}">{{ $itemproduct->name }}</a></h3>
                                  <div class="pi-price">
                                        @if($itemproduct->price != 0)
                                        <span>{{ format_curency($itemproduct->price) }}</span>
                                        @else
                                        <span>{{ trans("index.contact") }}</span>
                                        @endif
                                    </div>
                                        @if($itemproduct->price != 0 && !empty($itemproduct->price))
                                            <button class="btn add2cart btn_add_cart"  idproduct="{{ $itemproduct->idproduct }}" base_url="{{ url("") }}" token="{{ csrf_token() }}"><i class="fa fa-cart-plus fa-1x"><span class="hidden-xs"> Mua</span></i></button>
                                        @endif
                                  <div class="sticker sticker-new" style="background: url( {{ url('public/img/listproduct/'.$itemproduct->tinhtrang['sttimg'])    }} ) no-repeat;">
                                      
                                  </div>
                                </div>
                            </div> 
                            @endif
                        <?php $count++;?>
                        @endforeach
                    @endforeach
                    @if($check)
                        <div class="page_bottom" style="padding-top: 5px;">
                        </div>
                    @endif
                </div>
            </div><!-- Container /- -->
        </div>
        <?php $count_s++; ?>
        @endforeach
        <!-- Post Section /- -->

    </div> 
        @include('computer.home.sidebar_right')
    </div>    
        <!-- Political & World Over  -->
        <div id="political-world-section" class="section-padding political-world-section owl-carousel-section">
            <!-- Section Header -->
            <div class="section-header">
                <h2 style="color: #05a3e5"></h2>
            </div>
            <!-- Section Header /- -->
            
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <div id="political-world" class="owl-carousel owl-theme">

                        @foreach($news_new as $item)
                        <div class="item">
                            <div class="col-md-12">
                                <div class="post-box">
                                    <div class="image-box" style="background-image:url({{ asset('public/img/news/'.$item->newimg) }}); " ></div> 
                                    <ul class="comments-social">
                                        <li><a href="{{ url('tin-tuc/'.$item->slug) }}" class="btn_share_fb btn_top_link" ><i class="fa fa-share-alt fa-1x"></i></a></li>
                                        <li><a href="{{ url('tin-tuc/'.$item->slug) }}" class="btn_share_fb btn_top_link" ><i class="fa fa-plus fa-1x"></i></a></li>
                                    </ul>
                                    <div class="post-box-inner">
                                        <a href="{{ url('tin-tuc/'.$item->slug) }}" class="box-read-more"><i class="fa fa-arrow-right"></i> Xem thêm</a>
                                        <div class="box-content">
                                            <a href="{{ url('tin-tuc/'.$item->slug) }}" class="block-title">{{ $item->newsname }}</a>
                                            <p class="time"><i class="fa fa-clock-o"></i> {{ $item->created_at }}</p>
                                            <p>{{ $item->newintro }}</p>
                                            <!-- <a href="#"><i class="fa fa-heart"></i> 8</a>
                                            <a href="#"><img src="images/icon/comment-icon.png" alt="comment" /> 13</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div><!-- container /- -->
        </div><!-- Political & World Over  -->    
        <script type="text/javascript">
              $(document).ready(function() {
                var w  = screen.width;
                $('#coin-slider-home').coinslider({ width: w-10 ,height: 200, navigation: true,showNavigationButtons: false, delay: 2000 });
              });
            </script>

@endsection() 