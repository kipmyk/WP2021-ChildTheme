<?php
/**
 * The template for displaying category archive pages
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

<section>
			
<div class="container--full">

<?php
// get the current taxonomy term
$term = get_queried_object();

$image = get_field( 'rechtsgebiet-title-image', $term);

if ( $image ) : ?>
    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
<?php endif; ?>

<?php 
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
if ($term->parent == 0) { 
$terms = get_terms( 'leading_categories', 'parent='.$term->term_id ); } 
else { $terms = get_terms( 'leading_categories', 'parent='.$term->parent ); } 
foreach($terms as $term) { 
echo '<div class="snack_type"><a href="' . get_term_link( $term ) . '">' . $term->name . '</a></div>'; 
echo '<img src="' . get_field('rechtsgebiet-title-image', $term->taxonomy . '_' . $term->term_id) . '"/>';
}
?>