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
$term = get_field('taxonomy_field_name');
if( $term ): ?>
    <h2><?php echo esc_html( $term->name ); ?></h2>
    <p><?php echo esc_html( $term->description ); ?></p>
<?php endif; ?>