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

<?php while( the_flexible_field("flexible_content") ): ?>
<?php if( get_row_layout() == "full_width_paragraph" ): ?>
<section class="content-section">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="text-box">
<h2 class="heading-genekor"><?php the_sub_field("paragraph_title"); ?></h2>
<p class="genekor"><?php the_sub_field("paragraph_content"); ?></p>
<div class="clearfix spacing-50"></div>
<p class="genekor"><?php the_sub_field("subtitle"); ?></p>
<ul id="list">
<?php if(have_rows ('list')): while (have_rows ('list')): the_row(); ?>
<li><?php the_sub_field("list_item"); ?></li>
<?php endwhile; endif; ?>
</ul>
</div>
<div class="clearfix spacing-50"></div>
</div>
<!-- end col-12 -->
</div>
<!-- end row -->
</div>
<!-- end container -->
</section>

<!-- end content-section -->

<?php elseif( get_row_layout() == "left_content_right_image_svg" ): ?>
<section class="content-section" data-background="<?php the_sub_field('background_color'); ?>">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-8">
<div class="side-content left">
<h2 class="heading-genekor"><?php the_sub_field('title'); ?></h2>
<p class="genekor-text" style="font-size:17px;">
<?php the_sub_field('content'); ?>
</p>
<div class="clearfix spacing-50"></div>
</div>
<!-- end side-content -->
<div class="clearfix spacing-50"></div>
</div>
<!-- end col-8 -->
<div class="col-lg-4 trigger">
</div>
</div>
<!-- end row -->
</div>
<!-- end container -->
</section>
<?php elseif ( get_row_layout() =="faq_left_title"): ?>
<section class="content-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-6">
<div class="section-title text-left">
<h2><?php the_sub_field('faq_title'); ?></h2>
</div>
<!-- end section-title -->
</div>
<!-- end col-6 -->
<div class="col-lg-6">
<?php if (have_rows ("faq")): while(have_rows("faq")): the_row(); ?>
<dl class="accordion">
<dt><a href="#"> <?php the_sub_field("question"); ?></a></dt>
<dd> <?php the_sub_field("answer"); ?></dd>
</dl>
<!-- end accordion -->
<?php endwhile; endif; ?>
</div>
<!-- end col-6 -->

<!-- Q&A -->
</div>
<!-- end row -->
</div>
<!-- end container -->
</section>


<!-- Download -->
<?php elseif ( get_row_layout() =="section_with_download_button"): ?>
<section class="content-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-6">
<div class="section-title text-left">
<h2><?php the_sub_field('title'); ?></h2>
<p><?php the_sub_field('description');?></p>
<button><a href="<?php the_sub_field('button') ?>"><?php the_sub_field('button') ?>"</a></button>
</div>
<!-- end section-title -->
</div>

<!-- end col-6 -->

<!-- Download -->
</div>
<!-- end row -->
</div>
<!-- end container -->
</section>

<!-- Q&A Reapter -->
<?php elseif ( get_row_layout() =="q_&_a"): ?>
	<section class="content-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-6">
					<div class="section-title text-left">
						<?php if ( have_rows( 'q&a' ) ) : ?>

							<?php while ( have_rows( 'q&a' ) ) : the_row(); ?>
								<?php if ( $data_one = get_sub_field( 'data_one' ) ) : ?>
									<?php echo $data_one; ?>
								<?php endif; ?>

							<?php if ( $data_two = get_sub_field( 'data_two' ) ) : ?>
								<?php echo $data_two; ?>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- end Q&A-section -->

<div class="clearfix spacing-100"></div>

<?php endif; endwhile; ?>