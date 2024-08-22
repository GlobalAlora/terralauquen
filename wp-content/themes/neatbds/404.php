<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package neatbds
 */

get_header();
?>
<section class="error-404 not-found jk">
	<header class="page-header">
		<h1 class="page-title">
			<?php esc_html_e('That page can&rsquo;t be found.', 'neatbds'); ?>
		</h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<p>
			<?php esc_html_e('It looks like nothing was found at this location.', 'neatbds'); ?>
		</p>
	</div><!-- .page-content -->
</section><!-- .error-404 -->


<?php
get_footer();
