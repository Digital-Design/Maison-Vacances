<link rel="stylesheet" href="css/flickity.css">

<div class="gallery js-flickity" data-flickity-options='{ "imagesLoaded": true,  "setGallerySize": false, "cellAlign": "left" }'>
	<img src="img/slider-1.JPG" alt="Aremplir" />
	<img src="img/slider-2.JPG" alt="Aremplir" />
	<img src="img/slider-3.JPG" alt="Aremplir" />
</div>

<!-- Categorie La maison -->
<section id="categorie-maison" class="fond-blanc">
	<h1>La Maison</h1>
	<div class="container-fluid">
		<?php foreach ($maison as $key => $item): ?>
			<div class="row centreVerticalement">
				<div class="col-md-9 <?php if($key%2) echo "col-md-push-3" ?>">
					<h2><?= $item->titre ?></h2>
					<p><?= $item->description ?></p>
					<p>
						<?php foreach ($item->tags as $tag): ?>
							<span href="#" class="tag"><?= $tag ?></span>
						<?php endforeach; ?>
					</p>
				</div>
				<div class="col-md-3 <?php if($key%2) echo "col-md-pull-9" ?>">
					<img src="img/<?= $item->image ?>" alt="<?= $item->alt ?>" width="100%">
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<!-- Categorie Les alentours -->
<section id="categorie-alentours" class="fond-bleu">
	<h1>Les Alentours</h1>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php foreach ($alentours as $key => $item): ?>
					<figure class="effect-steve">
						<img src="img/<?= $item->image ?>" alt="<?= $item->alt ?>">
						<figcaption>
							<h2><?= $item->titre ?></h2>
							<p><?= $item->description ?></p>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<!-- Categorie Contact -->
<section id="categorie-contact" class="fond-blanc">
	<h1>Nous Contacter</h1>
	<div class="container-fluid">
		<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
			<div class="row">
				<div class="col-lg-4 contact-tel">
					<h3><i class="fa fa-phone"></i> 07 61 15 63 69</h3>
				</div>

				<div class="col-lg-8 contact-mail">
					<h3><i class="fa fa-envelope"></i> locationporsgrouen@gmail.com</h3>
				</div>
			</div>

			<div class="bs-component"><div id="message_form" class="alert alert-dismissible hide" role="alert"></div></div>

			<form id="form-contact" action="scripts/form_contact.php" method="post">
				<div class="form-group">
					<input type="text" id="prenom_nom" name="prenom_nom" class="form-control" placeholder="Prénom Nom" required>
				</div>
				<div class="form-group">
					<input type="text" id="object" name="object" class="form-control" placeholder="Objet" required>
				</div>
				<div class="form-group">
					<input type="email" id="mail" name="mail" class="form-control" placeholder="Mail" required>
				</div>
				<div class="form-group">
					<textarea rows="3" id="message" name="message" class="form-control" placeholder="Message" required></textarea>
				</div>
				<div class="form-group">
					<div class="g-recaptcha" data-sitekey="6LdopRgTAAAAAIgK84XyE896565-mHA0M3ivNPc0"></div>
				</div>
				<button type="submit" class="btn btn-primary">Envoyer</button>
			</form>
		</div>
	</div>
</section>

<script type="text/javascript" src="js/flickity.pkgd.min.js"></script>
<script type="text/javascript">
//permet d'ajouter activer sur certain lien
function onScroll(){
	var scrollPos = $(document).scrollTop();
	$(".nav-link a").each(function () {
		var currLink = $(this);
		var refElement = $(currLink.attr("href").replace('.\/', ''));
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
	$("a[href^='./#']").on("click", function (e) {
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

	//Form Ajax
	$('#form-contact').on('submit', function(e) {
		e.preventDefault();
		//check si les les inputs sont bons
		if($('#prenom_nom').val() === '' || $('#object').val() === '' || !isValidEmailAddress($('#mail').val()) || $('#message').val() === '' || grecaptcha.getResponse().length === 0) {
			$('#message_form').addClass('alert-danger');
			$('#message_form').html('<button type="button" class="close" data-dismiss="alert">×</button>Les champs doivent êtres remplis.');
			$('#message_form').removeClass('hide');
			grecaptcha.reset();
		}
		else{
			//envoi du form
			$.ajax({
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: $(this).serialize(),
				success: function(html, statut){
					$('#message_form').addClass('alert-success');
					$('#message_form').removeClass('alert-danger');
					$('#message_form').html(html);
					$('#message_form').removeClass('hide');
					$('#form-contact').hide(200);
				},
				error : function(resultat, statut, erreur){
					$('#message_form').addClass('alert-danger');
					$('#message_form').html(resultat.responseText);
					$('#message_form').removeClass('hide');
				}
			});
		}
	});
});
</script>
