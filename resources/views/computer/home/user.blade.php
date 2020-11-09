@extends('computer.home.master')
@section('title','Đăng ký')
@section('content')

<div class="wrapper_main container">

    <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
          <li><a href=""><i class="fa fa-chevron-right"></i> {{ trans('user.info') }}</a></li>
        </ul>
      </div> 
    <!-- breadcrumb  -->



    <!-- detail product -->
    <div class="row"> 
      <div class="col-md-12"> 
          <h1 class="title_info_user">{{ trans('user.welcome') }}, <b>{{ $customer->cusfullname }}</b></h1>
          <!-- step_account -->
          <div class=""> 
            <div class="col-md-12 block_choose_account">
                <div class="col-md-3">
                  <button link="#form_info" class="btn_choose active"><i>{{ trans('user.title_info') }}</i> <span>{{ trans('user.sub_title_info') }}</span></button>
                  <button link="#form_address" class="btn_choose"><i>{{ trans('user.title_address') }}</i> <span>{{ trans('user.sub_title_address') }}</span></button>
                  @if($customer->idloginsocial == "")
                  <button link="#form_pass" class="btn_choose"><i>{{ trans('user.title_pass') }}</i><span>{{ trans('user.sub_title_pass') }}</span></button>
                  @endif
                  <a href="{{ url('logout') }}" id="logout_cus">{{ trans('user.logout') }} <i class="fa fa-chevron-right"></i></a>
                </div>
                <div class="col-md-9">
                  <form class="form_user" id="form_info">
                    <div class="content_form"> 
                      <div class="left_check_out">
                        <h2>{{ trans('user.sub_title_info') }}</h2>
                        <div class="item_control">
                          <span class="alert_login alert_login_info"></span>
                        </div>
                        <div class="item_control">
                          <img src="{{ session('logined_cusimg') }}">
                        </div>
                        <div class="item_control">
                          <label>{{ trans('user.fullname') }}</label>
                          <input type="text" value="{{ $customer->cusfullname }}" id="txtFullname_Cus1">
                        </div>
                        <div class="item_control">
                          <label>{{ trans('user.phone') }}</label>
                          <input type="text" value="{{ $customer->cusphone }}" id="txtPhone_Cus1">
                        </div>
                        <div class="item_control">
                          <label>{{ trans('user.email') }}</label>
                          <input type="text" disabled="disabled" value="{{ $customer->cusemail }}">
                        </div>
                        <button class="btn_normal" id="btn_save_custommer_info"  base_url="{{ url("") }}" token="{{ csrf_token() }}">{{ trans('user.save_info') }} </button>
                      </div> 
                    </div>
                  </form>
                  <form class="form_user" id="form_address" style="display:none">
                    <div class="content_form content_before_register"> 
                      <div class="left_check_out">
                        <h2>{{ trans('user.sub_title_address') }}</h2>
                        <div class="item_control">
                          <span class="alert_login alert_login_address"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('user.address') }}</label>
                          <textarea readonly="readonly" id="txtFulladdress">{{ $customer->cusaddress }}</textarea>
                        </div>

                        <div class="item_control">
                         {{ trans('checkout.login_or') }} 
                       </div>

                        <div class="item_control">
                          <label>{{ trans('user.city') }}</label>
                          <select id="select_city" base_url="{{ url("") }}" token="{{ csrf_token() }}">
                            <option value=''>{{ trans('shipping.select_city') }}</option>
                            @foreach($cities as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                          <span class="error"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('user.district') }}</label>
                          <select id="select_district" base_url="{{ url("") }}" token="{{ csrf_token() }}">
                            <option value=''>{{ trans('shipping.select_district') }}</option>
                          </select>
                          <span class="error"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('user.ward') }}</label>
                          <select id="select_ward">
                            <option value=''>{{ trans('shipping.select_ward') }}</option>
                          </select>
                          <span class="error"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('user.address') }}</label>
                          <input type="text" id="txtAddress_Cus2">
                          <span class="error"></span>
                        </div>
                        <button class="btn_normal" id="btn_save_custommer_address" base_url="{{ url("") }}" token="{{ csrf_token() }}">{{ trans('user.save_info') }}</button>
                      </div> 
                    </div>
                  </form>
                  @if($customer->idloginsocial == "")
                  <form class="form_user" id="form_pass" style="display:none">
                    <div class="content_form content_before_register"> 
                      <div class="left_check_out">
                        <h2>{{ trans('user.sub_title_pass') }}</h2>
                        <div class="item_control">
                          <span class="alert_login alert_login_pass"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('user.oldpass') }}</label>
                          <input type="password" id="txtOldpassword">
                          <span class="error"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('user.pass') }}</label>
                          <input type="password" id="txtNewpassword">
                          <span class="error"></span>
                        </div>
                        <div class="item_control">
                          <label>{{ trans('user.repass') }}</label>
                          <input type="password" id="txtRepassword">
                          <span class="error"></span>
                        </div> 
                        <button class="btn_normal" id="btn_save_custommer_pass" base_url="{{ url("") }}" token="{{ csrf_token() }}">{{ trans('user.save_info') }} </button>
                      </div> 
                    </div>
                  </form>
                  @endif
                </div>
            </div>  
          </div>
          <!-- step_account --> 

      </div>
    </div>
    <!-- detail product -->

</div>
@endsection() 