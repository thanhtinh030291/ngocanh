@extends('computer.home.master')
@section('title', trans('index.error_404'))
@section('content')

<div class="wrapper_main container">

    <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
        </ul>
      </div> 
    <!-- breadcrumb  -->



    <!-- success --> 
      <div class="success_order">
        <h1>404</h1>
        <p>{{ trans('index.error_404') }}</p>
        <a href="{{ url('') }}">{{ trans('ok.btn_ok') }} <i class="fa fa-home"></i></a>
      </div> 
    <!-- success -->




    <!-- product sale --> 
    <?php $listproducts_bottom = $products_new; ?> 
    @include('computer.home.slide_product_bottom') 
    <!-- end product sale -->
    

</div>
@endsection() 