<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package neatbds
 */

get_header();
if (have_posts()): ?>

	<header class="page-header bg--natural">
		<div class="container">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf(esc_html__('Resultados: %s', 'neatbds'), '<span>' . get_search_query() . '</span>');
				?>
			</h1>
		</div>
	</header><!-- .page-header -->
	
	<div class="search__cont bg--natural">
		<div class="container">
			<div class="grid-cont">
				<?php
				/* Start the Loop */
				while (have_posts()):
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part('modules/posts/item');

				endwhile;

				the_posts_navigation();
			echo '</div>';
		echo '</div>';	
	echo '</div>';

else:

	get_template_part('modules/posts/item', 'none');

endif;
?>


<?php

get_footer();
