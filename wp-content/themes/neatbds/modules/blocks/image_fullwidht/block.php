<?php
/**
 * Imagen/video A lo Ancho
 *
 * Title:       Imagen/video A lo Ancho
 * Slug:        imagen/video
 * Description: Imagen/video A lo Ancho
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
$imagen_o_video = get_field('imagen_o_video'); 
$imagevideo_class = $imagen_o_video == 'imagen' ? 'imagen' : 'video'; ?>

<section class="image_fullwidht image_fullwidht--<?php echo esc_attr($imagevideo_class); ?>">
    <?php if ($imagen_o_video == 'imagen'):?>
        <div class="image_fullwidht__image">
            <div class="image-background">
                <?php get_template_part('modules/components/image', null, array('image' => $image)); ?>
            </div>
        </div>
    <?php else: ?>
        <div class="image_fullwidht__video">

        </div> 
    <?php endif;?>
</section>
