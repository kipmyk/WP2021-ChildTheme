<?php
/**
 * Template Name: Front Form Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
 ?>




<?php acf_form_head(); ?>
<?php get_header(); ?>
<main id="site-content" role="main">
  <div class="entry-content" style="margin: 200px !important;">

<div id="primary" class="content-area">
    <div id="content">
        <?php acf_form('new-event'); ?>
    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>