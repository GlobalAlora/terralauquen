<?php
/**
 * Texto Enriquecido
 *
 * Title:       Texto Enriquecido
 * Slug:        paragraph
 * Description: paragraph block
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
 */

do_action( 'neatbds_pre_render_block', $block ); 
$paragraph = get_field('paragraph');
if($paragraph): ?>
    <section class="paragraph bg--white">
        <div class="container container--small">
            <div class="paragraph__cont">
                <?php echo wp_kses_post($paragraph); ?>
            </div>
        </div>
    </section>
<?php endif; ?>