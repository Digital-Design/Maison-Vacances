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

var myLatLng = {lat: 47.9858635, lng: -4.4660625};

// Create a map object and specify the DOM element for display.
var map = new google.maps.Map(document.getElementById('map'), {
	center: myLatLng,
	scrollwheel: false,
	zoom: 12
});

// Create a marker and set its position.
var marker = new google.maps.Marker({
	map: map,
	position: myLatLng,
	title: 'Hello World!'
});