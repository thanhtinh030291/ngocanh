$(document).ready(function() {
	$(".nneditmodproduct").click(function(){
		$("#ennidmodproduct").val($(this).attr('editid')) ;
		// $("input:radio[name=ennlang][value=" + $(this).attr('lang') + "]").attr('checked', 'checked');		
		$("#emodname").val($(this).attr('name'));
		$("#ennnumber").val($(this).attr('num'));
		$("#ennimguserold").val($(this).attr('img'));
		$("#eiconold").val($(this).attr('icon'));	
		$("#ennavatar").attr('src',$(this).attr('imgo'));
		$("#enndescription").val($(this).attr('description'));
		$('.nn-modal-edit-modproduct').modal('show');
	});
	$(".nndeletemodproduct").click(function(){
		$("#dennidmodproduct").val($(this).attr('editid')) ;
		$("#deletename").html($(this).attr('name')) ;	
		$("#dennimgmod").val($(this).attr('img'));	
		$('.nn-modal-delete-modproduct').modal('show');

	});

	$("#ennavatar").click(function(){
        $("#ennavatarfile").click();
    });
    $("#eicon").click(function(){
        $("#iconfile").click();
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
function eshowicon(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#eicon')
        .attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}