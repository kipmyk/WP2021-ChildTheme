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
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);


// function my_acf_load_field( $field ) {
//     $field['value'] = 'blue';
//     return $field;
// }

// // Apply to all fields.
// add_filter('acf/load_field/name=color','my_acf_load_field' ) ;



// array of filters (field key => field name)
$GLOBALS['my_query_filters'] = array( 
    //'field_1'   => 'city', 
    'field_6109201af899f'   => 'bedrooms'
);


// action
add_action('pre_get_posts', 'my_pre_get_posts', 10, 1);

function my_pre_get_posts( $query ) {
    
    // bail early if is in admin
    if( is_admin() ) return;
    
    
    // bail early if not main query
    // - allows custom code / plugins to continue working
    if( !$query->is_main_query() ) return;
    
    
    // get meta query
    $meta_query = $query->get('meta_query');

    
    // loop over filters
    foreach( $GLOBALS['my_query_filters'] as $key => $name ) {
        
        // continue if not found in url
        if( empty($_GET[ $name ]) ) {
            
            continue;
            
        }
        
        
        // get the value for this filter
        // eg: http://www.website.com/events?city=melbourne,sydney
        $value = explode(',', $_GET[ $name ]);
        
        
        // append meta query
        $meta_query[] = array(
            'key'       => $name,
            'value'     => $value,
            'compare'   => 'IN',
        );
        
    } 
    
    
    // update meta query
    $query->set('meta_query', $meta_query);

}

// function show_id_instead_of_title($title, $post, $field, $post_id) {
//     $title =$post->ID;
    
//         return $title;  
// }

// add_filter( 'acf/fields/post_object/result', 'show_id_instead_of_title', 10, 4 );


//Remove WPAUTOP from ACF TinyMCE Editor
// function acf_wysiwyg_remove_wpautop() {
//     remove_filter('acf_the_content', 'wpautop' );
// }
// add_action('acf/init', 'acf_wysiwyg_remove_wpautop');








// ACF Post Object Taxonomy Filter 
// function appfire_acf_post_object_query( $args, $field, $post_id ) {

		// $args['post_type'] = 'post';
		// $args['cat'] = '90'; //allow only with id = 90 and notice the difference only post 1 is showed since cat 1 is id 90

  //   return $args;
// }
// add_filter('acf/fields/post_object/query/key=field_6110cba40701b', 'appfire_acf_post_object_query', 10, 3);

//https://support.advancedcustomfields.com/forums/topic/custom-field-for-specific-category/

add_filter('acf/location/rule_types', 'acf_location_rules_types', 999);
function acf_location_rules_types($choices) {
    // create a new group for the rules called Terms
    // if it does not already exist
    if (!isset($choices['Terms'])) {
        $choices['Terms'] = array();
    }
    // create new rule type in the new group
    $choices['Terms']['category_id'] = 'Specific Category Field Location';
    return $choices;
}

add_filter('acf/location/rule_values/category_id', 'acf_location_rules_values_category');
function acf_location_rules_values_category($choices) {
    // get terms and build choices
    $taxonomy = 'category';
    $args = array('hide_empty' => false);
    $terms = get_terms($taxonomy, $args);
    if (count($terms)) {
        foreach ($terms as $term) {
            $choices[$term->term_id] = $term->name;
        }
    }
    return $choices;
}

add_filter('acf/location/rule_match/category_id', 'acf_location_rules_match_category', 10, 3);
function acf_location_rules_match_category($match, $rule, $options) {
    if (!isset($_GET['tag_ID']) || 
            !isset($_GET['taxonomy']) || 
            $_GET['taxonomy'] != 'category') {
        // bail early
        return $match;
    }
    $term_id = $_GET['tag_ID'];
    $selected_term = $rule['value'];
    if ($rule['operator'] == '==') {
        $match = ($selected_term == $term_id);
    } elseif ($rule['operator'] == '!=') {
        $match = ($selected_term != $term_id);
    }
    return $match;
}

function relationship_options_filter($args, $field, $post_id) {
  // $args['post_status']  = array('draft'); // Hide drafts
  // $args['post__not_in'] = array($post_id); // Hide current post
  // $args['order']        = 'DESC';
  // $args['orderby']      = 'date';
  // return $args;
    $args['post_type'] = 'post';
        $args['cat'] = '90'; //allow only with id = 90 and notice the difference only post 1 is showed since cat 1 is id 90

    return $args;
}
add_filter('acf/fields/post_object/query/name=related_project', 'relationship_options_filter', 10, 3);


add_shortcode('acf_particles', 'acf_particles_section');
function acf_particles_section() {

if( ! class_exists('ACF') ) {
return;
}

$post_id = get_the_ID();	
// https://www.advancedcustomfields.com/resources/get_field/
$wysiwyg = get_field('wysiwyg',$post_id);
$background = get_field('background', $post_id);
$content = get_field('content', $post_id);

$html = "";
$html.= ''.$wysiwyg.'';
if( get_field('wysiwyg', $post_id) ):
$html.= ''.$wysiwyg.'';
endif;

if( get_field('background', $post_id) ):
$html.= '<img src="'.$background.'" />';
endif;

if( get_field('content', $post_id) ):
$html.= ''.$content.'';
endif;

return $html;

}

add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init() {

    acf_register_block_type( array(
    'title'         => __( 'Sidebar', 'rq' ),
    'name'          => 'sidebar',
    'render_template'   => 'template-parts/sidebar.php',
    'mode'          => 'preview',
    'supports'      => [
        'align'         => false,
        'anchor'        => true,
        'customClassName'   => true,
        'jsx'           => true,
    ]
  ));
}

