//permet d'ajouter activer sur certain lien
function onScroll(){
	var scrollPos = $(document).scrollTop();
	$(".nav-link a").each(function () {
		var currLink = $(this);
		var refElement = $(currLink.attr("href"));
		if(refElement.position() !== undefined){
			if (refElement.position().top <= scrollPos + $(".navbar").height() && refElement.position().top + refElement.height() > scrollPos + $(".navbar").height() - 40) {
				$(".nav-link").removeClass("active");
				currLink.parent().addClass("active");
			}
			else{
				currLink.parent().removeClass("active");
			}
		}
	});
}
onScroll();

$(document).ready(function () {
	$(document).on("scroll", onScroll);
	//permet le scroll swing
	$("a[href^='#']").on("click", function (e) {
		e.preventDefault();
		$(document).off("scroll");
		$("a").parent().each(function () {
			$(this).removeClass("active");
		});
		$(this).parent().addClass("active");

		var $target = $(this.hash);
		$("html, body").stop().animate({
			"scrollTop": $target.offset().top - $(".navbar").height() + 2
		}, 500, "swing", function () {
			$(document).on("scroll", onScroll);
		});
	});
});

//google map
var myLatLng = {lat: 47.9858635, lng: -4.4660625};
var map = new google.maps.Map(document.getElementById("map"),{
	center: myLatLng,
	scrollwheel: false,
	zoom: 12
});
//ajout du markeur
new google.maps.Marker({
	map: map,
	position: myLatLng,
	title: "Maison de Vacances"
});