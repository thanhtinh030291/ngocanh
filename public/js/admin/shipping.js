$(document).ready(function() {
	$(".nneditmodproduct").click(function(){
		$("#ennidmodproduct").val($(this).attr('editid')) ;
		$("input:radio[name=ennlang][value=" + $(this).attr('lang') + "]").attr('checked', 'checked');		
		$("#emodname").val($(this).attr('name'));
		$("#ennnumber").val($(this).attr('num'));
		$("#ennpriceship").val($(this).attr('fee'));
		$('.nn-modal-edit-modproduct').modal('show');
	});
	$(".nndeletemodproduct").click(function(){
		$("#dennidmodproduct").val($(this).attr('editid')) ;
		$("#deletename").html($(this).attr('name')) ;	
		$('.nn-modal-delete-modproduct').modal('show');

	});
});