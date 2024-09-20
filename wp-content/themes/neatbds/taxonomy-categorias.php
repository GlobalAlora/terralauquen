<?php
get_header(); 

$term = get_queried_object(); 
$button_title = get_field('button_title', 'option');?>

<section class="products-listing bg--white">
    <div class="container">
        <h1 class="products-listing__title h2"><?php echo esc_html($term->name); ?></h1>
        <div class="products-listing__cont">
            <div class="products-listing__filters">
                <div class="products-listing__filters__title h6">Filtrar productos</div>
                <?php
                $parent_term_id = $term->parent ? $term->parent : $term->term_id;
                $args = array(
                    'taxonomy' => 'categorias',
                    'hide_empty' => false,
                    'parent' => $parent_term_id,
                );
                $subcategories = get_terms($args);
                if (!empty($subcategories) && !is_wp_error($subcategories)) {
                    echo '<ul class="filters-list">';
                    foreach ($subcategories as $subcategory) {
                        $subcategory_link = get_term_link($subcategory);
                        echo '<li class="fiilters-list__parent"><a href="' . esc_url($subcategory_link) . '">' . esc_html($subcategory->name) . '</a></li>';

                        $child_args = array(
                            'taxonomy' => 'categorias',
                            'hide_empty' => false,
                            'parent' => $subcategory->term_id,
                        );
                        $child_categories = get_terms($child_args);

                        if (!empty($child_categories) && !is_wp_error($child_categories)) {
                            echo '<ul class="filters-list__children">';
                            foreach ($child_categories as $child_category) {
                                $child_category_link = get_term_link($child_category);
                                echo '<li><a href="' . esc_url($child_category_link) . '">' . esc_html($child_category->name) . '</a></li>';
                            }
                            echo '</ul>';
                        }
                    }

                    echo '</ul>';
                } else {
                    echo '<p>No hay subcategorías disponibles.</p>';
                }
                ?>
                </div>

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
                echo '<div class="products-listing__grid" id="products-grid">';
                $button_title = get_field('button_title', 'options');
                while ($productos_query->have_posts()) {
                    $productos_query->the_post();
                    $pdf_para_descargar = get_field('pdf_para_descargar'); 
                    if ($pdf_para_descargar) {
                        $pdf_url = $pdf_para_descargar['url']; 
                        $pdf_title = $pdf_para_descargar['title'];
                    } ?>
                    
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
                        <?php if ($pdf_para_descargar && $button_title) { ?>
                            <a href="<?php echo esc_url($pdf_url); ?>" download class="product-link button"><?php echo esc_html($button_title); ?></a>
                        <?php } ?>
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