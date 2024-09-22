<?php
get_header(); 

$term = get_queried_object(); 
$button_title = get_field('button_title', 'option');?>

<section class="products-listing bg--natural">
    <div class="container">
        <h1 class="products-listing__title h2"><?php echo esc_html($term->name); ?></h1>
        <div class="products-listing__cont">
            <div class="products-listing__filters">
                <h3 class="products-listing__filters__title h4">Filtrar por Categorías</h3>
                <form class="products-listing__filters__list" id="filter-form">
                    <?php
                    $parent_id = ($term->parent == 0) ? $term->term_id : $term->parent;
                    $child_categories = get_terms(array(
                        'taxonomy' => 'categorias',
                        'hide_empty' => false,
                        'parent' => $parent_id,
                    ));

                    if (!empty($child_categories)) {
                        echo '<ul>';
                        foreach ($child_categories as $child_category) {
                            echo '<li>';
                            echo '<label><input type="checkbox" name="category[]" value="' . $child_category->term_id . '"> ' . esc_html($child_category->name) . '</label>';

                            $subcategories = get_terms(array(
                                'taxonomy' => 'categorias',
                                'hide_empty' => false,
                                'parent' => $child_category->term_id,
                            ));

                            if (!empty($subcategories)) {
                                echo '<ul>';
                                foreach ($subcategories as $subcategory) {
                                    echo '<li>';
                                    echo '<label><input type="checkbox" name="category[]" value="' . $subcategory->term_id . '"> ' . esc_html($subcategory->name) . '</label>';

                                    $sub_subcategories = get_terms(array(
                                        'taxonomy' => 'categorias',
                                        'hide_empty' => false,
                                        'parent' => $subcategory->term_id,
                                    ));

                                    if (!empty($sub_subcategories)) {
                                        echo '<ul>';
                                        foreach ($sub_subcategories as $sub_subcategory) {
                                            echo '<li>';
                                            echo '<label><input type="checkbox" name="category[]" value="' . $sub_subcategory->term_id . '"> ' . esc_html($sub_subcategory->name) . '</label>';
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                    }

                                    echo '</li>';
                                }
                                echo '</ul>';
                            }

                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                    <div class="products-listing__filters__buttons">
                        <button id="go-back" class="button button">Volver Atrás</button>
                        <button type="button" id="clear-filters" class="button button">Limpiar Filtros</button>
                    </div>
                </form>
            </div>

            <?php
            $args = array(
                'post_type' => 'productos', 
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categorias',
                        'field' => 'term_id',
                        'terms' => $term->term_id,
                        'include_children' => true,
                    ),
                ),
            );
            $productos_query = new WP_Query($args);

            if ($productos_query->have_posts()) {
                echo '<div class="products-listing__grid" id="products-grid">';
                while ($productos_query->have_posts()) {
                    $productos_query->the_post();
                    $pdf_para_descargar = get_field('pdf_para_descargar'); 
                    if ($pdf_para_descargar) {
                        $pdf_url = $pdf_para_descargar['url']; 
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

<?php get_footer(); ?>
