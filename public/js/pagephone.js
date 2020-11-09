$(document).ready(function() {
	$("#nn-select-wp").on("change",function(){
		var list = this.value;		
		if(list<=4){
			$(".nn-info-work-phone").addClass("nn-visible-wp");
			$(".nn-stt-wp-"+list).removeClass("nn-visible-wp");
		}else{
			$(".nn-info-work-phone").removeClass("nn-visible-wp");
		}
		
	});
});