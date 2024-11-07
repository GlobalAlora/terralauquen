<?php 
/**
 * Title: Mapa
 * Description: Mapa block
 * Category:    neatbds
 * Icon:        align-full-width
 * Keywords:    example
 * Post Types:  all
 * Multiple:    true
 * Active:      true
 * CSS Deps:
 * JS Deps:
 *
 * @package  Neatbds
 * @subpackage defaultTheme
 * @since defaultTheme  1.0
 *  */
do_action( 'neatbds_pre_render_block', $block ); 

if($map = get_field('map')): ?>
    <section class="map">
        <div class="map__cont">
            <?php echo $map; ?>
        </div>
    </section>
<?php endif; ?>