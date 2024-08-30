<!--?php /* Template Name: Team */ ?-->
<?php 
get_header();
$args = array(
    'post_type' => 'equipo',  // Corrected 'post-type' to 'post_type'
    'posts_per_page' => -1,
    'post_status' => 'publish'
);
$team = new WP_Query($args);?>

<section class="team bg--natural">
    <div class="container--small">
        <div class="team__cont">
            <?php if ($team->have_posts()) :
                while ($team->have_posts()) : $team->the_post(); ?>
                    <div class="team__item">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="team__item__image"><?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?></div>
                        <?php endif; ?>
                        <div class="team__item__cont">
                            <div class="team__item__title h3"><?php the_title(); ?></div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata(); 
            endif;?>
        </div>
        <div class="team__button">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="button">Ver más Noticias</a>
        </div>
    </div>
</section>

<?php get_footer();