$(document).ready(function(){


    $("body").on("click",".share_link_fb, .btn_share_fb", function(){
      link = $(this).attr("href");
      FB.ui({
        method: 'share',
        href: link,
      }, function(response){});
      return false;
    })
    $(".share_link_gg").click(function() {
      link = $(this).attr("href")
      var myWindow = window.open('https://plus.google.com/share?url=' + link, "", "width=400,height=400");
      return false;
    });


    new UISearch( document.getElementById( 'sb-search' ) );
    

    $('[data-toggle="tooltip"]').tooltip(); 


    $(window).load(function(){
        // $('#nn-quang-cao').modal('show');
    });
    if ($('#back-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-top').addClass('show');
                } else {
                    $('#back-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }



    $(".button_show_setting").click(function(){
        if($(".wrapper_setting").hasClass("show")){
            $(".wrapper_setting").animate({
                        left: -$(".wrapper_setting").width()-20
                    })
            $(".wrapper_setting").removeClass("show")
        }else{
            $(".wrapper_setting").animate({
                        left: '0'
                    })
            $(".wrapper_setting").addClass("show")
        }
    })

    // menu
     $(".button_show_menu").click(function(){
        if($(".wrapper_menu").hasClass("show")){
            $(".wrapper_menu").animate({
                  left: -$(".wrapper_menu").width()-20
              })
            $(".wrapper_menu").removeClass("show")
            $(".container").css( "opacity","1")    
        }else{
            $(".wrapper_menu").animate({
                  left: '0'
              })
            $(".wrapper_menu").addClass("show")
            $(".container").css( "opacity","0.5")                       
                                  
        }
    }) 
      $(".container").click(function(){
        if($(".wrapper_menu").hasClass("show")){
            $(".wrapper_menu").animate({
              left: -$(".wrapper_menu").width()-20
            })
            $(".wrapper_menu").removeClass("show")
            $(".container").css( "opacity","1")  
        }
    })





    // $.fancybox.open('#popup_main');




    // $('.bxslider').bxSlider({
    //     touchEnabled: true,
    //     preventDefaultSwipeX: true,
    //     controls:false,
    //     minSlides: 1,
    //     maxSlides: 4,
    //     slideWidth: 275,
    //     slideMargin: 10,
    //     moveSlides: 1
    // });



    // $(function() {
    //   fr = new FilmRoll({
    //     container: '#film_roll',
    //     vertical_center: false,
    //   });
    // });
    $(".nn-ct-cate-col").hover(
      function() {
        $(this).children(" .nn-ct-cate-p" ).addClass( "nn-ct-cate-p-hover" );
      }, function() {
        $(this).children(" .nn-ct-cate-p").removeClass( "nn-ct-cate-p-hover" );
      }
);



    $('.slick_product_new').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
    $('#responsive-sale').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });       

    $('.product_sidebar').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });       
        

    $(".btn_toggle_bar").click(function(){
      btn = $(this).find(".fa")
      if(btn.hasClass("fa-angle-right")){
        btn.removeClass("fa-angle-right")
        btn.addClass("fa-angle-down")
      }else{
        btn.removeClass("fa-angle-down")
        btn.addClass("fa-angle-right")
      }
    })


    $("#btn_register").click(function(){
      // $(".block_register").removeClass("col-md-6").addClass("col-md-12");
      // $(".block_login").hide();
      // $(".content_before_register").hide();
      // $(".content_after_register").show();
      // return false;
    })

    $(".sub_qty").click(function(){
      cur = $(this).parent().find(".qty_in_cart");
      if(cur.val() - 1 > 0){
      cur.val( parseInt(cur.val()) - 1 );
      }
      return false;
    })

    $(".add_qty").click(function(){
      cur = $(this).parent().find(".qty_in_cart");
      cur.val( parseInt(cur.val()) + 1 );
      return false;
    })








    $(".block_choose_account .btn_choose").click(function(){
        id = $(this).attr("link");
        $(".block_choose_account .form_user").hide();
        $(id).show();

        $(".block_choose_account .btn_choose").removeClass("active")
        $(this).addClass("active")

        return false;
    })





    $(".block_thanhtoan .item_radio input[type='radio']").change(function(){
      content = $(this).parent(".item_radio").find(".content_item_check")
      $(".content_item_check").slideUp()
      content.slideDown()
    })

    // $(".item_checkbox button").click(function(){
    //   $(this).parents(".group_item_checkbox").find("input").removeAttr("checked")
    //   $(this).parent(".item_checkbox").find("input").attr("checked","checked")

    //   content = $(this).parent(".item_checkbox").find(".content_item_check")
    //   $(".content_item_check").slideUp()
    //   content.slideDown()
    // })




    $(".btn_add_cart").click(function(e){
      e.preventDefault()

      idproduct  = $(this).attr('idproduct')
      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token')

      $.ajax({
          url: base_url+'/addcart_ajax/'+idproduct,
          type:'GET',
          cache:false,
          data:{"_token":token, "idproduct":idproduct },
          success:function(data){
            $('#modal_main_title').html("")
            $('#modal_main_content').html("<div class='bg-success alert_add_cart'>"+data+"</div>")
            $('#modal_main').modal('show')
          }
      })

      return false

    })


    $(".sub_qty,  .add_qty").click(function(e){
      e.preventDefault()

      rowid     = $(this).attr('rowid')
      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token')
      qty       = $(this).parents(".block_qty_cart").find(".qty_in_cart").val()
      subtotal  = $(this).parents(".item_cart").find(".subtotal span")
      price_cart = $(this).parents(".item_cart").find(".price_cart span")

      sub_qty = $(this).parents(".item_cart").find(".sub_qty")
      add_qty = $(this).parents(".item_cart").find(".add_qty")
      btn_delete = $(this).parents(".item_cart").find(".delete a")


      sub_qty.button('loading')
      add_qty.button('loading')
 
      $.ajax({
          url: base_url+'/updatecart_ajax',
          type:'GET',
          cache:false,
          data:{"_token":token, "rowid":rowid, "qty":qty },
          success:function(data){ 
            result = jQuery.parseJSON(data);
            $(btn_delete).attr("href",result.link_delete)
            $(sub_qty).attr("rowid",result.rowid)
            $(add_qty).attr("rowid",result.rowid)
            $(".tamtinh_cart span").html(result.subtotal)
            $(".thanhtien_cart span").html(result.total)
            $(subtotal).html(result.totalitem)
            $(price_cart).html(result.priceitem)

            sub_qty.button('reset')
            add_qty.button('reset')
          }
      }) 
    })


    $("#select_city").change(function(e){
      e.preventDefault()

      idcity    = $(this).val()
      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token')
      $("#select_district").html("")
      $("#select_ward").html("")
 
      $.ajax({
          url: base_url+'/select_distict_ajax',
          type:'GET',
          cache:false,
          data:{"_token":token, "idcity":idcity },
          success:function(data){ 
            $("#select_district").html(data)
          }
      }) 
    })

    $("#select_district").change(function(e){
      e.preventDefault()

      iddistrict = $(this).val()
      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token')
 
      $.ajax({
          url: base_url+'/select_ward_ajax',
          type:'GET',
          cache:false,
          data:{"_token":token, "iddistrict":iddistrict },
          success:function(data){ 
            $("#select_ward").html(data)
          }
      }) 
    })



    $("#btn_login").click(function(e){
      e.preventDefault()

      email     = $("#txtEmailLogin").val()
      pass      = $("#txtPassLogin").val()
      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token')
      page_return  = $(this).attr('page_return')

      $(".alert_login").html("Loading...")
 
      $.ajax({
          url: base_url+'/login_ajax',
          type:'GET',
          cache:false,
          data:{"_token":token, "email":email, "pass":pass },
          success:function(data){
            if(data == 1){
              window.location.href = base_url + "/" + page_return
            }else{
              $(".alert_login").html("Đăng nhập không thành công!")
            }
          }
      }) 
    })




    $("#btn_register").click(function(e){
      e.preventDefault()

      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token')
      page_return  = $(this).attr('page_return')

      $(".alert_login").html("Loading...")
 
      fullname      = $("#txtFullnam_register").val()
      phone         = $("#txtPhone_register").val()
      email         = $("#txtEmail_register").val()
      address       = $("#txtAddress_register").val()
      password      = $("#txtPassword_register").val()
      repassword    = $("#txtRePassword_register").val()
 
      $.ajax({
          url: base_url+'/register_ajax',
          type:'GET',
          cache:false,
          data:{"_token":token, 
              "fullname":fullname, 
              "phone":phone, 
              "email":email, 
              "address":address, 
              "password":password, 
              "repassword":repassword },
          success:function(data){
            result = jQuery.parseJSON(data);

            $(".block_register .error").html("")
            err = 0;
            if(result.fullname != ""){
              $("#txtFullnam_register + span").html(result.fullname)
              err = 1;
            }
            if(result.phone != ""){
              $("#txtPhone_register + span").html(result.phone)
              err = 1;
            }
            if(result.email != ""){
              $("#txtEmail_register + span").html(result.email)
              err = 1;
            }
            if(result.address != ""){
              $("#txtAddress_register + span").html(result.address)
              err = 1;
            }
            if(result.password != ""){
              $("#txtPassword_register + span").html(result.password)
              err = 1;
            }
            if(result.repassword != ""){
              $("#txtRePassword_register + span").html(result.repassword)
              err = 1;
            }

            if(err == 0 && result.success == 1){
              window.location.href = base_url + "/" + page_return
            }else{
              $(".alert_login").html("Đăng ký không thành công!")
            }

          }
      }) 
    })



    $("#btn_ok_giaohang").click(function(e){
      e.preventDefault()

      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token')

      if($("#same_address").is(':checked')){
        $.ajax({
          url: base_url+'/store_address_shipping',
          type:'GET',
          cache:false,
          data:{"_token":token, "same_address":1 },
          success:function(data){
            window.location.href = base_url + "/thanhtoan"
          }
        }) 
      }else{
        name             = $("#txtFullname_Giaohang").val()
        phone            = $("#txtPhone_Giaohang").val()
        fulladdress      = $("#txtFullAddress_Giaohang").val()
        address          = $("#txtAddress_Giaohang").val()
        select_city      = $("#select_city").val()
        select_district  = $("#select_district").val()
        select_ward      = $("#select_ward").val()
   
        $.ajax({
            url: base_url+'/store_address_shipping',
            type:'GET',
            cache:false,
            data:{"_token":token, 
                  "same_address":0,
                  "name":name,
                  "phone":phone,
                  "fulladdress":fulladdress,
                  "address":address,
                  "select_city":select_city,
                  "select_district":select_district,
                  "select_ward":select_ward },
            success:function(data){
              result = jQuery.parseJSON(data);

              $(".form_giaohang .error").html("")
              err = 0;
              if(result.name != ""){
                $("#txtFullname_Giaohang + span").html(result.name)
                err = 1;
              }
              if(result.phone != ""){
                $("#txtPhone_Giaohang + span").html(result.phone)
                err = 1;
              }
              if(result.address != ""){
                $("#txtAddress_Giaohang + span").html(result.address)
                err = 1;
              }
              if(result.select_city != ""){
                $("#select_city + span").html(result.select_city)
                err = 1;
              }
              if(result.select_district != ""){
                $("#select_district + span").html(result.select_district)
                err = 1;
              }

              if(err == 0){ 
                window.location.href = base_url + "/thanhtoan"
              }

            }
        })  
      }

    })


    $("#btn_ok_address_thanhtoan").click(function(e){
      e.preventDefault()
 
        name             = $("#txtFullname_Pay").val()
        phone            = $("#txtPhone_Pay").val()
        fulladdress      = $("#txtFullAddress_Pay").val()
        address          = $("#txtAddress_Pay").val() 
        select_city      = $("#select_city").val()
        select_district  = $("#select_district").val()
        select_ward      = $("#select_ward").val()

        base_url  = $(this).attr('base_url')
        token     = $(this).attr('token')
   
        $.ajax({
            url: base_url+'/store_address_pay',
            type:'GET',
            cache:false,
            data:{"_token":token, 
                  "name":name,
                  "phone":phone,
                  "fulladdress":fulladdress,
                  "address":address,
                  "select_city":select_city,
                  "select_district":select_district,
                  "select_ward":select_ward },
            success:function(data){
              result = jQuery.parseJSON(data);

              $(".form_pay .error").html("")
              err = 0;
              if(result.name != ""){
                $("#txtFullname_Pay + span").html(result.name)
                err = 1;
              }
              if(result.phone != ""){
                $("#txtPhone_Pay + span").html(result.phone)
                err = 1;
              }
              if(result.address != ""){
                $("#txtAddress_Pay + span").html(result.address)
                err = 1;
              }
              if(result.select_city != ""){
                $("#select_city + span").html(result.select_city)
                err = 1;
              }
              if(result.select_district != ""){
                $("#select_district + span").html(result.select_district)
                err = 1;
              }

              if(err == 0){ 
                window.location.href = base_url + "/giaohang"
              }

            }
        }) 

    })





    $("#btn_datmua").click(function(e){
      e.preventDefault()

      btn = $(this)
      btn.button('loading')

      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token')

      // val_date_order_at =  $('#val_date_order_at').val();
      txtNameOrder      =  $('#txtNameOrder').val();
      txtPhoneOrder     =  $('#txtPhoneOrder').val();
      txtEmailOrder     =  $('#txtEmailOrder').val();
      // sltCountpeople    =  $('#sltCountpeople').val();

      txtNameOrder      =  $('#txtNameOrder').val();
      txtPhoneOrder     =  $('#txtPhoneOrder').val();
      // sltCountpeople    =  $('#sltCountpeople').val();
      comment       =  $('#txtComment').val();

      type_payment  =  $('.block_thanhtoan input[name="check_block2"]:checked').attr("typepayment");
      idpayment     =  $('.block_thanhtoan input[name="check_block2"]:checked').attr("idpayment");
      idshipping    =  $('.block_thanhtoan input[name="check_block1"]:checked').attr("idshipping");

      err = 0;
      $(".content_checkout_thanhtoan .error").html("")
      if(typeof idpayment == 'undefined'){
        $(".error_payment").html('Hãy chọn hình thức thanh toán')
        err = 1
      }
      if(typeof idshipping == 'undefined'){
        $(".error_shipping").html('Hãy chọn hình thức vận chuyển')
        err = 1
      }
      // if(val_date_order_at == ""){
      //   $("#val_date_order_at + span").html('Bạn đặt vào ngày nào?')
      //   err = 1
      // }
      if(txtNameOrder == ""){
        $("#txtNameOrder + span").html('Tên của bạn?')
        err = 1
      }
      if(txtPhoneOrder == "" || isNaN(txtPhoneOrder)){
        $("#txtPhoneOrder + span").html('Số điện thoại của bạn?')
        err = 1
      }
      if(txtEmailOrder == ""){
        $("#txtEmailOrder + span").html('Nhập email của bạn?')
        err = 1
      }
      // if(sltCountpeople == ""){
      //   $("#sltCountpeople + span").html('Bạn đặt món cho bao nhiêu người?')
      //   err = 1
      // }

      if(err == 0){
        if(type_payment == "creditcart"){
          payment_credit_type     = $("#payment_credit_type").val()
          payment_credit_number   = $("#payment_credit_number").val()
          payment_credit_name     = $("#payment_credit_name").val()
          payment_credit_expdate  = $("#payment_credit_expdate").val()
          payment_credit_cvv2     = $("#payment_credit_cvv2").val()

          $("#form_creditcart .error").html("")
          err_cart = 0;
          if(payment_credit_number == ""){
            $("#payment_credit_number + span").html("Số thẻ lỗi")
            err_cart = 1;
          }
          if(payment_credit_name == ""){
            $("#payment_credit_name + span").html("Tên in trên thẻ lỗi")
            err_cart = 1;
          }
          if(payment_credit_expdate == ""){
            $("#payment_credit_expdate + span").html("Ngày hết hạn của thẻ lỗi")
            err_cart = 1;
          }
          if(payment_credit_cvv2 == ""){
            $("#payment_credit_cvv2 + span").html("Mã bảo mật lỗi")
            err_cart = 1;
          }

          if(err_cart == 0){
            $.ajax({
                url: base_url+'/check_payment_creaditcart',
                type:'GET',
                cache:false,
                data:{"_token":token,  
                      "idshipping":idshipping,
                      "payment_credit_type":payment_credit_type,
                      "payment_credit_number":payment_credit_number,
                      "payment_credit_name":payment_credit_name,
                      "payment_credit_expdate":payment_credit_expdate,
                      "payment_credit_cvv2":payment_credit_cvv2 },
                success:function(data){
                  btn.button('reset')
                  if(data == 1){ 
                      $.ajax({
                          url: base_url+'/submit_order',
                          type:'GET',
                          cache:false,
                          data:{"_token":token, 
                                // "val_date_order_at":val_date_order_at,
                                "txtNameOrder":txtNameOrder,
                                "txtPhoneOrder":txtPhoneOrder,
                                "txtEmailOrder":txtEmailOrder,
                                // "sltCountpeople":sltCountpeople,
                                 "idpayment":idpayment, "idshipping":idshipping, "comment":comment },
                          success:function(data){
                            btn.button('reset')
                            if(data == 1){
                              window.location.href = base_url + "/ok"
                            }else{
                              alert("Lỗi Đặt Hàng \n" + data)
                            }
                          }
                      }) 
                  }else{
                    alert("Lỗi CreditCart \n" + data)
                  }
                }
            })
          }else{
            btn.button('reset')
          }

        }else if(type_payment == "atm"){
          //ATM
        }else{ 
            $.ajax({
                url: base_url+'/submit_order',
                type:'GET',
                cache:false,
                data:{"_token":token, 
                      // "val_date_order_at":val_date_order_at,
                      "txtNameOrder":txtNameOrder,
                      "txtPhoneOrder":txtPhoneOrder,
                      "txtEmailOrder":txtEmailOrder,
                      // "sltCountpeople":sltCountpeople,
                      "idpayment":idpayment, "idshipping":idshipping, "comment":comment },
                success:function(data){
                  if(data == 1){
                    window.location.href = base_url + "/ok"
                  }
                }
            })  
        }
      }else{
        btn.button('reset')
      }
      

      


    })


    $("#continue_order_not_login").click(function(e){
      e.preventDefault() 

      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token') 

      $.ajax({
          url: base_url+'/order_not_account',
          type:'GET',
          cache:false,
          data:{"_token":token },
          success:function(data){
            // window.location.href = base_url + "/pay"
            window.location.href = base_url + "/thanhtoan"
          }
      })  

    })

    $(".radio_shipping").change(function(e){
      e.preventDefault() 

      if($(this).is(':checked')){

        idshipping = $(this).attr('idshipping');
        base_url  = $(this).attr('base_url')
        token     = $(this).attr('token') 

        $.ajax({
            url: base_url+'/get_shipping_fee',
            type:'GET',
            cache:false,
            data:{"_token":token, "idshipping":idshipping },
            success:function(data){
              $(".vanchuyen_cart span").html(data);
            }
        })  

      }

    })



    $("#same_address").change(function(){
      if(this.checked){
        $(".form_giaohang input[type=text]").attr("disabled","disabled");
        $(".form_giaohang textarea").attr("disabled","disabled");
        $(".form_giaohang select").attr("disabled","disabled");
      }else{
        $(".form_giaohang input[type=text]").removeAttr("disabled","disabled");
        $(".form_giaohang textarea").removeAttr("disabled","disabled");
        $(".form_giaohang select").removeAttr("disabled","disabled");
      }
    })



    $(".eagle-gallery").eagleGallery();



    $(".listnews").hover(function(){
      for_list = $(this).attr("for_list");
 
      $(this).parents(".wrapper_content_listnews").find(".content_listnews").hide();
      $("#"+for_list).show(); 
      // $(this).parents(".wrapper_content_listnews").find(".listnews").css("background","#fff");
      // $(this).css("background","#f5f5f5");
  
    })

    $(".listproducts").hover(function(){
      for_list = $(this).attr("for_list");

      $(this).parents(".wrapper_content_listproducts").find(".content_listproducts").hide();
      $("#"+for_list).show();
      // $(this).parents(".wrapper_content_listproducts").find(".listproducts").css("background","#fff");
      // $(this).css("background","#f5f5f5");

    })




    $("#btn_save_custommer_info").click(function(e){
      e.preventDefault()

      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token')
      page_return  = $(this).attr('page_return')

      $(".alert_login_info").html("Loading...")
 
      fullname      = $("#txtFullname_Cus1").val()
      phone         = $("#txtPhone_Cus1").val()
 
      $.ajax({
          url: base_url+'/save_custommer_info',
          type:'GET',
          cache:false,
          data:{"_token":token, 
              "fullname":fullname, 
              "phone":phone},
          success:function(data){
            result = jQuery.parseJSON(data);

            $("#form_info .error").html("")
            err = 0;
            if(result.fullname != ""){
              $("#txtFullname_Cus1 + span").html(result.fullname)
              err = 1;
            }
            if(result.phone != ""){
              $("#txtPhone_Cus1 + span").html(result.phone)
              err = 1;
            } 

            if(err == 0){
              $(".alert_login_info").html("Lưu thành công!")
            }else{
              $(".alert_login_info").html("Lưu không thành công!")
            }

          }
      }) 
    })


    $("#btn_save_custommer_address").click(function(e){
      e.preventDefault()

      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token')
      page_return  = $(this).attr('page_return')

      $(".alert_login_address").html("Loading...")
 
      address             = $("#txtAddress_Cus2").val()
      select_city         = $("#select_city").val()
      select_district     = $("#select_district").val()
      select_ward         = $("#select_ward").val()
 
      $.ajax({
          url: base_url+'/save_custommer_address',
          type:'GET',
          cache:false,
          data:{"_token":token, 
              "address":address, 
              "select_city":select_city, 
              "select_district":select_district, 
              "select_ward":select_ward},
          success:function(data){
            result = jQuery.parseJSON(data);

            $("#form_address .error").html("")
            err = 0;
            if(result.address != ""){
              $("#address + span").html(result.address)
              err = 1;
            }
            if(result.select_city != ""){
              $("#select_city + span").html(result.select_city)
              err = 1;
            } 
            if(result.select_district != ""){
              $("#select_district + span").html(result.select_district)
              err = 1;
            }

            if(err == 0){
              $(".alert_login_address").html("Lưu thành công!")
              $("#txtFulladdress").val(result.fulladdress);
            }else{
              $(".alert_login_address").html("Lưu không thành công!")
            }

          }
      }) 
    })


    $("#btn_save_custommer_pass").click(function(e){
      e.preventDefault()

      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token')
      page_return  = $(this).attr('page_return')

      $(".alert_login_pass").html("Loading...")
 
      oldPassword         = $("#txtOldpassword").val()
      newPassword         = $("#txtNewpassword").val()
      rePassword          = $("#txtRepassword").val()
 
      $.ajax({
          url: base_url+'/save_custommer_pass',
          type:'GET',
          cache:false,
          data:{"_token":token, 
              "oldPassword":oldPassword, 
              "newPassword":newPassword, 
              "rePassword":rePassword},
          success:function(data){
            result = jQuery.parseJSON(data);

            $("#form_pass .error").html("")
            err = 0;
            if(result.oldPassword != ""){
              $("#txtOldpassword + span").html(result.oldPassword)
              err = 1;
            }
            if(result.newPassword != ""){
              $("#txtNewpassword + span").html(result.newPassword)
              err = 1;
            } 
            if(result.rePassword != ""){
              $("#txtRepassword + span").html(result.rePassword)
              err = 1;
            }  

            if(err == 0){
              $(".alert_login_pass").html("Lưu thành công!")
            }else{
              $(".alert_login_pass").html("Lưu không thành công!")
            }

          }
      }) 
    })


    $("#filter_product").click(function(e){
      e.preventDefault()

      base_url  = $(this).attr('base_url') 

      color = "";

      i = 0
      if($("#vang").is(':checked')){
        color += $("#vang").attr("color")+","
      }
      if($("#tim").is(':checked')){
        color += $("#tim").attr("color")+","
      }
      if($("#do").is(':checked')){
        color += $("#do").attr("color")+","
      }
      if($("#luc").is(':checked')){
        color += $("#luc").attr("color")+","
      }
      if($("#lam").is(':checked')){
        color += $("#lam").attr("color")+","
      }
      if($("#cam").is(':checked')){
        color += $("#cam").attr("color")+","
      }
      if($("#trang").is(':checked')){
        color += $("#trang").attr("color")+","
      }
      if($("#den").is(':checked')){
        color += $("#den").attr("color")+","
      }


      range = $("#range_price_filter").val();

      window.location.href = base_url + "/filter?color=" + color + "&range=" + range


    })

    $("#select_productstt").change(function(e){
      e.preventDefault()

      stt         = $(this).val();
      base_url    = $(this).attr('base_url');
      path_type   = $(this).attr('path_type');
      path_id     = $(this).attr('path_id');

      color     = $(this).attr('color');
      range     = $(this).attr('range');

      key     = $(this).attr('key');

      if(path_type == "category"){
        path = base_url + "/" + path_type + "/" + path_id + "?page=1&stt=" + stt
      }else if(path_type == "filter"){
        path = base_url + "/" + path_type + "?page=1&color=" + color + "&range=" + range + "&stt=" + stt
      }else if(path_type == "search"){
        path = base_url + "/" + path_type + "?page=1&key=" + key + "&stt=" + stt
      }
      window.location.href = path

    })


    
    $("#range_price_filter").slider({});


