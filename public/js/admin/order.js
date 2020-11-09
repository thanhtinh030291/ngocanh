$(document).ready(function() {
	$('#id_label_single').change(function(){
		var ok = $('option:selected', this);
		$('#nn-add-cus').html(ok.attr("cusaddress"));
		$('#nn-phone-cus').html(ok.attr("cusphone"));
		$('#nn-mail-cus').html(ok.attr("cusemail"));
	});
	// $("#nn-add-job").click(function(){
	// 	$(".add-product-new").remove();
	// });
	$(".nnaddproware").click(function(){	
		$(this).button('loading');
		var proid = $(this).attr('proid');
		var name = $(this).attr('namppro');
		var numprice = $(this).closest('tr').find('input[name="nn-don-gia-add"]').val();
		var notepro = $(this).closest('tr').find('input[name="nn-note-add"]').val();
		var numpro = $(this).closest('tr').find('input[name="nn-so-luong-add"]').val();
		var total = numpro * numprice;
		var now = $('#nn-total-add-pro').text();
		var alltotal =parseInt(now) + total;
		var html = "<tr class='add-product-new '>"
						+"<td class='col-sm-3'><input class='form-control' name='nnaddpname[]' value='"+name+"' readonly></td>"
						+"<td class='col-sm-1'><input class='form-control'  name='nnaddpnum[]' value='"+numpro+"' readonly></td>"
						+"<td class='col-sm-2'><input class='form-control'  name='nnaddpprice[]' value='"+numprice+"' readonly></td>"
						+"<td class='col-sm-2'><input class='form-control'  name='nnaddptotal[]' value='"+total+"' readonly></td>"
						+"<td class='col-sm-3'><input class='form-control'  name='nnaddpnote[]' value='"+notepro+"' readonly></td>"
						+"<td class='col-sm-1'><button class='btn btn-danger fa fa-trash nn-del-add-pro' total='"+total+"' > Xóa </button></td>"
						+"<input type='hidden' class='form-control' name='nnidproductadd[]' value='"+proid+"' readonly>"
					+"</tr>";
		$("#nn-pro-add-new").append(html);
		$('#nn-total-add-pro').text(alltotal);		
		$('#nntotalorder').val(alltotal);		
		setTimeout(function () {
	        $(".nnaddproware").button('reset');
	    }, 500);
	});

	$(document).on({
	    'show.bs.modal': function () {
	        var zIndex = 1040 + (10 * $('.modal:visible').length);
	        $(this).css('z-index', zIndex);
	        setTimeout(function() {
	            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
	        }, 0);
	    },
	    'hidden.bs.modal': function() {
	        if ($('.modal:visible').length > 0) {
	            setTimeout(function() {
	                $(document.body).addClass('modal-open');
	            }, 0);
	        }
	    }
	}, '.modal');
});
$(document).on("click", '.nn-del-add-pro',function(){
	var now1 = parseInt($('#nn-total-add-pro').text());
	var trnum = $(this).attr('total');
	$('#nn-total-add-pro').text(now1-trnum);
	$('#nntotalorder').val(now1-trnum);
	$(this).closest('tr').remove();
});