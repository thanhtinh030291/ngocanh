$(document).ready(function() {
    $(".view_feedback").click(function(){
    	var name = $(this).parent().attr('name');
    	var mail = $(this).parent().attr('mail');
    	var content = $(this).parent().attr('content');
    	var date = $(this).parent().attr('date');
    	var html = "<h3>"+name+"</h3><p>Gửi từ: "+mail+"</p><p> Nội Dung: "+content+"</p><p><i>Ngày gửi: "+date+"</i></p>"; 
    	$("#content_feedback").html(html);
    	$(".nn-modal-view-feedback").modal('show');
    });
    $(".nndremovecus").click(function(){
		$("#dennidCustomer").val($(this).parent().attr('editid')) ;
		$("#deletename").html($(this).parent().attr('name')) ;	
		$('.nn-modal-delete-Customer').modal('show');
	});
});