$("#range_price_filter").change(function(){

      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token')
 
      range = $("#range_price_filter").val()
 
      $.ajax({
          url: base_url+'/get_price_range',
          type:'GET',
          cache:false,
          data:{"_token":token, 
              "range":range },
          success:function(data){
            result = jQuery.parseJSON(data);

            $("#range_min").html(result.range_min) 
            $("#range_max").html(result.range_max)

          }
      }) 
})




    $("#btn_contact").click(function(e){
      e.preventDefault()

      base_url  = $(this).attr('base_url')
      token     = $(this).attr('token')
      page_return  = $(this).attr('page_return')

      $(".alert_login").html("Loading...")
 
      name             = $("#txtNameContact").val()
      email            = $("#txtEmailContact").val()
      content          = $("#txtContentContact").val()
 
      $.ajax({
          url: base_url+'/save_contact',
          type:'GET',
          cache:false,
          data:{"_token":token, 
              "name":name, 
              "email":email, 
              "content":content},
          success:function(data){
            result = jQuery.parseJSON(data);

            $(".block_contact .error").html("")
            err = 0;
            if(result.name != ""){
              $("#txtNameContact + span").html(result.name)
              err = 1;
            }
            if(result.email != ""){
              $("#txtEmailContact + span").html(result.email)
              err = 1;
            } 
            if(result.content != ""){
              $("#txtContentContact + span").html(result.content)
              err = 1;
            }  

            if(err == 0){
              $(".alert_login").html("Gửi thành công!")

              $('#modal_main_title').html("")
              $('#modal_main_content').html("<div class='bg-success alert_add_cart'>Gửi thành công!</div>")
              $('#modal_main').modal('show')

              $("#txtNameContact").val("")
              $("#txtEmailContact").val("")
              $("#txtContentContact").val("")
 

            }else{
              $(".alert_login").html("Gửi không thành công!")
            }

          }
      }) 
    })

 
$(".chat_fb").click(function() {
   $('.fchat').toggle('slow');
});



})

