@extends('computer.home.master')
@section('title', (!empty($detail_cat)?$detail_cat->trname:""))
@section('seo_keyword', (!empty($detail_cat)?$detail_cat->trname:""))
@section('seo_description', (!empty($detail_cat)?$detail_cat->description:"")) 
@section('seo_image', (!empty($detail_cat->modimg))?asset($detail_cat->modimg): ((!empty($detail_cat->listimg))?asset($detail_cat->listimg):"" ) )
@section('seo_url', url()->current())
@section('content')

<div class="wrapper_main container">

    <!-- quang cáo --> 

    <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
          <li><a href=""><b class="fa fa-chevron-right"></b>{{ $detail_cat->trname }}</a></li>
        </ul>
      </div> 
    <!-- breadcrumb  -->



    <!-- detail category --> 
      <div class="row">

        <!-- content -->
        <div class="col-md-9">

          <div id="category-post-section" class="category-post-section">
          @foreach($list_product_cat as $itemproduct)
          <!-- products list -->
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
            <!-- products list -->
          @endforeach
          </div>

          <!-- pagination -->
          <div class="page_bottom">
            {!! $list_product_cat->render() !!} 
            <!-- <p class="info">{{ trans('category.pagination_show') }} 20 {{ trans('category.pagination_of') }} 300 {{ trans('category.pagination_product') }}</p> -->
          </div>
          <!-- pagination -->


        </div>
        <!-- content -->

        <!-- sidebar -->
        @include('computer.home.sidebar_right')
        <!-- sidebar -->

      </div> 
    <!-- detail category -->
 
</div>
@endsection() 