<?php
/**
 * Imagen y Video
 *
 * Title:       Imagen y Video
 * Slug:        imagen-y-video
 * Description: Imagen y Video block
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
$image = get_field('image');
$video = get_field('video');
$video_placeholder = get_field('video_placeholder'); ?>

<section class="image_video bg--white">
    <div class="container">
        <?php if($title = get_field('title')):?><h2 class="image_video__title h2"><?php echo esc_html($title);?></h2><?php endif;?>
        <div class="image_video__cont">
            <?php if ($image && $video_placeholder && $video): ?>
                <div class="image_video__cont__item">
                    <div class="image_video__img"><?php get_template_part('modules/components/image', null, array('image' => $image)); ?></div>
                    <div class="image_video__video">
                        <img src="<?php echo esc_url($video_placeholder['url']); ?>" alt="<?php echo esc_attr($video_placeholder['alt']); ?>" />
                        <a href="<?php echo esc_url($video['url']); ?>" class="fancybox-video play-button" data-fancybox data-fancybox="gallery"></a>
                    </div>
                </div>
            <?php elseif ($image): ?>
                <div class="image_video__alone">
                    <div class="image_video__cont__item">
                        <div class="image_video__img">
                            <?php get_template_part('modules/components/image', null, array('image' => $image)); ?>
                        </div>
                    </div>
                </div>
            <?php elseif ($video_placeholder && $video): ?>
                <div class="image_video__alone">
                    <div class="image_video__video">
                        <img src="<?php echo esc_url($video_placeholder['url']); ?>" alt="<?php echo esc_attr($video_placeholder['alt']); ?>" />
                        <a href="<?php echo esc_url($video['url']); ?>" class="fancybox-video play-button" data-fancybox></a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($text = get_field('text')):?><div class="image_video__text"><?php echo wp_kses_post($text);?></h2><?php endif?>
        </div>
    </div>
</section>