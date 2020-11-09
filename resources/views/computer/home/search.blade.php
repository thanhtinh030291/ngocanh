@extends('computer.home.master')
@section('title','Trang chủ')
@section('content')

<div class="wrapper_main container">


    <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
          <li><a href=""><i class="fa fa-chevron-right"></i> {{ trans('index.search') }}</a></li>
        </ul>
      </div> 
    <!-- breadcrumb  -->



    <!-- detail category --> 
      <div class="row">

        <!-- content -->
        <div class="col-md-9">

          <!-- block_des_category -->
          <div class="block_des_category"> 
            <h1>Kết Quả {{ trans('index.search') }} "{{ $key}}"</h1>
          </div>
          <!-- block_des_category -->

           <!--  
          <div class="block_sort_category">
            <div align="right">
              <label>{{ trans('category.orderby') }} </label>
              @if($path_type == "category")
                <select id="select_productstt" base_url="{{ url('') }}" path_type="{{ $path_type }}" path_id="{{ $path_id }}" >
                  <option value="">---</option>
                  @foreach($productstt as $item)
                  <option value="{{ $item->id }}">{{ $item->sttname }}</option>
                  @endforeach
                </select>
              @elseif($path_type == "filter")
                <select id="select_productstt" base_url="{{ url('') }}" path_type="{{ $path_type }}" color="{{ $color }}" range="{{ $range }}" >
                  <option value="">---</option>
                  @foreach($productstt as $item)
                  <option value="{{ $item->id }}">{{ $item->sttname }}</option>
                  @endforeach
                </select>
              @elseif($path_type == "search")
                <select id="select_productstt" base_url="{{ url('') }}" path_type="{{ $path_type }}" key="{{ $key }}" >
                  <option value="">---</option>
                  @foreach($productstt as $item)
                  <option value="{{ $item->id }}">{{ $item->sttname }}</option>
                  @endforeach
                </select>
              @endif
            </div>
          </div>
            -->

          <!-- block_product_category -->
          <div class="block_product_category">
            <h3>{{ trans('index.product') }}</h3>
            @if($list_product_cat->count()>0)
            @foreach($list_product_cat as $item)
              <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" style="padding-right:3px; padding-left: 3px;">
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="{{ asset('public/img/product/'.$item->image) }}" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="{{ url('san-pham/'.$item->slug) }}" class="btn">Xem</a>
                        <a href="{{ url('san-pham/'.$item->slug) }}" class="btn"><span class="fa fa-share-alt"></span></a>
                      </div>
                    </div>
                    <h3><a href="{{ url('san-pham/'.$item->slug) }}">{{ $item->name }}</a></h3>
                    <div class="pi-price">
                          @if($item->price != 0)
                          <span>{{ format_curency($item->price) }}</span>
                          @else
                          <span>{{ trans("index.contact") }}</span>
                          @endif
                      </div>
                          @if($item->price != 0 && !empty($item->price))
                              <a href="{{ url('san-pham/'.$item->slug) }}" class="btn add2cart"  idproduct="{{ $item->idproduct }}" base_url="{{ url("") }}" token="{{ csrf_token() }}"><i class="fa fa-cart-plus fa-1x"><span class="hidden-xs"> Mua</span></i></a>
                          @endif
                    <div class="sticker sticker-new"></div>
                  </div>
              </div>
            @endforeach
            @else
              <h5>Không có sản phẩm nào phù hợp với từ khóa tìm kiếm !</h5 >
            @endif
          </div>
          <!-- block_product_category -->


          <!-- pagination -->
          <div class="page_bottom">
            {!! $list_product_cat->render() !!} 
            <!-- <p class="info">{{ trans('category.pagination_show') }} 20 {{ trans('category.pagination_of') }} 300 {{ trans('category.pagination_product') }}</p> -->
          </div>
          <!-- pagination -->


          <!-- block_product_category -->
          <div class="block_product_category">
            <h3>{{ trans('index.news') }}</h3>
          @if($list_news_cat->count()>0)
            @foreach($list_news_cat as $item)
              <div class="col-sm-12 col-item item_search">
                <div class="col-md-3">
                  <a href="{{ url('tin-tuc/'.$item->slug) }}">
                      <img src="{{ asset('public/img/news/'.$item->newimg) }}" class="img-responsive" alt="a" />
                  </a>
                </div>
                <div class="col-md-9">
                    <div class="price">
                        <a href="{{ url('tin-tuc/'.$item->slug) }}">
                          <h5>{{ $item->newsname }}</h5>
                        </a>
                        <div>{{ $item->newintro }}</div>
                    </div> 
                </div> 
              </div>
            @endforeach
          @else
            <h5>Không có tin tức nào được tìm thấy với từ khóa tìm kiếm !</h5>
          @endif
          </div>
          <!-- block_product_category -->


          <!-- pagination -->
          <div class="page_bottom">
            {!! $list_news_cat->render() !!} 
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

    <style type="text/css">
      .filter_main{
        display: none;
      }
    </style>

</div>

@endsection() 