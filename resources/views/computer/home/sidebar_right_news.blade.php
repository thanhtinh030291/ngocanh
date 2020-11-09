<div class="col-md-3">
 

    <div class="block_sidebar_news  block_product_sidebar">
      <h2 class="bg_hbh title">{{ trans('listnews.newest') }}</h2>
      <div id=" " class="content">

        <!-- news 1 --> 
        <div class="col-sm-12 no_padding_product">
          <?php $count = 0; ?>
          @foreach($news_new as $item)
          @if($count < 5)
          <div class=" item_product_sidebar">  
            <div class="row">  
              <div class="photo col-sm-5 col-xs-5">
                  <a href="{{ url('tin-tuc/'.$item->slug) }}"><img src="{{ asset('public/img/news/'.$item->newimg) }}" class="img-responsive" alt="{{ $item->newalt }}" /></a>
              </div>
              <div class="info col-sm-7 col-xs-7"> 
                  <h5><a href="{{ url('tin-tuc/'.$item->slug) }}">{{ $item->newsname }}</a></h5>
              </div> 
            </div> 
          </div> 
          @endif
          <?php $count++; ?>
          @endforeach
        </div>
        <!-- news 1 --> 


      </div>
    </div>
            

    @foreach($adverts_bottom as $item)
    <div class="nn-banner-qc-l">
      <a href="{{ $item->link }}"><img src="{{ asset('public/img/advert/'.$item->img) }}"></a>
      <!-- <p>Banner quảng cáo</p> -->
    </div>
    @endforeach
  
</div>