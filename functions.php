<?php
	 add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
	 function my_theme_enqueue_styles() {
 		  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 		  }
add_action('acf/init', 'my_acf_form_init');
function my_acf_form_init() {

    // Check function exists.
    if( function_exists('acf_register_form') ) {

        // Register form.
        acf_register_form(array(
            'id'       => 'new-event',
            'post_id'  => 'new_post',
            'new_post' => array(
                'post_type'   => 'post',
                'post_status' => 'draft'
            ),
            'post_title'  => true,
            'post_content'=> true,
        ));
    }
}