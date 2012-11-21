$(function(){
	$('.clear_input').each(function() {
		var default_value = this.value;
		$(this).focus(function(){
			if(this.value == default_value) {
				this.value = '';
			}
		});
	
		$(this).blur(function(){
			if(this.value == '') {
				this.value = default_value;
			}
		});
	});
	$(".fm_desc").hide();
	$(".fm_title").click(function () {
		$(this).parent().children(".fm_desc").slideToggle();
	});

});