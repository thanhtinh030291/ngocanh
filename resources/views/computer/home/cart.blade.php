@extends('computer.home.master')
@section('title',trans('index.cart'))
@section('content')
<div class="wrapper_main container">

    <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
          <li><a href=""><i class="fa fa-chevron-right"></i> {{ trans('index.cart') }}</a></li>
        </ul>
      </div> 
    <!-- breadcrumb  -->



    <!-- cart product --> 
      <div class="row">
        <div class="col-md-12 block_show_cart">

          <div class="row">

            <!-- left cart -->
            <div class="col-md-9 left_cart">
              <h1>{{ trans('index.your_cart') }} <b>({{ Cart::count() }} {{ trans('index.product') }})</b></h1>
              <div class="col-md-12 hidden-xs header_title_cart">
                <div class="col-md-6  "></div>
                <div class="col-md-2  text-center">{{ trans('cart.cart_price') }}</div>
                <div class="col-md-2  ">{{ trans('cart.cart_qty') }}</div>
                <div class="col-md-2  ">{{ trans('cart.cart_total_product') }}</div>
              </div>
              

              @if(Cart::count() == 0)
              <div class="col-md-12 item_cart">
                <i><b>Giỏ hàng trống</b></i>
              </div>
              @endif

              @foreach($carts as $item)
              <div class="col-md-12 item_cart">
                <div class="col-md-6 col-xs-12">

                  <div class="col-md-3">
                    <a href="{{ url('product/'.$item->id) }}">
                      <img src="{{ asset('public/img/product/'.$item->options->image) }}">
                    </a>
                  </div>
                  <div class="des_item_cart col-md-9">
                    <p class="title">{{ $item->name }}</p>
                    @if($item->options->price_to_sale != 0)
                    <p class="qty_price_to_sale">{{ trans('cart.price_to_sale_1') }} {{ $item->options->quantity_sale }} {{ $item->options->unit }} {{ trans('cart.price_to_sale_2') }}  {{ format_curency($item->options->price_to_sale) }}</p>
                    @endif
                    <p class="delete"><a class="btn btn-default" href="{{ url('removecart/'.$item->rowId) }}" style="text-decoration: none;">{{ trans('cart.cart_delete') }}</a></p>
                  </div>
                </div>
                <div class="col-md-2 col-xs-4 price_cart">
                  <span>{{ format_curency($item->options->price_show) }}</span>
                  @if($item->options->vat != 0)
                  <div class="show_vat">(VAT {{ $item->options->vat }} %)</div>
                  @endif
                </div>
                <div class="col-md-2 col-xs-4 block_qty_cart">
                  <input class="qty_in_cart" value="{{ $item->qty }}" disabled="disabled">
                  <button class="sub_qty" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" rowid="{{ $item->rowId }}" base_url="{{ url("") }}" token="{{ csrf_token() }}"><i class="fa fa-minus"></i></button>
                  <button class="add_qty" data-loading-text="<i class='fa fa-spinner fa-spin '></i>" rowid="{{ $item->rowId }}" base_url="{{ url("") }}" token="{{ csrf_token() }}"><i class="fa fa-plus"></i></button>
                </div>
                <div class="col-md-2 col-xs-4 subtotal"><span>{{ format_curency($item->subtotal ) }}</span></div>
              </div> 
              @endforeach
               

            </div>
            <!-- left cart -->


            <!-- right cart -->
            <div class="col-md-3">
              <div class="block_right_cart">
                <div class="tamtinh_cart">{{ trans('cart.cart_sub_total') }}:<b><span>{{ format_curency(Cart::subtotal(0,"","") ) }}</span></b></div>
                <div class="thanhtien_cart">{{ trans('cart.cart_total_all') }}:<b><span>{{ format_curency(Cart::total(0,"","") ) }}</span></b></div>
              </div>
              @if(Cart::count() > 0)
              <a href="{{ url('checkout') }}" class="btn_normal btn_checkout btn btn-primary">{{ trans('cart.cart_proceed_order') }} <i class="fa fa-chevron-right"></i></a>
              @endif
            </div>
            <!-- right cart -->


          </div>

        </div> 

          
      </div> 
    <!-- cart product -->


    <!-- product sale -->
    <?php $listproducts_bottom = $products_new; ?> 
    @include('computer.home.slide_product_bottom') 
    <!-- end product sale -->

</div>
@endsection() 