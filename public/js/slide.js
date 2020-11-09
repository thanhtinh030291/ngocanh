$(document).ready(function() {

	$("#ennavatar").click(function(){
        $("#ennavatarfile").click();
    });
	$(".nneditslide").click(function(){

		$("#ennidslide").val($(this).attr('editid')) ;
		$("#enntitle").val($(this).attr('title')) ;
		$("input:radio[name=ennlang][value=" + $(this).attr('lang') + "]").attr('checked', 'checked');
		$("input:radio[name=ennhide][value=" + $(this).attr('hide') + "]").attr('checked', 'checked');
		$("#ennlinknew").val($(this).attr('linknew')) ;
		$("#ennyoutube").val($(this).attr('linkyou'));
		$("#ennnumber").val($(this).attr('num'));
		$("#ennimguserold").val($(this).attr('imgo'));		
		$("#ennavatarfile").val("");
		$("#ennavatar").attr('src',"../../public/img/slide/"+$(this).attr('imgo'));
		$('.nn-modal-edit-slide').modal('show');
	});
	$(".nndeditslide").click(function(){
		$("#dennidslide").val($(this).attr('editid')) ;
		$("#deletename").html($(this).attr('title')) ;
		$("#dennimgslide").val($(this).attr('imgo'));	
		$('.nn-modal-delete-slide').modal('show');

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