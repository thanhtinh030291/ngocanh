@extends('computer.home.master')
@section('title', (!empty($contact)?$contact->seo_title:""))
@section('seo_keyword', (!empty($contact)?$contact->seo_keyword:""))
@section('seo_description', (!empty($contact)?$contact->seo_description:""))
@section('seo_image', (!empty($contact)?asset($contact->seo_image):""))
@section('seo_url', url()->current())
@section('content')

 
    <!-- breadcrumb  -->
<div class="wrapper_main container">
<!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb" style="font-size: 11px;">
        <ul>
          <li>
              <a title="home" style="color: #222;">{{ trans('index.home') }}</a>
          </li>
          <li><a href=""><b class="fa fa-chevron-right"></b>
            Kho ứng dụng
          </a></li>
        </ul>
      </div> 
    <div class="col-md-9 col-xs-12" style="background-color: #fff;"> 
        <!-- Post Section /- -->
        <?php $count_s = 0; ?>
        <?php $class=(($count_s%2==0)?" section-dark ":" section-dark "); ?>                          
        <div id="category-post-section" class="section-padding {{ $class }} category-post-section owl-carousel-section">
          <!-- Section Header /- -->
          <!-- Container -->
          <div class="col-xs-12">
              <div class="nt7_product">
                @foreach($listapp as $itemlist)
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        <div class="product-item">
                          <div class="pi-img-wrapper">
                            <img src="{{ $itemlist->img}}" alt="app img">
                            <div>
                              <a href="{{ $itemlist->link }}"  target="_blank" title="{{ $itemlist->title }}" class="btn btn-lg">Tải Về</a>
                            </div>
                          </div>
                          <h3><a href="" title="{{ $itemlist->title }}">{{ $itemlist->title }}</a></h3>
                          <div class="pi-price text-center">
                           <a href="{{ $itemlist->link }}" target="_blank" class="btn btn-warning text-center" style="margin-left:25px;">Tải về ngay</a>
                          </div>

                          <div class="sticker sticker-new" style="background: url( {{ url('public/img/listproduct/'.$itemlist->tinhtrang['sttimg'])    }} ) no-repeat;">
                              
                          </div>
                        </div>
                    </div>
                @endforeach
              </div>
          </div><!-- Container /- -->
        </div>
        <?php $count_s++; ?>
        <!-- Post Section /- -->
    </div> 
      <div class="hidden-xs">
        @include('computer.home.sidebar_right')
      </div>
        
    </div>        

@endsection() 