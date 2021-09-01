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

//load field settings and values
$name = get_field('name');

	  echo '<h1>' . $name . '</h1>';
	  
$comment = get_field('comment');
	  
echo '<p>' . $comment . '</p>';	 
	  
//load image
$image  = get_field('image');
	  
echo '<pre>';
	  print_r($image);
echo '<pre>';

if( $image ):

    // Image variables.
    $url = $image['url'];
    $title = $image['title'];
    $alt = $image['alt'];
    $caption = $image['caption'];

    // Thumbnail size attributes.
    $size = 'thumbnail';
echo $url;?>
	  <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($alt); ?>" />
	  <?php
 endif; ?>
	  
<p>
	Gallery starts
	  </p>
<?php 

$images = get_field('upload_submission_image_gallery');
$size = 'uncropped'; // (thumbnail, medium, large, full or custom size)
if( $images ):
    ?>
  <ul class="image-gallery">
    <?php foreach( $images as $image_id ): ?>
      <li>
      
        <a href="???"  data-lightbox="gal[0]">
        <?php echo wp_get_attachment_image_url( $image_id, $size ); //use the wp_get_attachment_image_url instead ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>