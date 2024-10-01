<?php
/**
 * Servicios
 *
 * Title:       Servicios
 * Slug:        servicios
 * Description: servicios
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
$servicios = get_field('servicios');
if($servicios):
?>

    <section class="services bg--white">
        <div class="container container--small">
            <?php if($title = get_field('title')): ?>
                <h2 class="services__heading h2"><?php echo esc_html($title);?></h2>
            <?php endif; ?>
            <div class="services__cont bg--natural">
                <?php foreach($servicios as $item): ?>
                    <div class="services__item js-open-block">
                        <?php if (!empty($item['title'])): ?>
                            <h3 class="services__title h4"><?php echo $item['title']; ?><span class="services__icon"></span></h3>
                        <?php endif; ?>
                        <?php if (!empty($item['text'])): ?>
                            <div class="services__text h5"><?php echo $item['text']; ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php endif;?>