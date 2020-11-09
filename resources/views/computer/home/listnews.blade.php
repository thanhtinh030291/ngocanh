@extends('computer.home.master')
@section('title', (!empty($detail_list))?$detail_list->modname.$detail_list->listname:"" )
@section('seo_keyword', (!empty($detail_list))?$detail_list->description:"" )
@section('seo_description', (!empty($detail_list))?$detail_list->description:"" )
@section('seo_image', (!empty($detail_list->modimg))?asset($detail_list->modimg): ((!empty($detail_list->listimg))?asset($detail_list->listimg):"" ) )
@section('seo_url', Request::fullUrl())
@section('content')

<div class="wrapper_main container">

  <!-- breadcrumb  --> 
      <div class="breadcrumb nn-header-breadcrumb" style="font-size: 11px;">
        <ul>
          <li>
              <a title="home" style="color: #222;">{{ trans('index.home') }}</a>
          </li>
          <li><a href=""><b class="fa fa-chevron-right"></b>
            @if(!empty($detail_list))
             {{ $detail_list->modname }} 
             {{ $detail_list->listname }} 
          @endif
          </a></li>
        </ul>
      </div> 
    <!-- breadcrumb  -->

  <!-- detail category --> 
    <div class="row">


      <!-- content -->
      <div class="col-md-9 detail_news list_news " id="list_news"> 

        <!-- block_des_category -->
        <div class="block_des_category">
          <!-- @if(!empty($detail_list))
            <h1>{{ $detail_list->modname }}</h1>
          @endif -->
        </div>
        <!-- block_des_category -->

        <!-- <div class="row"> 
 
          <?php $count = 1;?>
          @foreach($news_in_list as $item)
          <div class="col-md-6 item_news_in_list">
            <div class="block_image_news">
              <a href="{{ url('tin-tuc/'.$item->slug) }}"><img src="{{ asset('public/img/news/'.$item->newimg) }}"></a>
            </div>
            <div class="block_content_news"> 
              <h2 class="title"><a href="{{ url('tin-tuc/'.$item->slug) }}">{{ $item->newsname }}</a></h2>

              <div class="list_des_news">
                <p class="date"><i class="fa fa-calendar"></i> {{ $item->created_at }}</p>
                <p class="comment"><i class="fa fa-comment-o"></i> 0 {{ trans('listnews.comment') }}</p>
              </div> 

              <div class="content_news">
                {{ $item->newintro  }}
              </div> 
            </div>
          </div>
          @if($count == 2)
          <div class="clear_both"></div>
          @endif
          <?php $count++;?>
          @endforeach 

 
          <div class="page_bottom"> 
            {!! $news_in_list->render() !!}  
            <p class="info">{{ trans('listnews.pagination_show') }} 20 {{ trans('listnews.pagination_of') }} 300 {{ trans('listnews.pagination_news') }}</p>
          </div> 
        </div> -->

        <div id="blog-section" class="blog-section">

          @foreach($news_in_list as $item)
          <article class=" post type-post status-publish format-standard has-post-thumbnail hentry category-fashion tag-fashion tag-shining">
              <!-- blog-box -->
            <div class="blog-shadow ">
              <div class="blog-box">
                  <div class="entry-cover">
                    <a class="box-image" href="{{ url('tin-tuc/'.$item->slug) }}"  style="background-image:url({{ asset('public/img/news/'.$item->newimg) }}); " ></a>
                  </div>
                  
                <div class="post-box-inner">
                  <div class="box-content">
                    <div class="post-categories"><a href="" rel="category tag">Fashion</a> </div>
                    <h2 class="entry-title"><a href="{{ url('tin-tuc/'.$item->slug) }}" rel="bookmark">{{ $item->newsname }}</a></h2>           
                    <p class="time"><i class="fa fa-clock-o"></i> {{ $item->created_at }}</p>                 
                    <span class="byline"> 
                      <span class="author vcard">
                        <span>Đăng bởi</span> {{ $item->newuser }}
                      </span>
                    </span>
                    <div class="post-content" >
                      <p>{{ $item->newintro }}</p> 
                    </div>
                  </div>
                </div>
              </div><!-- blog-box /- -->

              <div class="blog-social">
                <div class="p_l_z col-xs-6 col-md-9 widget_social_icons" style="padding-right: 0px; padding-left: 1px; ">
                  <ul class="social-share">
                    <li><a href="{{ url('tin-tuc/'.$item->slug) }}" class="btn_share_fb" ><i class="fa fa-share-alt fa-1x"></i></a></li>
                    <li><a href="{{ url('tin-tuc/'.$item->slug) }}" class="btn_share_fb" ><i class="fa fa-plus fa-1x"></i></a></li>
                  </ul>
                </div>
                <div class="p_r_z col-xs-6  col-md-3" style="padding-right: 0px; padding-left: 1px; ">
                  <a class="read-more pull-right" href="{{ url('tin-tuc/'.$item->slug) }}">Xem thêm</a>
                </div> 
              </div>

            </div> 
            </article>
          @endforeach              
        </div>


        <div class="page_bottom"> 
          {!! $news_in_list->render() !!}  
        </div> 

      </div>
      <!-- content -->




      <!-- sidebar -->
      @include('computer.home.sidebar_right')
      <!-- sidebar -->


    </div> 
  <!-- detail category -->


</div>
@endsection() 