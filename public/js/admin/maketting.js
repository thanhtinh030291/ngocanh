$(document).ready(function(){
    $("#nnstartmaket").click(function(){
        $(this).button('loading');
    });
    $(".view_maketting").click(function(){
    	$("#contentmail").html($(this).attr('content'));
    	$("#enntitlemaketing").val($(this).attr('title'));
		$('.nn-modal-view-maketing').modal('show');
    });
});