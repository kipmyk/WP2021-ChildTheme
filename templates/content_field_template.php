<?php
/**
 * Template Name: Content Fields
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">
  <div class="entry-content" style="margin: 200px !important;">

<p>Image</p>

<?php 

the_field('editor');

echo '<br />';

the_field('oembed');
?>
