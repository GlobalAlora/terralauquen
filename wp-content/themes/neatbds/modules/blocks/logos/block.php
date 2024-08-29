<?php
/**
 * Logos
 *
 * Title:       Logos
 * Slug:        logos
 * Description: logos block
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

do_action( 'neatbds_pre_render_block', $block ); ?>

<section class="logos bg--white">
    <div class="container--small">
        <?php if($title = get_field('title')):?><div class="logos__title h2"><?php echo esc_html($title);?></div><?php endif?>
        <?php if( have_rows('logos') ): ?>
            <div class="logos__cont">
                <?php while( have_rows('logos') ): the_row(); 
                    $link = get_sub_field('link');
                    $logo = get_sub_field('logo');?>
                    <a href="<?php echo esc_url($link); ?>" class="logos__cont__item">
                        <?php get_template_part('modules/components/image', null, ['image'=>$logo]); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

