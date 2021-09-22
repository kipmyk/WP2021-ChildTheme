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
<?php if ( have_rows( 'group_1' ) ) : ?>
	<?php while ( have_rows( 'group_1' ) ) :
		the_row(); ?>
		
<?php if ( have_rows( 'group_2' ) ) : ?>
	<?php while ( have_rows( 'group_2' ) ) :
		the_row(); ?>
		
		<?php if ( have_rows( 'group_3' ) ) : ?>
	<?php while ( have_rows( 'group_3' ) ) :
		the_row(); ?>
		
		<?php if ( $testing = get_sub_field( 'testing' ) ) : ?>
			<?php echo esc_html( $testing ); ?>
		<?php endif; ?>
	  
	  <?php if ( $colors = get_sub_field( 'colors' ) ) : ?>
			<?php if( $colors ): ?>
<ul>
    <?php foreach( $colors as $color ): ?>
        <li><span class="color-<?php echo $color['value']; ?>"><?php echo $color['label']; ?></span></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
		<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>
	  
<?php $founders = get_field( 'founders' ); 
if( $founders ): ?>
<ul class="volunteers-list">
    <?php foreach( $founders as $founder ): 
	$avatar = get_avatar_url($founder->ID);
	?>
        <li>
            <img src="<?php echo esc_attr(get_avatar_url($founder->ID)); ?>" alt="author-avatar" />
            <a href="<?php echo esc_attr($founder->user_url); ?>"><?php echo $founder->display_name; ?></a>
        </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>