<?php
/**
 * Imagen/Video Ancho Completo
 *
 * Title:       Imagen/Video Ancho Completo
 * Slug:        imagen/video
 * Description: Imagen/Video Ancho Completo
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

<section class="image_fullwidth image_fullwidth--<?php echo esc_attr($imagevideo_class); ?> bg--white" data-waypoint=".25">
    <?php if ($imagen_o_video == 'imagen'):?>
        <div class="image_fullwidth__image">
            <div class="image-background">
                <?php $image = get_field('image'); ?>
                <?php get_template_part('modules/components/image', null, array('image' => $image)); ?>
            </div>
        </div>
    <?php else: ?>
        <div class="image_fullwidth__video">
            <?php $video = get_field('video'); ?>
            <?php echo '<video reload playsinline controls autoplay muted><source src="' . esc_attr($video) . '#t=0.1" type="video/mp4"></video>'; ?>
        </div> 
    <?php endif;?>
</section>
