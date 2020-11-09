@extends('computer.home.master')
@section('title', (!empty($itemnews)?$itemnews->newsname:""))
@section('seo_keyword', (!empty($itemnews)?$itemnews->newsname:""))
@section('seo_description', (!empty($itemnews)?$itemnews->newintro:""))
@section('seo_image', (!empty($itemnews)?asset('public/img/news/'.$itemnews->newimg):""))
@section('seo_url', url()->current())
@section('content')
<div class="wrapper_main container">
     <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb">
        <ul>
          <li>{{ trans('index.home') }}</li>
          <li><a href=""><i class="fa fa-chevron-right"></i> {{ trans('index.news') }}</a></li>
        </ul>
      </div> 
    <!-- breadcrumb  -->



    <!-- detail category --> 
      <div class="row">



        <!-- content -->
        <div class="col-md-9 detail_news ">


          <div class="block_image_news">
            @if(($itemnews->newvideo !="") && ($itemnews->newvideo !="#"))
                <iframe class="videos" width="100%" height="100%" src="{{$itemnews->newvideo}}" frameborder="0" allowfullscreen></iframe>
            @else
              <img src="{{ asset('public/img/news/'.$itemnews->newimg) }}">
            @endif
          </div>

          <!-- block_content_news -->
          <div class="block_content_news">


            <h1 class="title">{{ $itemnews->newsname }}</h1>


            <div class="list_des_news">
              <p class="date"><i class="fa fa-calendar"></i> {{ $itemnews->created_at }}</p>
              <p class="comment"><i class="fa fa-comment-o"></i> <a href="#comment_news"><span class="fb-comments-count" data-href="{{ Request::fullUrl() }}">0</span> {{ trans('listnews.comment') }}</a></p>
            </div>


            <div class="content_news"><?php echo ($itemnews->newcontent) ?></div>

            <div class="block_key_tag_news">
              <div class="tag_news"><b>Tags:</b> <h3><?php echo ($itemnews->newtag) ?><h3></div>
              <div class="key_news"><b>Key:</b> <h3><?php echo ($itemnews->newkeywords) ?><h3></div>
            </div>

            <div id="comment_news" class="fb-comments" data-href="{{ Request::fullUrl() }}" data-width="100%" data-numposts="5"></div>

          </div>
          <!-- block_content_news -->
        </div>
        <!-- content -->



 
        <!-- sidebar -->
        @include('computer.home.sidebar_right')
        <!-- sidebar --> 




      </div> 
    <!-- detail category -->

</div>
@endsection() 