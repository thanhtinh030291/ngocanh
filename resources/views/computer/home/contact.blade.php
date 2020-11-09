@extends('computer.home.master')
@section('title',trans('index.contact'))
@section('content')
<div class="wrapper_main container">

  <div class="container">{!! $contact->slogan !!}</div>


    <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
          <li><a href=""><i class="fa fa-chevron-right"></i> {{ trans('index.contact') }}</a></li>
        </ul>
      </div> 
    <!-- breadcrumb  -->

    <!-- login - register --> 
      <div class="row block_login_register"> 

        <div class="col-md-12">
          <div class="col-md-12 iframe_map">
            <iframe class="col-md-12 iframe_map" src="{{ $contact->map }}"></iframe>
          </div>
        </div>

        <div class="col-md-12">

          <div class="col-md-8 block_contact">
            <form class="form_user">
              <div class="block_title">
                <h3>{{ trans('index.contact') }}</h3>
              </div>
              <div class="content_form">
                <div class="item_control">
                  <span class="alert_login"></span>
                </div>
                <div class="item_control">
                  <label>{{ trans('contact.name') }}</label>
                  <input type="text" id="txtNameContact">
                  <span class="error"></span>
                </div>
                <div class="item_control">
                  <label>{{ trans('contact.email') }}</label>
                  <input type="email" id="txtEmailContact">
                  <span class="error"></span>
                </div>
                <div class="item_control">
                  <label>{{ trans('contact.content') }}</label>
                  <textarea id="txtContentContact"></textarea>
                  <span class="error"></span>
                </div>
              </div>

              <button type="" class="btn_normal btn_form_contact" id="btn_contact" base_url="{{ url("") }}" token="{{ csrf_token() }}"><i class="fa fa-"></i> {{ trans('contact.send') }}</button>
            </form>
          </div>
          <div class="col-md-4">
            <ul class="list-unstyled clear-margins">
                <li class="widget-container widget_recent_news">
                    <!-- <h1 class="title-widget">{{ $contact->nameco }}</h1> -->
                    <div class="footerp"> 
                    <h2 class="title-median">{{ $contact->nameco }}</h2>
                    <p><b>Email:</b> <a href="{{ $contact->mail }}">{{ $contact->mail }}</a></p>
                    <p>{{ $contact->time }}</p>
                     
                    <p><b>Phone Numbers : </b>{{ $contact->phone }}</p>
                    </div>
                    
                    <div class="social-icons">
                        <ul class="nomargin">
                          @foreach($socials as $item)
                            <a href="{{ $item->link }}"><i class="fa {{ $item->icon }} fa-3x" id="social"></i></a>
                          @endforeach
                            <a href="mailto:{{ $contact->mail }}"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>
                        </ul>
                    </div>
                </li>
            </ul>
          </div>
        </div>

      </div> 
    <!-- login - register -->

</div>
@endsection() 