@extends('computer.home.master')
@section('title','Đăng ký')
@section('content')

<div class="wrapper_main container">

    <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
          <li><a href=""><i class="fa fa-chevron-right"></i> {{ trans('index.register') }}</a></li>
        </ul>
      </div> 
    <!-- breadcrumb  -->




    <!-- login - register -->
    <div class="container"> 
      <div class="row block_login_register"> 

        <div class="col-md-8 col-md-offset-2 block_register">
          <form class="form_user">
            <div class="block_title">
              <h3>{{ trans('register.form_title_register') }}</h3>
              <p>{{ trans('register.have_account') }} <a href="{{ url('login') }}">{{ trans('index.login') }}</a>
            </div>
            <div class="content_form">
              <div class="col-md-8">
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

                <button type="" class="btn_normal btn_form_user" id="btn_register" page_return="login"  base_url="{{ url("") }}" token="{{ csrf_token() }}"><i class="fa fa-lock"></i> {{ trans('index.register') }}</button>
              </div>
              <div class="col-md-4">
                {{ trans('register.login_to_sys') }}
                <div class="block_login_social" align="center">
                  <a href="{{ url('').'/login_social/facebook/user' }}" class="btn_login_fb"><i class="fa fa-facebook"></i> {{ trans('register.login_fb') }}</a>
                </div>
                <div class="block_login_social" align="center">
                  <a href="{{ url('').'/login_social/google/user' }}" class="btn_login_gg"><i class="fa fa-google"></i> {{ trans('register.login_gg') }}</a>
                </div>
              </div>

            </div>
          </form>
        </div>


      </div>
    </div>
    <!-- login - register -->

</div>
@endsection() 