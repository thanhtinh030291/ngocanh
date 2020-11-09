$(document).ready(function() {

	$("#ennavatar").click(function(){
        $("#ennavatarfile").click();
    });
	$(".nneditcustomer").click(function(){ 
		$("#ennidCustomer").val($(this).attr('editid')) ;
		$("#enntitle").val($(this).attr('title')) ;
		$("#ennfullname").val($(this).attr('name')) ;
		$("input:radio[name=ennhide][value=" + $(this).attr('hide') + "]").attr('checked', 'checked');
		$("#ennmailcus").val($(this).attr('cusemail')) ;
		$("#ennphonecus").val($(this).attr('phone'));
		$("#ennaddcus").val($(this).attr('cusaddress'));
		$("#ennfacebook").val($(this).attr('cusaddress'));
		$("#ennaddcus").val($(this).attr('cusface'));
		$("#ennimguserold").val($(this).attr('imgo'));	
		$("#ennavatarfile").val("");
		$("#ennavatar").attr('src',"../../public/img/customers/"+$(this).attr('imgo'));
		$('.nn-modal-edit-Customer').modal('show');
	});
	$(".nndremovecus").click(function(){
		$("#dennidCustomer").val($(this).attr('editid')) ;
		$("#deletename").html($(this).attr('name')) ;
		$("#dennimgCustomer").val($(this).attr('imgo'));	
		$('.nn-modal-delete-Customer').modal('show');

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
