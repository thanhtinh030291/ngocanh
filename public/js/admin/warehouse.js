$(document).ready(function() {
	$(".nnpostinpro").click(function(){
		$("#myModalLabel").html("Nhập kho");
		$("#typepost").val(1);
		$("#nnnameproduct").val($(this).parent().attr('namep'));
		$("#nnpriceproduct").val($(this).parent().attr('price'));
		$("#nnnumproduct").val($(this).parent().attr('quantity'));
		$(".nnnamecate").html(" nhập");
		$("#nnenter").html("Nhập kho");
		var product = $(this).parent().attr('editid');
		$("#productid").val(product);
		$("#nnimgproduct").attr('src',"../../public/img/product/"+$(this).parent().attr('imgo'));
		$('.nn-modal-edit-warehouse').modal('show');
	});
	$(".xnndeditproduct").click(function(){
		$("#myModalLabel").html("Xuất kho");
		$("#typepost").val(2);
		$("#nnnameproduct").val($(this).parent().attr('namep'));
		$("#nnpriceproduct").val($(this).parent().attr('price'));
		$("#nnnumproduct").val($(this).parent().attr('quantity'));
		$(".nnnamecate").html(" xuất");
		$("#nnenter").html("Xuất kho");
		var product = $(this).parent().attr('editid');
		$("#productid").val(product);
		$("#nnimgproduct").attr('src',"../../public/img/product/"+$(this).parent().attr('imgo'));
		$('.nn-modal-edit-warehouse').modal('show');
	});
	$(".hnndeditproduct").click(function(){
		$("#myModalLabel").html("Hiệu chỉnh kho");
		$("#typepost").val(3);
		$("#nnproprice").val(0);
		$("#nnnameproduct").val($(this).parent().attr('namep'));
		$("#nnpriceproduct").val($(this).parent().attr('price'));
		$("#nnnumproduct").val($(this).parent().attr('quantity'));
		$(".nnnamecate").html(" hiệu chỉnh");
		$("#nnenter").html("Hiệu chỉnh kho");
		var product = $(this).parent().attr('editid');
		$("#productid").val(product);
		$("#nnimgproduct").attr('src',"../../public/img/product/"+$(this).parent().attr('imgo'));
		$('.nn-modal-edit-warehouse').modal('show');
	});
	$(".nnviewproduct").click(function(){	
		var getpro = $(this).attr('editid');	
		$("#productviewid").val(getpro);
		$("#nn-view-name-pro").html($(this).attr('namep'));
		$("#nn-view-price-pro").html($(this).attr('price'));
		$("#nn-view-quanty-pro").html($(this).attr('quantity'));
		$("#nn-view-cate-pro").html($(this).attr('cate'));
		$("#nnviewimgproduct").attr('src',"../../public/img/product/"+$(this).attr('imgo'));
		$(".nnviewappend").remove();
		$.get("history/"+getpro,function(data){
			$('#nnappendok').append(data);		
		});	
		$('.nn-view-warehouse').modal('show');

	});
});