<?php
/**
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();

?>

<main id="site-content" role="main">
  <div class="entry-content" style="margin: 200px !important;">
<?php

// Check value exists.
if( have_rows('flexible') ):

    // Loop through rows.
    while ( have_rows('flexible') ) : the_row();

        // Case: Paragraph layout.
        if( get_row_layout() == 'paragraph' ):
            $text = get_sub_field('text');
            echo $text;
            // Do something...

        // Case: Download layout.
        elseif( get_row_layout() == 'download' ):
            $file = get_sub_field('file');
            // Do something...

        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
