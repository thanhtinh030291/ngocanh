$(document).ready(function() {
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$("#nnchangesttorder").change(function(){
		var option = $(this).val();
		var text = $("#nnchangesttorder :selected").text();
		var sttn = $("#nnorderstt").val();
		var textn = $("#nnnamestt").val();
		if(sttn == 4 || sttn<option  ){
			var html = "<p style='color:green'>Bạn muốn chuyển đơn hàng từ trạng thái:</p>"
						+"<p><b>"+textn+"</b><i style='color:#ccc' > sang </i> <b>"+text+"</b></p><br>";
			$("#nnbodychange").html(html);
			$("#nnsubmitchange").show();
			$('.nn-modal-change-order').modal('show');
			$("#nnnewsttorder").val(option);
			$("#nnchangesttorder").val(sttn);
		}else{
			$("#nnsubmitchange").hide();	
			var html = "<p style='color:red'>Bạn không thể chuyển đơn hàng từ trạng thái:</p>"
						+"<p><b>"+textn+"</b><i style='color:#ccc' > sang </i> <b>"+text+"</b></p><br>";
			$("#nnbodychange").html(html);					
			$('.nn-modal-change-order').modal('show');
		}
	});	
	$(".nnaddproware").click(function(){
		$(this).button('loading');
    	var _token = $("form[name='edit_pro_form']").find("input[name='_token']").val();
    	var idorder = $("#nnidorder").val();    	
		var proid = $(this).attr('proid');
		var name = $(this).attr('namppro');
		var numprice = $(this).closest('tr').find('input[name="nn-don-gia-add"]').val();
		var notepro = $(this).closest('tr').find('input[name="nn-note-add"]').val();
		var numpro = $(this).closest('tr').find('input[name="nn-so-luong-add"]').val();
		var total = numpro * numprice;
		var ttaln = $("#nntotalorder").val();
		var ttok = parseInt(total) + parseInt(ttaln);
    	$.ajax({
    		url: "/admin/order/editadd",
    		type:"POST",
    		cache: false,
    		data:{
    			"_token":_token,
    			"name":name,
    			"quantity":numpro,
    			"price":numprice,
    			"total":total,
    			"idproduct":proid,
    			"idorder":idorder,
    			"note":notepro+" ",
    		},
    		success:function(data){
    			if(data>=1){
                    $(".nnaddproware").button('reset');
                    var html="<tr>"
                        +"<td>"+name+"</td>"
                        +"<td>"+numpro+"</td>"
                        +"<td>"+numprice+"</td>"
                        +"<td>"+total+"</td>"
                        +"<td>"+notepro+"</td><td class='center'><span class='nndelorderdetail btn btn-danger' iddetailpro='"+data+"' total='"+total+"' ><i class='fa fa-trash'></i> Xóa</span></td>"
                    +"</tr>";
                    $("#nnaddokproduct").append(html);
                    $("#nntotalorder").val(ttok);
                    $("#nnshowtotal").html(nnshowtotal(ttok));
    			}else{
    				alert("Lỗi! vui lòng liên hệ WebMaster");
    			}
    		}
    	});
	})
		
});

$(document).on("click", '.nndelorderdetail',function(){
	var idop = $(this).attr('iddetailpro');
	var total = $(this).attr('total');
	var ttaln = $("#nntotalorder").val();
	var ttok = parseInt(ttaln) - parseInt(total);
	$(this).button('loading');
	var zz =  $(this);
    var _token = $("form[name='edit_pro_form']").find("input[name='_token']").val();
    $.ajax({
    		url: "/admin/order/deladd",
    		type:"POST",
    		cache: false,
    		data:{
    			"_token":_token,
    			"idop":idop,
    		},
    		success:function(data){
    			if(data>=1){
                    zz.button('reset');
                    $("#nntotalorder").val(ttok);
                    $("#nnshowtotal").html(nnshowtotal(ttok));
                    zz.closest('tr').remove();
    			}else{
    				alert("Lỗi! vui lòng liên hệ WebMaster");
    			}
    		}
    	});
	
});

function nnshowtotal(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}