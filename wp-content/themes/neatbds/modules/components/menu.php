<?php $hasmenu = get_field('menu', 'option');
if ($hasmenu): ?>
	<div class="site-menu">
		<?php foreach ($hasmenu as $menu_item):
			$link = $menu_item['link'];?>
			<div class="site-menu__item">
                <?php if ($link): ?>
                    <a class="site-menu__first-level" href="<?php echo esc_url($link['url']); ?>">
                        <?php echo esc_html($link['title']); ?>
                    </a>
                <?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
