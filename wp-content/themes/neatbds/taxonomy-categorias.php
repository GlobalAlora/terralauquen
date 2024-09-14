<?php
get_header(); 
$term = get_queried_object(); 
$button_title = get_field('button_title', 'option'); ?>

<section class="products-listing bg--white">
    <div class="container">
        <h1 class="products-listing__title h2"><?php echo esc_html($term->name); ?></h1>
        <div class="products-listing__cont">
            <div class="products-listing__filters bg--blue">
                <div class="products-listing__filters__title h6">Filtrar productos</div>

                <?php function mostrar_categorias_recursivas($parent_id, $level = 0) {
                    $subcategories = get_terms(array(
                        'taxonomy' => 'categorias',
                        'hide_empty' => false,
                        'parent' => $parent_id,
                    ));

                    if (!empty($subcategories) && !is_wp_error($subcategories)) {
                        echo '<ul class="filters-list level-' . esc_attr($level) . '">';
                        foreach ($subcategories as $subcategory) {
                            $subcategory_link = get_term_link($subcategory);
                            $class_name = ($level === 0) ? 'parent-category' : (($level === 1) ? 'sub-category' : 'child-category');
                            echo '<li class="' . esc_attr($class_name) . '"><a href="' . esc_url($subcategory_link) . '">' . esc_html($subcategory->name) . '</a>';
                            mostrar_categorias_recursivas($subcategory->term_id, $level + 1);

                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                }

                $parent_term_id = $term->parent ? $term->parent : $term->term_id;                
                $current_term = ($term->parent == 0) ? $term : get_term($term->parent, 'categorias');
                $current_term_link = get_term_link($current_term);
                
                echo '<ul class="filters-list">';
                echo '<li class="parent-category"><a href="' . esc_url($current_term_link) . '">' . esc_html($current_term->name) . '</a>';

                mostrar_categorias_recursivas($current_term->term_id);

                echo '</li></ul>';
                ?>

                <a href="/nuestros-productos" class="button button--back">Volver</a>
            </div>

            <div class="products-listing__grid">
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
                    while ($productos_query->have_posts()) {
                        $productos_query->the_post();
                        $pdf_file = get_field('pdf'); ?>
                        <div class="product-item">
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
                            <?php if ($pdf_file) {
                                $pdf_url = $pdf_file['url'];                        
                                $button_title = $button_title ? $button_title : 'Descargar PDF';
                                echo '<a href="' . esc_url($pdf_url) . '" download class="product-link button button--blue">' . esc_html($button_title) . '</a>';
                            } ?>
                        </div>
                    <?php }
                } else {
                    echo '<p>No hay productos en esta categoría.</p>';
                }
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>