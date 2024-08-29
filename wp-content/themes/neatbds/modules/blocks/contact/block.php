<?php
/**
 * Contacto
 *
 * Title:       Contacto
 * Slug:        contacto
 * Description: contacto block
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

<section class="contact bg-white">
    <div class="container">
        <div class="contact__cont">
            <?php if($image = get_field('image')): ?>
                <div class="contact__image">
                    <div class="image-background">
                        <?php get_template_part('modules/components/image', null, ['image'=>$image]); ?>
                    </div>
                </div>
            <?php endif; ?> 
            <div class="contact__content"></div>
        </div>
    </div>
</div>