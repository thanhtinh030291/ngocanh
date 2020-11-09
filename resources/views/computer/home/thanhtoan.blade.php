@extends('computer.home.master')
@section('title', trans('index.thanhtoan'))
@section('content')

<div class="wrapper_main container">

    <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
          <li><a href=""><i class="fa fa-chevron-right"></i> {{ trans('pay.pay_order') }}</a></li>
        </ul>
      </div> 
    <!-- breadcrumb  -->



    <!-- detail thanhtoan --> 
      <div class="row">

          <!-- step_checkout -->
          <div class="step_checkout">
            <div class="col-md-4 col-sm-4 col-xs-4 col_step_checkout">
              <div class="text_step">
                  <span class="hidden-xs">{{ trans('checkout.login1') }}</span>
                  <span class="visible-xs-inline-block">{{ trans('checkout.login2') }}</span>
              </div>
              <div class="progress_step"><div class="progress-bar"></div></div>
              <div class="dot_step active">1</div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 col_step_checkout">
              <div class="text_step">
                  <span class="hidden-xs">{{ trans('checkout.shipping1') }}</span>
                  <span class="visible-xs-inline-block">{{ trans('checkout.shipping2') }}</span>
              </div>
              <div class="progress_step"><div class="progress-bar"></div></div>
              <div class="dot_step active">2</div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 col_step_checkout">
              <div class="text_step">
                  <span class="hidden-xs">{{ trans('checkout.pay1') }}</span>
                  <span class="visible-xs-inline-block">{{ trans('checkout.pay2') }}</span>
              </div>
              <div class="dot_step">3</div>
              <div class="progress_step"><div class="progress-bar"></div></div>
              <div class="dot_step active">3</div>
            </div>
          </div>
          <!-- step_checkout -->


          <!-- step_account -->
          <div class="step_account">
            <div class="col-md-12 content_checkout_thanhtoan">
              <div class="col-md-9"> 
 
                <span class="error error_shipping"></span>
                <div class="block_thanhtoan block_info_order">
                  <div class="row">
                    <!-- <div class="col-md-5">
                      <h3>{{ trans('pay.order_at') }}</h3>
                      <input type="text" id="val_date_order_at" class="form_control" disabled="disabled">
                      <span class="error"></span>
                      <div type="text" id="date_order_at" class="form_control"></div>
                      <script type="text/javascript">
                        var d = new Date();
                        var day   = d.getDate();
                        var month = d.getMonth();
                        var year  = d.getFullYear(); 

                        $( "#date_order_at" ).datepicker({
                          monthNames : [ "Tháng Một", "Tháng Hai", "Tháng Ba", "Tháng Tư", "Tháng Năm", "Tháng Sáu", "Tháng Bảy", "Tháng Tám", "Tháng Chín", "Tháng Mười", "Tháng Mười Một", "Tháng Mười Hai" ],
                          dayNames : ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy" ],
                          minDate: new Date(year, month, day),
                          onSelect: function(date, obj){
                              $('#val_date_order_at').val(date);
                          }
                        }); 
                      </script>
                    </div> -->
                    <div class="col-md-12">
                        <div>
                          <h3>{{ trans('pay.name_order') }}</h3>
                          <input type="text" class="form_control" value="{{ Session::get('pay_name') }}" id="txtNameOrder" > 
                          <span class="error"></span>
                        </div> 
                        <div>
                          <h3>{{ trans('pay.phone_order') }}</h3>
                          <input type="text" class="form_control" value="{{ Session::get('pay_phone') }}" id="txtPhoneOrder" > 
                          <span class="error"></span>
                        </div> 
                        <div>
                          <h3>{{ trans('pay.email_order') }}</h3>
                          <input type="text" class="form_control" value="{{ Session::get('pay_email') }}" id="txtEmailOrder" > 
                          <span class="error"></span>
                        </div> 
                        <!-- <div>
                          <h3>{{ trans('pay.count_for_people') }}</h3>
                          <select class="form_control"  id="sltCountpeople" >
                            <option value="1-2">1-2 Người</option>
                            <option value="2-3">2-3 Người</option>
                            <option value="4-5">4-5 Người</option>
                            <option value="> 5">> 5 Người</option>
                          </select>
                          <span class="error"></span>
                        </div> -->
                        <div>
                          <h3>{{ trans('pay.comment') }}</h3>
                          <textarea id="txtComment" class="form_control"></textarea>
                        </div>
                    </div>
                  </div>
                </div>

                <div  style="display: none">
                  <h3>1. {{ trans('pay.method_shipping') }}</h3>
                  <span class="error error_shipping"></span>
                  <div class="block_thanhtoan">
                      <ul>
                        @foreach($shippings as $item)
                        <li class="">
                          <div class="item_radio">
                            <label for="shipping_{{ $item->id }}">{{ $item->name }} <b>({{ format_curency( $item->fee ) }} )</b></label>
                            <input type="radio" checked="checked" name="check_block1" id="shipping_{{ $item->id }}" idshipping="{{ $item->id }}" class="radio_shipping" base_url="{{ url("") }}" token="{{ csrf_token() }}">
                            <button></button>
                          </div>
                        </li>
                        @endforeach
                      </ul>
                  </div>

                  <h3>2. {{ trans('pay.method_payment') }}</h3>
                  <span class="error error_payment"></span>
                  <div class="block_thanhtoan">
                      <ul class="group_item_radio">
                        @foreach($payments as $item)
                          @if($item->type == "cash" && $item->status == 1)
                          <li class="">
                            <div class="item_radio">
                              <label for="check_cash_{{ $item->id }}">{{ $item->name }}</label>
                              <input type="radio" checked="checked"  name="check_block2" id="check_cash_{{ $item->id }}" idpayment="{{ $item->id }}">
                              <button></button>
                            </div>
                          </li>
                          @endif
                          @if($item->type == "atm" && $item->status == 1)
                          <li class="">
                            <div class="item_radio">
                              <label for="check_atm" >{{ $item->name }}</label>
                              <input type="radio" name="check_block2" id="check_atm" idpayment="{{ $item->id }}">
                              <button></button>
                              <div class="content_item_check" id="block_QT">
                                <ul class="list_nganhang">
                                  <li class="col-md-2 col-sm-3 col-xs-6"><a href=""><img src="./public/img/123PVCB.jpg"></a></li>
                                </ul>
                              </div>
                            </div>
                          </li>
                          @endif
                          @if($item->type == "creditcart" && $item->status == 1)
                          <li class="">
                            <div class="item_radio">
                              <label for="check_creditcart" >{{ $item->name }}</label>
                              <input type="radio" name="check_block2" id="check_creditcart" idpayment="{{ $item->id }}" typepayment="{{ $item->type }}">
                              <button></button>
                              <div class="content_item_check" id="block_ATM">
                                <form class="form_user col-md-6" id="form_creditcart">
                                  <div class="content_form content_before_register "> 
                                    <div class="left_check_out">
                                      <div class="item_control">
                                        <label>{{ trans('pay.cart_type') }}</label>
                                        <select id="payment_credit_type">
                                          <option value="Visa">Visa</option>
                                          <option value="MasterCard">MasterCard</option>
                                        </select>
                                      </div>
                                      <div class="item_control">
                                        <label>{{ trans('pay.cart_number') }}</label>
                                        <input type="text" id="payment_credit_number">
                                        <span class="error"></span>
                                      </div>
                                      <div class="item_control">
                                        <label>{{ trans('pay.cart_name') }}</label>
                                        <input type="text" id="payment_credit_name">
                                        <span class="error"></span>
                                      </div>
                                      <div class="item_control">
                                        <label>{{ trans('pay.cart_expdate') }}</label>
                                        <input type="text" id="payment_credit_expdate" >
                                        <span class="error"></span>
                                      </div>
                                      <div class="item_control row">
                                        <div class="col-md-6">
                                          <label>{{ trans('pay.cart_code') }}</label>
                                          <input type="text" id="payment_credit_cvv2" >
                                        <span class="error"></span>
                                        </div>
                                        <div class="col-md-6">
                                          <span class="icon_ma_bao_mat"></span>
                                        </div>
                                      </div>
                                    </div> 
                                  </div>
                                </form>
                                <div class="col-md-6">
                                  <span class="icon_card_atm"></span>
                                </div>
                              </div>
                            </div>
                          </li>
                          @endif
                          @endforeach
                      </ul>
                  </div>
                </div>  

                  <button class="btn_normal btn btn-primary btn-xl" id="btn_datmua" base_url="{{ url("") }}" token="{{ csrf_token() }}"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading" > {{ trans('pay.btn_order') }} </button>
                  <p>{{ trans('pay.note') }}</p>
                              
              </div>                

              <!-- right cart -->
              <div class="col-md-3">
                @if(Session::get('same_address') == 0)
                <div class="block_right_cart" style="display:none">
                  <h3>{{ trans('pay.address_pay') }}</h3>
                  <p class="name">{{ Session::get('pay_name') }}</p>
                  <p class="name">{{ Session::get('pay_phone') }}</p>
                  <p class="add">{{ Session::get('pay_address') }}</p>
                </div>
                @endif

                <div class="block_right_cart" style="display:none">
                  @if(Session::get('same_address') == 0)
                  <h3>{{ trans('pay.address') }}</h3>
                  @else
                  <h3>{{ trans('pay.address_same') }}</h3>
                  @endif
                  <p class="name">{{ Session::get('shipping_name') }}</p>
                  <p class="name">{{ Session::get('shipping_phone') }}</p>
                  <p class="add">{{ Session::get('shipping_address') }}</p>
                </div>

                <div class="block_right_cart" style="display:none">
                  <h3>{{ trans('pay.comment') }}</h3>
                  <!-- <textarea id="txtComment" class="form_control"></textarea> -->
                </div>

                <div class="block_right_cart">
                  <h3>{{ trans('index.your_cart') }} ({{ Cart::count() }} {{ trans('index.product') }})</h3>
                  @foreach($carts as $item)
                  <p class="item"><span class="qty">{{ $item->qty }}</span> x <a href="{{ url('product/'.$item->id) }}">{{ $item->name }}</a><span class="sub">{{ format_curency( $item->options->price_show ) }}</span></p>
                  @endforeach
                  <div class="tamtinh_cart">{{ trans('cart.cart_sub_total') }}:<b><span>{{ format_curency( Cart::subtotal(0,"","") ) }}</span></b></div>
                  <div class="vanchuyen_cart">{{ trans('cart.cart_fee') }}:<b><span>...</span> </b></div>
                  <div class="thanhtien_cart">{{ trans('cart.cart_total_all') }}:<b><span>{{ format_curency( Cart::total(0,"","") ) }}</span></b></div>
                </div>
              </div>
              <!-- right cart -->
            </div>
          </div>
          <!-- step_account --> 

      </div> 
    <!-- detail thanhtoan -->

</div>
@endsection() 