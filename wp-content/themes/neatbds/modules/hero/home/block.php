<?php
/**
 * Hero Home
 *
 * Title:       Home
 * Description: Hero for
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
if( $video = get_field('video') ):
?>
    <section class="hero hero--home">
        <div class="container">
            <div class="hero__video">
                <?php echo '<video preload autoplay loop playsinline muted><source src="' . esc_attr($video) . '#t=0.1" type="video/mp4"></video>'; ?>
            </div>
            <div class="hero__cont">
                <?php 
                $uppertitle = get_field('uppertitle');
                $title = get_field('title');
                $button = get_field('button');

                echo empty($uppertitle) ? '' : '<div class="hero__uppertitle"> ' . esc_html($uppertitle) . ' </div>';
                echo empty($title) ? '' : '<h1 class="hero__title h1"> ' . esc_html($title) . ' </h1>';
                get_template_part('modules/components/button', null, ['button' => $button, 'cssclass' => 'button']);
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>