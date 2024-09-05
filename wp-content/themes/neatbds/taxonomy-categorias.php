<?php
get_header(); 

$term = get_queried_object(); ?>

<section class="products-listing bg--white">
    <div class="container">
        <h1 class="h2"><?php echo esc_html($term->name);?></h1>
        <?php
        $args = array(
            'post_type' => 'productos', 
            'tax_query' => array(
                array(
                    'taxonomy' => 'categorias',
                    'field' => 'term_id',
                    'terms' => $term->term_id,
                ),
            ),
        );
        $productos_query = new WP_Query($args);

        if ($productos_query->have_posts()) {
            echo '<div class="product-list">';
            while ($productos_query->have_posts()) {
                $productos_query->the_post();?>
                <div class="product-item">
                    <a href="<?php the_permalink(); ?>" class="product-link">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="product-image"><?php the_post_thumbnail('medium'); ?></div>
                        <?php } ?>
                        <div class="product-info">
                            <h2 class="product-title"><?php the_title(); ?></h2>
                        </div>
                    </a>
                </div>
                <?php
            }
            echo '</div>';
        } else {
            echo '<p>No hay productos en esta categoría.</p>';
        }

        wp_reset_postdata();?>
    </div>
</section>

<?php
get_footer(); // Incluir el pie de página del tema
?>
