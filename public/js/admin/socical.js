$(document).ready(function() {
	$(".nneditsocical").click(function(){
		$("#ennidsocical").val($(this).attr('editid')) ;
		$("input:radio[name=ennlang][value=" + $(this).attr('lang') + "]").attr('checked', 'checked');
		$("input:radio[name=ennhide][value=" + $(this).attr('hide') + "]").attr('checked', 'checked');
		$("#ennname").val($(this).attr('name'));
		$("#ennicon").val($(this).attr('icon'));
		$("#ennlink").val($(this).attr('link'));
		$('.nn-modal-edit-socical').modal('show');
	});
	$(".nndeletesocical").click(function(){
		$("#dennidsocical").val($(this).attr('editid')) ;
		$("#deletename").html($(this).attr('name')) ;	
		$('.nn-modal-delete-socical').modal('show');

	});
});