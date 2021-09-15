<?php
	 add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
	 function my_theme_enqueue_styles() {
 		  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 		  }

// // options page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'	=> false
	));
}

add_filter('acf/format_value/name=number_field', 'fix_number', 20, 3);
function fix_number($value, $post_id, $field) {
  $value = number_format($value);
  return $value;
}

add_action('acf/input/admin_footer', 'my_acf_admin_footer');
function my_acf_admin_footer() {
    ?>
    <style type="text/css">
        /* CSS here. */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
        	-webkit-appearance: none !important;
        }
    </style>
    <script type="text/javascript">
    (function( $ ){
        // Javascript here.
    })(jQuery);
    </script>
    <?php
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

add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block.'),
            'render_template'   => 'template-parts/blocks/testimonial/testimonial.php',
            'category'          => 'formatting',
        ));
    }
}

add_filter( 'the_excerpt', function( $excerpt ) {
    $your_field = get_post_meta( get_the_ID(), 'my_field', true );

    return $excerpt . $your_field;
} );

add_action('acf/validate_save_post', 'my_acf_validate_save_post');
function my_acf_validate_save_post() {

// Remove all errors if user is an administrator.
if( current_user_can('manage_options') ) {
acf_reset_validation_errors();
}

// Require custom input value.
// where field_6140972ecc8d8 is your field
if( empty($_POST['acf']['field_6140972ecc8d8']) ) {
acf_add_validation_error( $_POST['acf']['field_6140972ecc8d8'], 'Please check this input to proceed' );
}
}


/*
 * https://www.advancedcustomfields.com/resources/acf-validate_value/
 */
add_filter('acf/validate_value/name=editor', 'my_acf_validate_value', 10, 4);
function my_acf_validate_value( $valid, $value, $field, $input ){

// bail early if value is already invalid
if( !$valid ) {

    return $valid;

}
	if(empty($valid))
	{
		    $valid = 'Image must be at least 960px wide';
	}

    
    // return
    return $valid;

}