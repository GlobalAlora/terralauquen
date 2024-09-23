<!--?php /* Template Name: Blogs */ ?-->
<?php 
get_header();

the_content();

$args = array(
    'post_type' => 'post',  
    'posts_per_page' => -1,
    'post_status' => 'publish'
);
$team = new WP_Query($args);
?>

<section class="blogs bg--white">
    <div class="container">
        <div class="blogs__cont">
        <?php if ($team->have_posts()): ?>
            <?php while ($team->have_posts()): $team->the_post(); ?>
                <?php get_template_part('modules/posts/item'); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No hay posts disponibles.</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); // Resetear datos del query ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
