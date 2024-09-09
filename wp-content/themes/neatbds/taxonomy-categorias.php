<?php
get_header(); 

$term = get_queried_object(); 
$button_title = get_field('button_title', 'option');?>

<section class="products-listing bg--white">
    <div class="container">
        <h1 class="products-listing__title h2"><?php echo esc_html($term->name);?></h1>
        <div class="products-listing__cont">
            <div class="products-listing__filters">Aca van los filtros</div>

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
                echo '<div class="products-listing__grid">';
                while ($productos_query->have_posts()) {
                    $productos_query->the_post();
                    $pdf_file = get_field('pdf'); ?>
                    <div class="product-item">
                        <?php /*<a href="<?php the_permalink(); ?>" class="product-link"> */ ?>
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="product-image">
                                <div class="image-background">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="product-info">
                            <h2 class="product-title h4"><?php the_title(); ?></h2>
                        </div>
                        <?php if( $pdf_file ) {
                            $pdf_url = $pdf_file['url'];                        
                            $button_title = $button_title ? $button_title : 'Descargar PDF';
                            echo '<a href="' . esc_url($pdf_url) . '" download class="product-link button">' . esc_html($button_title) . '</a>';
                        } ?>
                    </div>
                    <?php
                }
                echo '</div>';
            } else {
                echo '<p>No hay productos en esta categoría.</p>';
            }
            wp_reset_postdata();?>
        </div>
    </div>
</section>

<?php
get_footer(); // Incluir el pie de página del tema
?>
