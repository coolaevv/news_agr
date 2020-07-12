$('.load_news').click(function(){
	$('.content_news').css('display', 'none');
	let src = $(this).attr('href');
	$('.load_news').addClass('load_news-active');
   	$('.load_news').removeClass('load_news-active');
   	$(this).addClass('load_news-active');
   	$('.news').load(src);
   	if($('.preloader').css('display', 'block')){
   		$('.news').load(src);
   	}
	return false;
});