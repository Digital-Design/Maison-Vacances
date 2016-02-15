$("a[href^='#']").click(function(){
	var theId = $(this).attr("href");
	$(this).parent().parent().find("li").each(function() {
		$(this).removeClass("active");
	});
	$(this).parent().addClass("active");
	$("html, body").animate({
		scrollTop:$(theId).offset().top - 50
	}, "slow");
	return false;
});

$("#calendar").fullCalendar({
  googleCalendarApiKey: "AIzaSyAzcmUADh2dOxpfUW3XLRcQRmtSJHrA8EE",
  events: {
    googleCalendarId: "konstantin@yellowcake.net"
  }
});
