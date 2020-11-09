$(document).ready(function() {
        $("#ennuser3").trigger('click');

	$("#ennavatar").click(function(){
        $("#ennavatarfile").click();
    });
	$(".nnedituser").click(function(){
		$("#enniduser").val($(this).parent().attr('editid')) ;
		$("#ennusername").val($(this).parent().attr('uname')) ;
		$("#ennfullname").val($(this).parent().attr('fname')) ;
		$("#ennaddress").val($(this).parent().attr('addr')) ;
		$("#ennphone").val($(this).parent().attr('phone')) ;
		$("#ennhometown").val($(this).parent().attr('htown')) ;
		$("#ennnote").val($(this).parent().attr('note'));
		$("#ennbirthday").val($(this).parent().attr('bday'));
		$("input:radio[name=ennlevel][value=" + $(this).parent().attr('level') + "]").attr('checked', 'checked');
		$("#ennimguserold").val($(this).parent().attr('imgo'));
		$("#ennavatarfile").val("");
		$("#ennavatar").attr('src',"../../public/img/user/"+$(this).parent().attr('imgo'));
		$('.nn-edit-user').modal('show');
	});
	$('.enndeleteusser').click(function(){
		$("#enndeleteuid").val($(this).parent().attr('editid')) ;
		$("#deletename").html($(this).parent().attr('fname')) ;
		$("#dennimgslide").val($(this).parent().attr('imgo'));	
		$('.nn-modal-delete-user').modal('show');
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