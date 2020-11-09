@extends('computer.home.master')
@section('title','Login')
@section('content')
<div class="wrapper_main container">

    <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
          <li><a href=""><i class="fa fa-chevron-right"></i> {{ trans('index.login') }}</a></li>
        </ul>
      </div> 
    <!-- breadcrumb  -->




    <!-- login - register --> 
      <div class="row block_login_register"> 

        <div class="col-md-6 col-md-offset-3 block_login">
          <form class="form_user">
            <div class="block_title">
              <h3>{{ trans('index.login') }}</h3>
              <p>{{ trans('login.not_account') }} <a href="{{ url('register') }}">{{ trans('index.register') }}</a>
            </div>
            <div class="content_form">
              <div class="item_control">
                <span class="alert_login"></span>
              </div>
              <div class="item_control">
                <label>{{ trans('login.email') }}</label>
                <input type="email" id="txtEmailLogin">
              </div>
              <div class="item_control">
                <label>{{ trans('login.pass') }}</label>
                <input type="password" id="txtPassLogin">
              </div>
              <!-- <div class=""><a href="" class="link_forgot">{{ trans('login.forgot') }}</a> -->
              </div>
              <button type="" class="btn_normal btn_form_user" id="btn_login" page_return="login"  base_url="{{ url("") }}" token="{{ csrf_token() }}"><i class="fa fa-lock"></i> {{ trans('index.login') }}</button>
              
              <div class="block_login_social" align="center">
                <a href="{{ url('').'/login_social/facebook/user' }}" class="btn_login_fb"><i class="fa fa-facebook"></i> {{ trans('login.login_fb') }}</a>
              </div>
              <div class="block_login_social" align="center">
                <a href="{{ url('').'/login_social/google/user' }}" class="btn_login_gg"><i class="fa fa-google"></i> {{ trans('login.login_gg') }}</a>
              </div>
            </div>
          </form>
        </div>


      </div> 
    <!-- login - register -->

</div>
@endsection() 