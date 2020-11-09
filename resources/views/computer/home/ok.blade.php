@extends('computer.home.master')
@section('title','OK')
@section('content')

<div class="wrapper_main container">

    <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
          <li><a href=""><i class="fa fa-chevron-right"></i> {{ trans('ok.ok') }}</a></li>
        </ul>
      </div> 
    <!-- breadcrumb  -->



    <!-- success --> 
      <div class="success_order">
        <h1>{{ trans('ok.ok') }}</h1>
        <p>{{ trans('ok.text_ok') }}</p>
        <a href="{{ url('') }}">{{ trans('ok.btn_ok') }} <i class="fa fa-home"></i></a>
      </div> 
    <!-- success -->



    <!-- product sale --> 
    <?php $listproducts_bottom = $products_new; ?> 
    @include('computer.home.slide_product_bottom') 
    <!-- end product sale -->

</div>
@endsection() 