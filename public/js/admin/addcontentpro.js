$(document).ready(function() {
    $('#addImage').click(function(){
    	$('#edit_insert_img').append("<div class='form-group'><input type='file' name='fImages_edit[]'></div>");
    });
    $("a#delete_img").click(function(){
    	var url= "delimg/";
    	var _token = $("form[name='edit_pro_form']").find("input[name='_token']").val();
    	var idImg = $(this).parent().find("img").attr("idhinh");
    	var img = $(this).parent().find("img").attr("src");
    	var rid = $(this).parent().find("img").attr("id");
    	$.ajax({
    		url: url+idImg,
    		type:"POST",
    		cache: false,
    		data:{
    			"_token":_token,
    			"idImg":idImg,
    			"urlImg":img
    		},
    		success:function(data){
    			if(data=='true'){
    				$('#'+rid).remove();
    			}else{
    				alert('Lỗi! Liên hệ Admin để giải đáp.');
    			}
    		}
    	});
    });


});