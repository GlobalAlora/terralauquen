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
<section class="error-404 not-found">
	<div class="container">
		<div class="page-content">
			<h1 class="page-title h3">
				<?php esc_html_e('Parece que esta página no existe', 'neatbds'); ?>
			</h1>
			<a href="/" class="button button--blue">Ir a la página principal</a>
		</div><!-- .page-content -->
	</div>
</section><!-- .error-404 -->


<?php
get_footer();
