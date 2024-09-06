<?php
/**
 * Hero Simple
 *
 * Title:       Simple
 * Description: Hero Simple
 * Category:    neatbds_hero
 * Icon:        align-full-width
 * Keywords:    hero
 * Post Types:  all
 * Multiple:    true
 * Active:      true
 * CSS Deps:
 * JS Deps:
 *
 * @package neatbds
 * @subpackage defaultTheme
 * @since defaultTheme  1.0
 */

do_action('neatbds_pre_render_block', $block);
$image = get_field('image');
?>

<section class="hero hero--simple">
    <div class="container">
        <div class="hero__image">
            <div class="image-background">
                <?php get_template_part('modules/components/image', null, ['image'=>$image]); ?>
            </div>
        </div>
        <div class="hero__cont">
            <?php 
            $title = get_field('title');
            echo empty($title) ? '' : '<h1 class="hero__title h2"> ' . esc_html($title) . ' </h1>';?>
        </div>
    </div>
</section>