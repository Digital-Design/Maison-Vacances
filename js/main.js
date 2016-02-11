$('a[href^="#"]').click(function(){
	var the_id = $(this).attr("href");
	$('html, body').animate({
		scrollTop:$(the_id).offset().top - 50
	}, 'slow');
	return false;
});