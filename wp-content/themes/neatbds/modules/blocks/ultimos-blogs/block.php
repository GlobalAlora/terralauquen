<?php
/**
 * Ultimos Blogs
 *
 * Title:       Ultimos Blogs
 * Slug:        ultimos-blogs
 * Description: ultimos blogs block
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
$args = array(
    'posts_per_page' => 3,
    'post_status' => 'publish'
);
$latest_posts = new WP_Query($args);?>

<section class="latest_news bg--natural">
    <div class="container container--small">
        <?php if($title = get_field('title')): ?><div class="latest_news__title h2"><?php echo esc_html($title); ?></div><?php endif; ?>
        <div class="latest_news__cont">
            <?php if ($latest_posts->have_posts()) :
                while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                    <a href="<?php echo the_permalink();?>" class="latest_news__item">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="latest_news__item__image"><?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?></div>
                        <?php endif; ?>
                        <div class="latest_news__item__cont">
                            <div class="latest_news__item__date"><?php echo get_the_date(); ?></div>
                            <div class="latest_news__item__title h3"><?php the_title(); ?></div>
                        </div>
                    </a>
                    <?php
                endwhile;
                wp_reset_postdata(); 
            endif;?>
        </div>
        <div class="latest_news__button">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="button">Ver más Noticias</a>
        </div>
    </div>
</section>