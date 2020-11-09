$(document).ready(function() {

	$("#ennavatar").click(function(){
        $("#ennavatarfile").click();
    });
	$(".nneditadvert").click(function(){
		$("#ennidadvert").val($(this).attr('editid')) ;
		$("input:radio[name=ennlang][value=" + $(this).attr('lang') + "]").attr('checked', 'checked');
		$("input:radio[name=ennhide][value=" + $(this).attr('hide') + "]").attr('checked', 'checked');
		$("input:radio[name=ennshowin][value=" + $(this).attr('area') + "]").attr('checked', 'checked');
		$("#ennlink").val($(this).attr('link'));
		$("#ennimguserold").val($(this).attr('imgo'));
		$("#ennavatarfile").val("");
		$("#ennavatar").attr('src',"../../public/img/advert/"+$(this).attr('imgo'));
		$('.nn-modal-edit-advert').modal('show');
	});
	$(".nndeditlistpro").click(function(){
		$("#dennidlistpro").val($(this).attr('editid')) ;
		$("#deletename").html($(this).attr('title')) ;
		$("#dennimglistpro").val($(this).attr('imgo'));	
		$('.nn-modal-delete-listpro').modal('show');

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