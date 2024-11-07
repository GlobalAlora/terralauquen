<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package neatbds
 */
get_header();
?>
<?php
while (have_posts()):
	the_post();
	?>
	
	<section class="hero hero--post">
		<div class="container">
			<div class="hero__image">
				<div class="image-background">
					<?php echo get_the_post_thumbnail(get_the_ID(), 'big'); ?>
				</div>
			</div>
			<div class="hero__cont">
				<h1 class="hero__title h2"> <?php echo get_the_title(); ?> </h1>
			</div>
		</div>
	</section>

	<?php the_content();

endwhile; // End of the loop.
?>
<?php
get_footer();
