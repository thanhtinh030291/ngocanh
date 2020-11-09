$(document).ready(function() {
	$("#ennavatar").click(function(){
        $("#ennavatarfile").click();
    });
	$("#nn-mod-news").change(function(){
		var idmodnew = $(this).val();
		$.get("listnews/"+idmodnew,function(data){
			$('#nn-list-new').html(data);		
		});
	});
	$("#enn-mod-news").change(function(){
		var idmodnew = $(this).val();
		$.get("listnews/"+idmodnew,function(data){
			$('#enn-list-new').html(data);		
		});
	});
	$(".nneditnew").click(function(){
		$("#enn-mod-news").val($(this).attr('idmod')) ;
		$("#enn-list-new").val($(this).attr('idlistnew')) ;
		
		$("#ennidnews").val($(this).attr('idlistnew')) ;
		$("#ennidnews").val($(this).attr('editid')) ;
		$("#enntitlenew").val($(this).attr('name')) ;
		$("#ennyoutubenew").val($(this).attr('newvideo')) ;
		$("#ennkeywords").val($(this).attr('newkeywords')) ;
		$("#enntagnew").val($(this).attr('newtag')) ;
		$("#enntomtatnew").val($(this).attr('intro')) ;
		 CKEDITOR.instances.enncontentnew.setData($(this).attr('newcontent'));
		$("#ennimguserold").val($(this).attr('imgo'));		
		$("#ennavatarfile").val("");
		$("#ennavatar").attr('src',"../../public/img/news/"+$(this).attr('imgo'));
		$('.nn-modal-edit-news').modal('show');
	});
	$('.nndeditnew').click(function(){
		$("#dennidnew").val($(this).attr('editid')) ;
		$("#deletename").html($(this).attr('title')) ;
		$("#dennimgnew").val($(this).attr('imgo'));	
		$('.nn-modal-delete-news').modal('show');
	})
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
$.fn.modal.Constructor.prototype.enforceFocus = function() {
  modal_this = this
  $(document).on('focusin.modal', function (e) {
    if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length 
    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') 
    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
      modal_this.$element.focus()
    }
  })
};