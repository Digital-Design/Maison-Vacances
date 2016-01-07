<?php

function maison_vacances_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'maison_vacances_javascript_detection', 0 );

function maison_vacances_scripts() {

	wp_enqueue_style( 'maison_vacances-style', get_stylesheet_uri() );

	wp_enqueue_style( 'maison_vacances-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array( 'maison_vacances-style' ), '20141010' );

	wp_enqueue_script( 'maison_vacances-boostrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20141010', true );

}
add_action( 'wp_enqueue_scripts', 'maison_vacances_scripts' );