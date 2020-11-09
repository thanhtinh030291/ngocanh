$(document).ready(function() {

	$("#ennavatar").click(function(){
        $("#ennavatarfile").click();
    });
	$(".nneditlistpro").click(function(){
		$("#enntheloai").val($(this).attr('listidmod'));
		$("#ennidlistpro").val($(this).attr('editid'));
		$("#elistname").val($(this).attr('name'));
		$("#ennnumber").val($(this).attr('num'));
		$("#enndescription").val($(this).attr('description'));
		$("#etype").val($(this).attr('type'));
		$("#ennimguserold").val($(this).attr('img'));		
		$("#ennavatarfile").val("");
		$("#ennavatar").attr('src',$(this).attr('imgo'));
		$('.nn-modal-edit-listpro').modal('show');
	});
	$(".nndeditlistpro").click(function(){
		$("#dennidlistpro").val($(this).attr('editid')) ;
		$("#deletename").html($(this).attr('title')) ;
		$("#dennimglistpro").val($(this).attr('img'));	
		$('.nn-modal-delete-listpro').modal('show');

	});
	$('.nnviewlangname').click(function(){
		$('.nn-add-view-language').modal('show');		
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