   <!-- Slider Section -->
    <div class="container hidden-xs hidden-sm hidden-md" style="margin-top: -25px;"> 
        <div id="slider-section" class="section-padding section-white slider-section">
            <div class="col-md-3" style=" padding: 1px;">
                <div class="root-box">
                    <ul class="root">
                    @foreach($modproducts as $key => $itemmod)
                        <li>
                            <a class="parent" href="{{ url('loai-san-pham/'.$itemmod->slug) }}">
                            <img class="icon-menu" alt="img" src="{{url('/'.$itemmod->modimg)}}" style="margin-top: -5px;" width="25" height="25"> {{ $itemmod->modname }}</a>             
                                <div class="sub-box col-md-12">
                                    <ul class="sub">
                                    @foreach($itemmod->listproducts as $itemlist)
                                        <li><a href="{{ url('loai-san-pham/'.$itemlist->slug) }}">{{ $itemlist->listname }}</a></li>
                                    @endforeach
                                    </ul>
                                </div>                                                         
                        </li> 
                    @endforeach                           
                    </ul>   
                </div>
            </div>
            <div class="col-md-9" style=" padding: 3px">
                <div class="row"> 
                    <div class="col-md-8" style="padding-right:0;">
                        <!-- slider1-container -->
                        <div id='coin-slider'>
                        @foreach($slides as $row)
                          <a href="{{$row->linknew}}" target="_blank">
                            <img src='{{url('public/img/slide/'.$row->img)}}'>
                          </a>
                        @endforeach                  
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-left:0; padding-right: 0;">
                        @foreach($adverts_top as $item)
                            <div class="col-md-12 image-box">
                                <div class="nn-banner-qc-right" >
                                  <a class="img-responsive" href="{{ $item->link }}">
                                      <img src="{{asset('public/img/advert/'.$item->img)}}" alt="img">
                                  </a>
                                  <!-- <p>Banner quảng cáo</p> -->
                                </div>
                            </div>
                        @endforeach 
                    </div>
                </div>
                    
                <div class="row">                    
                    @foreach($adverts_bottom as $item)
                        <div class="col-md-4 index-ads">
                            <div class="nn-banner-qc-index">
                              <a href="{{ $item->link }}"><img src="{{ asset('public/img/advert/'.$item->img) }}"></a>
                              <!-- <p>Banner quảng cáo</p> -->
                            </div>
                        </div>
                    @endforeach                    
                </div>
            </div>
        </div>
    </div>
    <!-- slider-container1 /- -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#coin-slider').coinslider({ width:585  ,height: 250, navigation: true,showNavigationButtons: false, delay: 2000 });
      });
    </script>
    <!-- Slider Section /- -->