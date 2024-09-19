<?php
/**
 * Banner Mision/Vision
 *
 * Title:       Banner Mision/Vision
 * Slug:        banner
 * Description: Banner Mision/Vision
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

do_action( 'neatbds_pre_render_block', $block );?>

<?php if($banner_image = get_field('banner_image')): ?>
    <section class="banner">
        <div class="banner__cont">
            <div class="banner__cont__image container">
                <div class="image-background">
                    <?php get_template_part('modules/components/image', null, ['image' => $banner_image]); ?>
                </div>
                <div class="banner__cont__texts">
                    <?php if($banner_text = get_field('banner_text')): ?>
                        <div class="banner__cont__text"><?php echo wp_kses_post($banner_text); ?></div>
                    <?php endif; ?>
                    <?php if($text_2 = get_field('text_2')): ?>
                        <div class="banner__cont__text-2"><?php echo wp_kses_post($text_2); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>