<div class="col-md-3">

  <!-- block_sidebar menu -->
  <div class="block_sidebar block_product_sidebar" style="display:none">
    <h2 class="bg_hbh title">{{ trans('index.category') }}</h2>
    <div class="content">

      <!-- col menu category 1 -->
      <div class="item_content">  
        <div class="header_content">  
          <button type="button" class="btn_collapsed" data-toggle="collapse" data-target="#item_content_menu_1"><i class="fa fa-minus"></i></button>
          <h1 class="navbar-brand title_item">{{ trans('index.category') }} {{ trans('index.product') }}</h1>
        </div>

        <div id="item_content_menu_1" class="collapse">
          <ul class="list_menu_category">
            @foreach($listproducts as $item)
              <li><a href="{{ url('category').'/'.$item->id }}"><i class="fa fa-angle-right"></i> {{ $item->trname }}</a></li>
            @endforeach
          </ul>
        </div>
      </div> 
      <!-- col menu category 1 --> 

    </div>
  </div>
  <!-- block_sidebar menu -->

  <!-- block_sidebar loc san pham -->
  <div class="block_sidebar block_product_sidebar">
    <h2 class="bg_hbh title">{{  trans('category.field_product') }}</h2>
    <div class="content"> 

      <div class="filter_list_product">
          <?php $count=1; ?>
          @foreach($modproducts as $item_mod)
          @if( $count<12)
              @foreach($item_mod->listproducts as $item_list)
                @if($count%3 == 0)
                <div class="row">
                @endif
                  <div class="col-xs-4"> 
                    <div class="item_filter_list_product">
                        <a href="{{ url('loai-san-pham').'/'.$item_list->slug }}" title="{{ $item_list->trname }}">
                        @if($item_list->listimg !='no-img.png')
                            <img class="img-circle" src="{{ asset($item_list->listimg) }}" alt="img">
                        @else
                          <img class="img-circle" src="{{ asset('public/img/product/no-img.png') }}" alt="img">
                        @endif
                        </a>
                    </div>
                    <h3 style="font-size: 11px;">
                      <a href="{{ url('loai-san-pham').'/'.$item_list->slug }}" title="{{ $item_list->trname }}" >{{ $item_list->trname }}</a>
                    </h3>
                  </div>
                @if($count%3 == 0)
                </div>
                @endif           
              <?php $count++; ?>
              @endforeach
             @endif
          @endforeach
        </div>


    </div>
  </div>
  <!-- block_sidebar  loc san pham -->
    <!-- block_sidebar loc san pham -->
  <div class="block_sidebar block_product_sidebar">
    <h2 class="bg_hbh title">Sản phẩm nổi bật </h2>
    <div class="content">

      <div class="filter_list_product">
        <div class="row">
        @foreach($list_special_mon_trong_ngay as $itemproduct)
          <div class="col-xs-12"> 
            <div class="item_filter_list_product col-xs-4">
                <a href="#">
                    <img class="img-responsive" src="{{ asset('public/img/product/'.$itemproduct->image) }}" alt="img">
                </a>
            </div>
            <div class="item_filter_list_product col-xs-8 support">
              <h3 class="pro_title"><a href="{{ url('san-pham/'.$itemproduct->slug) }}">{{ $itemproduct->name }}</a></h3>
              <h3 class="pro_price"><a href="#">
                  @if($itemproduct->price != 0)
                    <span>{{ format_curency($itemproduct->price) }}</span>
                  @else
                    <span>{{ trans("index.contact") }}</span>
                  @endif
              </a></h3>
            </div>
          </div> 
        @endforeach
        </div>
      </div>
    </div>
  </div>

  <!-- block_sidebar loc san pham -->
  <div class="block_sidebar block_product_sidebar">
    <h2 class="bg_hbh title">HỖ TRỢ TRỰC TUYẾN </h2>
    <div class="content">
    <?php $us = DB::table('customers')->where('idgroup',2)->take(4)->get(); ?>
      <div class="filter_list_product">
        <div class="row">
        @foreach( $us as $row)
          <div class="col-xs-12"> 
            <div class="item_filter_list_product col-xs-4" >
                <a href="#">
                    <img class="img-responsive" src="{{url('/public/img/customers/'.$row->cusimg)}}" alt="img">
                </a>
            </div>
            <div class="item_filter_list_product col-xs-8 support" style="padding-left:1px;">
              <h3><a href="#" style="font-weight: 600;">{{$row->cusfullname}}</a></h3>
              <h3><a href="#">Hotline: <span style="color: #EE0000;"> {{$row->cusphone}}</span></a></h3>
            </div>
          </div> 
        @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- block_sidebar  loc san pham -->

    <div class="block_sidebar_news  block_product_sidebar">
      <h2 class="bg_hbh title">{{ trans('listnews.newest') }}</h2>
      <div id=" " class="content">

        <!-- news 1 --> 
        <div class="col-sm-12 no_padding_product">
          <?php $count = 0; ?>
          @foreach($news_new as $item)
          @if($count < 5)
          <div class=" item_product_sidebar col-sm-6 col-lg-12">  
            <div class="row">  
              <div class="photo col-sm-5 col-xs-5">
                  <a href="{{ url('tin-tuc/'.$item->slug) }}"><img src="{{ asset('public/img/news/'.$item->newimg) }}" class="img-responsive" alt="{{ $item->newalt }}" /></a>
              </div>
              <div class="info col-sm-7 col-xs-7"> 
                  <h5><a href="{{ url('tin-tuc/'.$item->slug) }}">{{ $item->newsname }}</a></h5>
              </div> 
            </div> 
          </div> 
          @endif
          <?php $count++; ?>
          @endforeach
        </div>
        <!-- news 1 --> 


      </div>
    </div>
            

    @foreach($adverts_bottom as $item)
    <div class="nn-banner-qc-l">
      <a href="{{ $item->link }}"><img src="{{ asset('public/img/advert/'.$item->img) }}"></a>
      <!-- <p>Banner quảng cáo</p> -->
    </div>
    @endforeach
  
</div>