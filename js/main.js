//function qui check si le mail est valide
function isValidEmailAddress(emailAddress) {
	var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	return pattern.test(emailAddress);
};

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

//Google analytics
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-73944225-1', 'auto');
ga('send', 'pageview');
