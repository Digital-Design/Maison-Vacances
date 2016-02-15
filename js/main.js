$("a[href^='#']").click(function(){
	var theId = $(this).attr("href");
  var exceptions = ["#carousel-example-generic"];
  if(jQuery.inArray(theId, exceptions)){
  	$(this).parent().parent().find("li").each(function() {
  		$(this).removeClass("active");
  	});
  	$(this).parent().addClass("active");
  	$("html, body").animate({
  		scrollTop:$(theId).offset().top - 50
  	}, "slow");
  	return false;
  }
});