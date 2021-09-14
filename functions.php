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

add_action( 'woocommerce_order_status_changed', 'action_function_name_9201', 1, 3 );

function action_function_name_9201( $id, $status_transition_from, $status_transition_to ){

    // $current_user = wp_get_current_user();
		//
		// print_r($status_transition_from);

    $row = [
        'field_613b01a0fd845' => 'test',
        // 'timestamp' => date("Y-m-d H:i:s"),
        // 'timestamp' => "",
        // 'user' => $current_user->ID,
    ];

    //ray( get_field('field_613b0194fd844', 22031) ); // debug dump

    add_row('field_613b0194fd844', $row, 22031);

    //ray( get_field('field_613b0194fd844', 22031) ); // debug dump 2
}