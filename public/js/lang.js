$(document).ready(function() {

	$("#ennavatar").click(function(){
        $("#ennavatarfile").click();
    });
	$(".nneditlang").click(function(){

		$("#ennidlang").val($(this).attr('editid')) ;
		$("#ennname").val($(this).attr('lname')) ;
		$("#ennchar").val($(this).attr('char')) ;
		$("#enncurrency").val($(this).attr('currency')) ;
		$("#ennimguserold").val($(this).attr('imgo'));
		$("#ennavatarfile").val("");
		$("#ennavatar").attr('src',"../../public/img/lang/"+$(this).attr('imgo'));
		$('.nn-modal-edit-lang').modal('show');
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