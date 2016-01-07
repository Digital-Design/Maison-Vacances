<?php get_header(); ?>
<?php get_template_part( 'navigation', 'default' ); ?>

<div class="container main-container">
  <div class="row">
    <div class="col-lg-12">
			<?php while(have_posts()){
					the_post();
					get_template_part( 'content', 'page' );
				}?>
		</div>
	</div>
</div>

<?php
get_footer();