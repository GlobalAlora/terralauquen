</main><!-- #content -->


<footer class="site-footer">
	<div class="container">
		<div class="site-footer__cont">
			<div class="site-footer__container">
				<div class="site-footer__column">
					<?php get_template_part('modules/components/site-logo'); ?>
				</div>
				<div class="site-footer__column">
					<?php get_template_part('modules/components/menu'); ?>
				</div>
				<div class="site-footer__column">
					<h3 class="site-footer__title">Redes Sociales</h3>
					<?php get_template_part('modules/components/socials'); ?>
				</div>
			</div>
			<div class="site-footer__copyright">
				<?php get_template_part('modules/components/copyright'); ?>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->


</div><!-- #page -->
<?php if($whatsapp = get_field('whatsapp','option')): ?>
    <?php echo $whatsapp; // Para verificar el número ?>
    <a class="btn-whatsapp" href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp; ?>&amp;text=Hola%20me%20estoy%20contactando%20desde%20el%20sitio%20web.&amp;source=&amp;data=" target="_blank">
        <?php get_template_part('images/socials/whatsapp'); ?>
    </a>
<?php endif; ?>

<?php wp_footer(); ?>

</body>

</html>
