<!--?php /* Template Name: Team */ ?-->
<?php 
get_header();
$args = array(
    'post_type' => 'equipo',  // Corrected 'post-type' to 'post_type'
    'posts_per_page' => -1,
    'post_status' => 'publish'
);
$team = new WP_Query($args);?>

<?php get_template_part('modules/hero/simple/block'); ?>

<section class="team bg--natural" data-waypoint=".25">
    <div class="container container--small">
        <div class="team__upper">
            <?php echo (!empty($title_team = get_field('title_team'))) ? '<h2 class="team__title h2"> ' . wp_kses_post($title_team) . ' </h2>' : ''; ?>
            <?php echo (!empty($text = get_field('text'))) ? '<div class="team__text h4"> ' . wp_kses_post($text) . ' </div>' : ''; ?>
        </div>
        <div class="team__cont">
            <?php if ($team->have_posts()) :
                while ($team->have_posts()) : $team->the_post(); ?>
                    <div class="team__item">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="team__item__image">
                                <div class="image-background">
                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'medium'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="team__item__cont">
                            <div class="team__item__title h4"><?php the_title(); ?></div>
                            <div class="team__item__position h5">Aca va posicion</div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata(); 
            endif;?>
        </div>
    </div>
</section>

<?php get_footer();