<?php
get_header(); 

$term = get_queried_object(); 
$button_title = get_field('button_title', 'option'); ?>

<section class="products-listing bg--white">
    <div class="container">
        <h1 class="products-listing__title h2"><?php echo esc_html($term->name); ?></h1>
        <div class="products-listing__cont">
            <div class="products-listing__filters">
                <div class="products-listing__filters__title h4">Filtrar productos</div>
                <?php echo do_shortcode('[facetwp facet="categories"]'); ?>
                <?php echo do_shortcode('[facetwp facet="categories_copy"]'); ?>
            </div>
            <?php echo do_shortcode('[facetwp template="blog_posts"]'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
