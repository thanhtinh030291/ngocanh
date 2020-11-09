<!-- product sale -->
<div class="block_product_related category-post-section"  id="category-post-section"> 

    <!-- Section Header -->
    <div class="section-header">
        <h2>{{ trans('product.related') }}</h2>
    </div>
    <!-- Section Header /- -->
  
    <!-- Wrapper for slides -->
    <div id="responsive-sale">
        @foreach($listproducts_bottom as $itemproduct)
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3" style="padding-right:3px; padding-left: 3px;">
                <div class="product-item">
                  <div class="pi-img-wrapper">
                        <img src="{{ asset('public/img/product/'.$itemproduct->image) }}" alt="Berry Lace Dress">
                    <div>
                      <a href="{{ url('san-pham/'.$itemproduct->slug) }}" class="btn">Xem</a>
                      <a href="{{ url('san-pham/'.$itemproduct->slug) }}" class="btn"><span class="fa fa-share-alt"></span></a>
                    </div>
                  </div>
                  <h3><a href="{{ url('san-pham/'.$itemproduct->slug) }}">{{ $itemproduct->name }}</a></h3>
                  <div class="pi-price">
                        @if($itemproduct->price != 0)
                        <span>{{ format_curency($itemproduct->price) }}</span>
                        @else
                        <span>{{ trans("index.contact") }}</span>
                        @endif
                    </div>
                        @if($itemproduct->price != 0 && !empty($itemproduct->price))
                            <button class="btn add2cart btn_add_cart"  idproduct="{{ $itemproduct->idproduct }}" base_url="{{ url("") }}" token="{{ csrf_token() }}"><i class="fa fa-cart-plus fa-1x"><span class="hidden-xs"> Mua</span></i></button>
                        @endif
                    <div class="sticker sticker-new" style="background: url( {{ url('public/img/listproduct/'.$itemproduct->tinhtrang['sttimg'])    }} ) no-repeat;">
                                      
                    </div>
                </div>
            </div> 
        @endforeach
    </div>
    <!-- Wrapper for slides -->
</div> 
<!-- end product sale -->