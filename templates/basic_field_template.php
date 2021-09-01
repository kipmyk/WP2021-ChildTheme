<?php
/**
 * Template Name: Basic Fields
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

<?php

$text_field = get_field('text_field');

echo $text_field;?>

<br>
<?php

$text_area = get_field('text_area');

echo $text_area;?>

<br>
<?php

$number_field = get_field('number_field');

echo $number_field;?>

<br>
<?php

$range_field = get_field('range_field');

echo $range_field;?>

<br>
<?php

$name = get_field('name');

echo $name;?>

<?php

$email = get_field('email');

?>
<a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>


<br>
<?php

$url_field = get_field('url_field');?>
<a href="<?php echo $url_field;?>"><?php echo $url_field;?></a>
