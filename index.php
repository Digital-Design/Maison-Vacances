<?php get_header(); ?>

<?php get_template_part( 'navigation', 'default' ); ?>
<?php echo do_shortcode("[metaslider id=14]"); ?>

<div class="container main-container">
  <div class="row">
    <div class="col-lg-12">
      <?php if (get_posts()) : ?>
        <div id="categorie-maison">
          <h1>La maison</h1>
          <?php
          //categorie la maison
          foreach (get_posts(array( 'numberposts' => 9999)) as $key => $post) {
            $categorie = get_the_category($post->ID);
            if($categorie[0]->slug == 'categorie-maison'){
              include(locate_template('maison.php'));
            }
          }?>
        </div>
        <div id="categorie-alentours">
          <h1>Les alentours</h1>
          <ul class="img-list">
            <?php
            //categorie alentours
            foreach (get_posts(array( 'numberposts' => 9999)) as $key => $post) {
              $categorie = get_the_category($post->ID);
              if($categorie[0]->slug == 'categorie-alentours'){
                include(locate_template('alentours.php'));
              }
            }?>
          </ul>
        </div>
      <?php endif; ?>
      <div id="contact">
        <h1>Nous contacter</h1>
       <?php echo do_shortcode("[contact-form-7 id=6 title=Formulaire de contact 1]"); ?>
     </div>
          <?php echo do_shortcode("[wpgmza id=1]"); ?>

   </div>
 </div>
</div>
<?php get_footer(); ?>
