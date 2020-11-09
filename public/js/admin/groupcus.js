$(document).ready(function() {

	$("#ennavatar").click(function(){
        $("#ennavatarfile").click();
    });
	$(".nneditgr").click(function(){
		$("#ennidlistpro").val($(this).attr('editid'));
		$("#elistname").val($(this).attr('name'));
		$("#ennnumber").val($(this).attr('num'));
		$("#ennimguserold").val($(this).attr('imgo'));		
		$("#ennavatarfile").val("");
		$("#ennavatar").attr('src',"../../public/img/customers/"+$(this).attr('imgo'));
		$('.nn-modal-edit-gr').modal('show');
	});
	$(".nndeditgr").click(function(){
		$("#dennidlistpro").val($(this).attr('editid')) ;
		$("#deletename").html($(this).attr('title')) ;
		$("#dennimglistpro").val($(this).attr('imgo'));	
		$('.nn-modal-delete-gr').modal('show');

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