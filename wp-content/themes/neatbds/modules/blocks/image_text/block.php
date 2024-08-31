<?php
/**
 * Imagen y Texto
 *
 * Title:       Imagen y Texto
 * Slug:        imagen-y-texto
 * Description: Imagen y Texto block
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

$image_position = get_field('position'); 
$position_class = $image_position == 'izquierda' ? 'izquierda' : 'derecha';
$two_image = get_field('two_image'); 
$title = get_field('title');
$text = get_field('text');
$image_1 = get_field('image_1');
$image_2 = get_field('image_2'); ?>

<section class="image_text bg--white">
    <div class="container container--smal">
        <div class="image_text__cont image_text__cont--<?php echo esc_attr($position_class); ?>" >
            <?php if($title && $text): ?>
                <div class="image_text__text">
                    <div class="image_text__title h2"><?php echo esc_html($title); ?></div>
                    <div class="image_text__text h6"><?php echo wp_kses_post($text); ?></div>
                </div>
            <?php endif; ?>
            <div class="image_text__images-cont <?php echo $two_image === true ? 'two-images' : ''; ?>">
                <?php if($image_1): ?>
                    <div class="image_text__image-1">
                        <div class="image-background">
                            <?php get_template_part('modules/components/image', null, array('image' => $image_1)); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($two_image && $image_2): ?>
                    <div class="image_text__image-2">
                        <div class="image-background">
                            <?php get_template_part('modules/components/image', null, array('image' => $image_2)); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
