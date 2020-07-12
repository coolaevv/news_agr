$('.full').click(function(){
	$(this).prev().slideToggle();
	$(this).fadeOut();
	return false;
})