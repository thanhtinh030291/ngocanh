@extends('computer.home.master')
@section('title', trans('index.giaohang'))
@section('content')

<div class="wrapper_main container">

    <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
          <li><a href=""><i class="fa fa-chevron-right"></i> {{ trans('shipping.shipping_address') }}</a></li>
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
              <div class="dot_step active">2</div>
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
          <div class="step_giaohang">
            <div class="col-md-6 col-md-offset-3">
              <form class="form_giaohang">
                  <div class="item_checkbox item_checkbox_same_address">
                    <label for="same_address">Địa chỉ giao hàng giống địa chỉ thanh toán</label>
                    <input type="checkbox" id="same_address">
                    <button></button>
                  </div>
                  <div class="item">
                    <div class="col-md-3">{{ trans('shipping.fullname') }}</div>
                    <div class="col-md-9"><input type="text" id="txtFullname_Giaohang" 
                      value="<?=(session('shipping_name') != "")?session('shipping_name'):((session('logined_cusfullname') != "")?session('logined_cusfullname'):"")?>" ><span class="error"></span></div>
                  </div>
                  <div class="item">
                    <div class="col-md-3">{{ trans('shipping.phone') }}</div>
                    <div class="col-md-9"><input type="text" id="txtPhone_Giaohang" 
                      value="<?=(session('shipping_phone') != "")?session('shipping_phone'):((session('logined_cusphone') != "")?session('logined_cusphone'):"")?>"><span class="error"></span></div>
                  </div>
                  <div class="item address_default">
                    <div class="col-md-3">{{ trans('shipping.address') }}</div>
                    <div class="col-md-9">
                      <textarea readonly="readonly" id="txtFullAddress_Giaohang"><?=(session('shipping_address') != "")?session('shipping_address'):((session('logined_cusaddress') != "")?session('logined_cusaddress'):"")?></textarea>
                      <span class="error"></span>
                    </div>
                  </div>
                  <div class="item">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">Hoặc</div>
                  </div>
                  <div class="address_custom">
                    <div class="item">
                      <div class="col-md-3">{{ trans('shipping.city') }}</div>
                      <div class="col-md-9">
                        <select id="select_city" base_url="{{ url("") }}" token="{{ csrf_token() }}">
                          <option value=''>{{ trans('shipping.select_city') }}</option>
                          @foreach($cities as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                        <span class="error"></span>
                      </div>
                    </div>
                    <div class="item">
                      <div class="col-md-3">{{ trans('shipping.district') }}</div>
                      <div class="col-md-9">
                        <select id="select_district" base_url="{{ url("") }}" token="{{ csrf_token() }}">
                          <option value=''>{{ trans('shipping.select_district') }}</option>
                        </select>
                        <span class="error"></span>
                      </div>
                    </div>
                    <div class="item">
                      <div class="col-md-3">{{ trans('shipping.ward') }}</div>
                      <div class="col-md-9">
                        <select id="select_ward">
                          <option value=''>{{ trans('shipping.select_ward') }}</option>
                        </select>
                        <span class="error"></span>
                      </div>
                    </div>
                    <div class="item">
                      <div class="col-md-3">{{ trans('shipping.address') }}</div>
                      <div class="col-md-9"><textarea id="txtAddress_Giaohang"></textarea><span class="error"></span></div>
                    </div>
                  </div>
                  <button class="btn_normal" id="btn_ok_giaohang" base_url="{{ url("") }}" token="{{ csrf_token() }}">{{ trans('shipping.btn_shipping') }} <i class="fa fa-chevron-right"></i></button>
              </form>
            </div>
          </div>
          <!-- step_account --> 

      </div> 
    <!-- detail product -->

</div>
@endsection() 