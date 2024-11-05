<?php
/**
 * Block Name: information
 *
 * Title:       information
 * Slug:        information
 * Description: information
 * Category:    neatbds
 * Icon:        admin-comments
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

$items = get_field('items');
$title = get_sub_field('title');
$text = get_sub_field('text');
$icon = get_sub_field('icon');
?>

<section class="information bg--white" data-waypoint=".25">
    <div class="container container--small">
        <div class="information__content">
            <?php foreach ( $items as $item ) { 
                $icon = $item['icon'];?>
                <div class="information__cont">
                    <div class="information__img">
                        <?php get_template_part('modules/components/image', null, array('image' => $icon)); ?>
                    </div>
                    <div class="information__text">
                        <h3 class="information__title"><?php echo ($item['title']); ?></h3>
                        <p class="information__text"><?php echo ($item['text']); ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
            