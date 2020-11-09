$(document).ready(function() {
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$("#ennavatar").click(function(){
	        $("#ennavatarfile").click();
	    });
	$("#nn-mod-news").change(function(){
		var idmodnew = $(this).val();
		$.get("listpro/"+idmodnew,function(data){
			$('#nn-list-new').html(data);		
		});
	});
	$("#enn-mod-news").change(function(){
		var idmodnew = $(this).val();
		$.get("listpro/"+idmodnew,function(data){
			$('#enn-list-new').html(data);		
		});
	});
	$(".nneditproduct").click(function(){
		$("#enn-loai-mon").val($(this).attr('type')) ;
		$("#ennidproduct").val($(this).attr('editid')) ;
		$("#ennunit").val($(this).attr('unit')) ;
		$("#ennsale").val($(this).attr('sale')) ;
		$("#enn-list-new").val($(this).attr('idlist')) ;
		$("#enn-mod-news").val($(this).attr('idmod')) ;
		$("#ennstatus").val($(this).attr('status')) ;
		$("#ennprovat").val($(this).attr('vat')) ;
		$("#ennimguserold").val($(this).attr('imgo'));		
		$("#ennavatarfile").val("");
		$("#ennavatar").attr('src',"../../public/img/product/"+$(this).attr('imgo'));
		$('.nn-modal-edit-product').modal('show');
	});
	$('.nndeditproduct').click(function(){ 
		$("#dennidnew").val($(this).attr('editid')) ;
		$("#deletename").html($(this).attr('name')) ;
		$("#dennimgnew").val($(this).attr('imgo'));	
		$('.nn-modal-delete-news').modal('show');
	});
	$(".nn_change_hide").click(function(){
		$(this).attr('disable');
		var ok = $(this);
		var idpr = $(this).parent().attr('editid');
    	var _token = $("form[name='edit_pro_form']").find("input[name='_token']").val();
		$.ajax({
    		url: "/admin/product/changehide",
    		type:"POST",
    		cache: false,
    		data:{
    			"_token":_token,
    			"idpr":idpr,
    		},
    		success:function(data){
    			if(data==1){
    				if(ok.hasClass('btn-info')){
    					ok.removeClass('btn-info').addClass('btn-warning').html('Ẩn');
    				}else{
    					ok.removeClass('btn-warning').addClass('btn-info').html('Hiện').attr('enable');
    				}
    			}else{
    				alert("Lỗi! vui lòng liên hệ WebMaster");
    			}
    		}
    	});
	});
});
function eshowimg(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#ennavatar')
        .attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$.fn.modal.Constructor.prototype.enforceFocus = function() {
  modal_this = this
  $(document).on('focusin.modal', function (e) {
    if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length 
    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') 
    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
      modal_this.$element.focus()
    }
  })
};