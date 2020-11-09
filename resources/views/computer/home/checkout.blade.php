@extends('computer.home.master')
@section('title', trans('index.checkout'))
@section('content')
<div class="wrapper_main container">

    <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
          <li><a href=""><i class="fa fa-chevron-right"></i> {{ trans('index.account') }}</a></li>
        </ul>
      </div> 
    <!-- breadcrumb  -->



    <!-- detail product --> 
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
              <div class="dot_step">2</div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4 col_step_checkout">
              <div class="text_step">
                  <span class="hidden-xs">{{ trans('checkout.pay1') }}</span>
                  <span class="visible-xs-inline-block">{{ trans('checkout.pay2') }}</span>
              </div>
              <div class="dot_step">3</div>
              <div class="progress_step"><div class="progress-bar"></div></div>
              <div class="dot_step">3</div>
            </div>
          </div>
          <!-- step_checkout -->


          <!-- step_account -->
          <div class="step_account">
            <div class="col-md-12" align="center">
              <p style="margin-bottom: 30px;"><b><i>{{ trans('checkout.login_to_sys') }}</i></b></p>
              <div class="block_btn_account">
                <div class="col-md-5" align="right">
                <a href="{{ url('').'/login_social/facebook/pay' }}" class="btn_login_fb"><i class="fa fa-facebook"></i> {{ trans('checkout.login_fb') }}</a>
                </div>
                <div class="col-md-2">
                   {{ trans('checkout.login_or') }} 
                </div>
                <div class="col-md-5" align="left">
                  <a href="{{ url('').'/login_social/google/pay' }}" class="btn_login_gg"><i class="fa fa-google"></i> {{ trans('checkout.login_gg') }} </a>
                </div>
              </div>
            </div>
            <div class="col-md-12 content_checkout_account">
              <div class="col-md-9 block_choose_account">
                <div class="col-md-3">
                  <button link="#form_login" class="btn_choose active"><i>{{ trans('index.login') }}</i> <span>{{ trans('checkout.form_account') }}</span></button>
                  <button link="#form_register" class="btn_choose"><i>{{ trans('index.register') }}</i><span>{{ trans('checkout.form_not_account') }}</span></button>
                </div>
                <div class="col-md-9">
                  <form class="form_user" id="form_login">
                    <div class="content_form content_before_register">
                      <div class="left_check_out">
                        <h2>{{ trans('checkout.form_title_login') }}</h2>
                        <div class="item_control">
                          <span class="alert_login"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('checkout.label_email') }}</label>
                          <input type="email" id="txtEmailLogin">
                        </div>
                        <div class="item_control">
                          <label>{{ trans('checkout.label_pass') }}</label>
                          <input type="password" id="txtPassLogin">
                        </div>
                        <!-- <a href="">{{ trans('checkout.link_forgot_pass') }}</a> -->
                        <button type="submit" class=" btn btn-primary" id="btn_login" page_return="thanhtoan" base_url="{{ url("") }}" token="{{ csrf_token() }}">{{ trans('checkout.btn_login') }}</button>
                      </div> 
                    </div>
                  </form>
                  <form class="form_user" id="form_register" style="display:none">
                    <div class="content_form content_before_register"> 
                      <div class="left_check_out">
                        <h2>{{ trans('checkout.form_title_register') }}</h2>
                        <div class="item_control">
                          <span class="alert_login"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('register.label_fullname') }}</label>
                          <input type="text" id="txtFullnam_register">
                          <span class="error"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('register.label_phone') }}</label>
                          <input type="text" id="txtPhone_register">
                          <span class="error"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('register.label_email') }}</label>
                          <input type="email" id="txtEmail_register">
                          <span class="error"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('register.label_address') }}</label>
                          <input type="email" id="txtAddress_register">
                          <span class="error"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('register.label_pass') }}</label>
                          <input type="password" id="txtPassword_register">
                          <span class="error"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('register.label_repass') }}</label>
                          <input type="password" id="txtRePassword_register">
                          <span class="error"></span>
                        </div>
                        <!-- <div class="item_control group_item_checkbox">
                          <label>Giới tính</label>
                          <div class="item_checkbox col-md-6">
                            <input type="radio" name="check_block2" id="check1">
                            <button type="button"></button>
                            <label for="check1" >Nam</label>
                          </div>
                          <div class="item_checkbox col-md-6">
                            <input type="radio" name="check_block2" id="check4">
                            <button type="button"></button>
                            <label for="check4" >Nữ</label>
                          </div>
                        </div> -->
                        <div class="item_control">
                          <label></label>
                          {{ trans('register.alert_register') }}
                          <a href="" class="link_dieukien">{{ trans('register.link_alert_register') }}</a>
                        </div> 
                        <button type="" class="btn btn-primary btn_form_user" id="btn_register" page_return="login"  base_url="{{ url("") }}" token="{{ csrf_token() }}"><i class="fa fa-lock"></i> {{ trans('index.register') }}</button>
                        
                      </div> 
                    </div>
                  </form>
                </div>
              </div>    
              <!-- right cart -->
              <div class="col-md-3">
                <div class="block_right_cart">
                  <h3>{{ trans('index.your_cart') }} ({{ Cart::count() }} {{ trans('index.product') }})</h3>
                  @foreach($carts as $item)
                  <p class="item"><span class="qty">{{ $item->qty }}</span> x <a href="{{ url('product/'.$item->id) }}">{{ $item->name }}</a><span class="sub">{{ format_curency($item->options->price_show) }} </span></p>
                  @endforeach
                  <div class="tamtinh_cart">{{ trans('cart.cart_sub_total') }}:<b><span>{{ format_curency( Cart::subtotal(0,"","") ) }}</span></b></div>
                  <div class="thanhtien_cart">{{ trans('cart.cart_total_all') }}:<b><span>{{ format_curency( Cart::total(0,"","") ) }}</span></b></div>
                </div>
                @if(Cart::count() > 0)
                  <button class="btn btn-primary btn-xl btn_checkout" id="continue_order_not_login" base_url="{{ url("") }}" token="{{ csrf_token() }}">{{ trans('checkout.continue_order_not_login') }} <i class="fa fa-chevron-right"></i></button>
                @endif
              
              </div>
              <!-- right cart -->             
            </div>
          </div>
          <!-- step_account --> 

      </div> 
    <!-- detail product -->

</div>
@endsection() 