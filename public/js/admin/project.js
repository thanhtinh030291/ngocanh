$(document).ready(function() {

	$("#ennavatar").click(function(){
        $("#ennavatarfile").click();
    });
	$(".nneditslide").click(function(){

		$("#ennid").val($(this).attr('editid')) ;
		$("#enntitle").val($(this).attr('title')) ;
		$("input:radio[name=ennlang][value=" + $(this).attr('lang') + "]").attr('checked', 'checked');
		$("input:radio[name=ennhide][value=" + $(this).attr('hide') + "]").attr('checked', 'checked');
		$("#ennlink").val($(this).attr('link')) ;
		$("#ennnumber").val($(this).attr('num'));
		$("#ennimguserold").val($(this).attr('img'));		
		$("#ennavatarfile").val("");
		$("#ennavatar").attr('src',$(this).attr('imgo'));
		$('.nn-modal-edit-slide').modal('show');
	});
	$(".nndeditslide").click(function(){
		$("#dennid").val($(this).attr('editid')) ;
		$("#deletename").html($(this).attr('title')) ;
		$("#dennimg").val($(this).attr('img'));	
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