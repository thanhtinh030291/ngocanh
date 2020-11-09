@extends('computer.home.master')
@section('title', (!empty($detail_product)?$detail_product->name:""))
@section('seo_keyword', (!empty($detail_product)?$detail_product->keywords:""))
@section('seo_description', (!empty($detail_product)?$detail_product->description:""))
@section('seo_image', (!empty($detail_product)?asset('public/img/product/'.$detail_product->image):""))
@section('seo_url', url()->current())
@section('content')

<div class="container">
  <div class="wrapper_main col-md-9"> 

    <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
          <li><a href=""><i class="fa fa-chevron-right"></i> {{ trans('index.product') }}</a></li>
        </ul>
      </div> 
    <!-- breadcrumb  -->



    <!-- detail product --> 
      <div class="">


        <!-- top_detail_product -->
        <div class="top_detail_product">  
          <!-- left_detail_product -->
          <div class="left_detail_product col-md-6">
            <div class="eagle-gallery img400" style="padding:2px;">
                <div class="owl-carousel" style="height:100px; width: 280px; ">                
                    <img src="{{ asset('public/img/product/'.$detail_product->image) }}" 
                    data-medium-img="{{ asset('public/img/product/'.$detail_product->image) }}" 
                    data-big-img="{{ asset('public/img/product/'.$detail_product->image) }}" data-title="" alt="img" width="100" height="100" style="height: 100px;  width: 100px; object-fit: cover;">
                  @foreach( $list_img_product as $item )
                    <img src="{{ asset('public/img/product/Pdetail/'.$item->image) }}" 
                    data-medium-img="{{ asset('public/img/product/Pdetail/'.$item->image) }}" 
                    data-big-img="{{ asset('public/img/product/Pdetail/'.$item->image) }}" data-title="" alt="img" width="100" height="100" style="height: 100px;width: 100px;  object-fit: cover; margin: 0; display: block;">
                  @endforeach
               </div>
            </div>  
          </div>
          <!-- left_detail_product -->

          <?php 
            $type_listproduct = $detail_product->listproduct($detail_product->idlist)->type;
          ?>

          
          <!-- right_detail_product -->
          <div class="right_detail_product col-md-6">
            <h2 class="title_detail_product">{{ $detail_product->name }}</h2>
            <p class="stt_product"><a href="{{ url('category/'.$detail_product->idlist.'?stt='.$detail_product->status) }}">{{ $detail_product->sttname}}</a></p>
            <!-- <div class="rating">
                <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                </i><i class="fa fa-star"></i>
                <a href="">(1) lượt đánh giá</a>
            </div> -->
            <div class="block_price">
              <span class="new_price"><span class="nt7_price_fix">Giá mới: </span>{{ format_curency($detail_product->price) }} </span>
              @if($detail_product->price_compare != 0)
                <span class="old_price"><span class="nt7_price_fix">Giá cũ: </span>{{ format_curency($detail_product->price_compare) }} </span>
              @endif

              @if($detail_product->vat != 0)
              <div class="show_vat">{{ trans('product.vat') }} {{ $detail_product->vat }} %</div>
              @endif
            </div>
            <button class="btn_add_cart btn btn-primary btn-xl "  idproduct="{{ $detail_product->idproduct }}" base_url="{{ url("") }}" token="{{ csrf_token() }}" ><i class="fa fa-shopping-cart"></i> {{ trans('index.add_cart') }}</button>
            <div class="block_description"><?php echo $detail_product->description ?></div>
            <div class="block_share">
              <a class="google share_link_gg" href="{{url()->current()}}"><i class="fa fa-google"></i> Google</a>
              <a class="facebook share_link_fb" href="{{url()->current()}}"><i class="fa fa-facebook"></i> Facebook</a>
            </div>
          </div>
          <!-- right_detail_product -->

        </div>
        <!-- top_detail_product -->


        <!-- bottom_detail_product -->
        <div class="bottom_detail_product">
          <div class="tab_detail_product">

            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#description_tab" aria-controls="home" role="tab" data-toggle="tab">{{ trans('product.description') }}</a></li>
              <li role="presentation"><a href="#review_tab" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('product.review') }}</a></li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="description_tab">              
                    {!! $detail_product->content !!}
                    <div class="clearfix">
                      
                    </div>
                  <div style="padding-top: 5px; text-align: center;">
                    <button class="btn_add_cart btn btn-primary btn-xl"  idproduct="{{ $detail_product->idproduct }}" base_url="{{ url("") }}" token="{{ csrf_token() }}" ><i class="fa fa-shopping-cart"></i> Đặt Hàng Ngay</button>
                  </div>                
                </div>
              <div role="tabpanel" class="tab-pane" id="review_tab">
                  <div class="fb-comments" data-href="{{ Request::fullUrl() }}" data-width="100%" data-numposts="5"></div>
              </div>
            </div>
            <div class="col-md-12">
              @if($detail_product->link_video !="")
                <iframe class="videos" width="100%" height="100%" src="{{$detail_product->link_video}}" frameborder="0" allowfullscreen></iframe>
              @endif
            </div>
          </div>
        </div>
        <!-- bottom_detail_product -->


      </div> 
    <!-- detail product --> 

    <!-- product sale -->
    <?php $listproducts_bottom = $related_product; ?> 
    @include('computer.home.slide_product_bottom')
    <!-- end product sale -->
 
  </div>
        @include('computer.home.sidebar_right')
  
</div>
@endsection() 