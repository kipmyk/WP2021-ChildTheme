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

<?php $term = get_queried_object();?>
<?php $poster = get_field('artist_poster', $term);?>
<?php $birth = get_field('birth_date', $term);?>
<?php $death = get_field('death_date', $term);?>
<?php $origin = get_field('origin', $term);?>
<?php $active = get_field('years_active', $term);?>
<?php $poster_meta = get_field('artist_poster_metadata', $term);?>
<?php $poster_url = get_field('artist_poster_url', $term);?>

<?php get_header();?>

<div class="container">
<section id="main">


<p><?php echo $birth?></p>
<p><?php echo $death?></p>
<p><?php echo $origin?></p>
<p><?php echo $active?></p>

<a href="<?php echo $poster_url ;?>"><?php echo $poster_url ;?></a>

<p><?php echo $poster_meta;?></p>

<div class="card">
<div class="artist-img-container">
<img src="<?php echo $poster['url'];?>" alt="">
</div>
</div>
<?php get_template_part('includes/section','archive-artists');?>
<?php previous_posts_link();?>
<?php next_posts_link();?>
</section>
</div>

<?php get_footer();?>