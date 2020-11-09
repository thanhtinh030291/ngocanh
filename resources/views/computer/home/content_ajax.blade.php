 
@if(!empty($detail_product))
    <div class="row">
        <div class="col-md-8" id="content_post">
            
            @if($check_next != "")
            <button id="next_post_popup" type_get="1" idproduct="{{ $detail_product->idproduct }}" base_url="{{ url("") }}" token="{{ csrf_token() }}" class="btn_in_popup"><i class="glyphicon glyphicon-arrow-right"></i></button>
            @endif

            @if($check_pre != "")
            <button id="pre_post_popup" type_get="2" idproduct="{{ $detail_product->idproduct }}" base_url="{{ url("") }}" token="{{ csrf_token() }}" class="btn_in_popup"><i class="glyphicon glyphicon-arrow-left"></i></button>
            @endif

            <div class="block_image"><img src="{{ asset('public/img/product/'.$detail_product->image) }}"></div>
            <h2>{{ $detail_product->name }}</h2>
            <div class=""></div>
            <p class="price">{{ format_curency( $detail_product->price ) }}</p>
            <div class="content">{{ $detail_product->description }}</div>
        </div>

        <div class="col-md-4" id="sidebar_post">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#info_popup" aria-controls="home" role="tab" data-toggle="tab">Thông tin</a></li>
                <li role="presentation"><a href="#comment_popup" aria-controls="profile" role="tab" data-toggle="tab">Bình luận</a></li>
                <li role="presentation"><a href="#post_popup" aria-controls="profile" role="tab" data-toggle="tab">Bài liên quan</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="info_popup">
                    {{ $detail_product->description }}
                </div>

                <div role="tabpanel" class="tab-pane" id="comment_popup">
                    <div class="fb-comments" data-href="{{ url('product/'.$detail_product->idproduct.'/'.$detail_product->alias) }}" data-width="100%" data-numposts="5"></div>
                </div>

                <div role="tabpanel" class="tab-pane" id="post_popup">
                    <div class="nn_item_menu"> 
                                            <div class="media">
                      <div class="media-left ">
                        <a href="http://localhost:8085/phuocthai/product/25/my-xao-hai-san">
                          <img class="media-object" src="http://localhost:8085/phuocthai/public/img/product/longtriCoBlAWzl_4.jpg" alt="món ngon phước thái">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Mỳ Xào Hải Sản</h4>
                        Công Nghệ Nano Việt Nam
                        <p>123 đ</p>
                      </div>
                    </div>
                                            <div class="media">
                      <div class="media-left ">
                        <a href="http://localhost:8085/phuocthai/product/23/dau-khuon-chien-gion">
                          <img class="media-object" src="http://localhost:8085/phuocthai/public/img/product/longtriComo3Ie2_6.jpg" alt="món ngon phước thái">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Đậu khuôn chiên giòn</h4>
                        ÁO MƯA DẠ QUANG
                        <p>0 đ</p>
                      </div>
                    </div>
                                            <div class="media">
                      <div class="media-left ">
                        <a href="http://localhost:8085/phuocthai/product/18/cuon-tom-mam-cai">
                          <img class="media-object" src="http://localhost:8085/phuocthai/public/img/product/longtriCo9BYB5a_1.jpg" alt="món ngon phước thái">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Cuốn Tôm Mắm Cái</h4>
                        Với thực đơn đa dạng gần 500 món ăn gồm: hải sản, các loại cá, thịt, rau, gỏi, lẩu, nướng, quay...
                        <p>0 đ</p>
                      </div>
                    </div>
                                        </div>

                </div>
            </div>
        </div>
    </div>
@endif