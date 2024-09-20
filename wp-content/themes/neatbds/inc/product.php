<?php 
add_action('wp_enqueue_scripts', function(){
    wp_enqueue_script('product', get_theme_file_uri('js/product.js'), array('jquery'), null, true);

    wp_localize_script('product', 'ajax_var', array(
        'url'    => admin_url('admin-ajax.php'),
        'nonce'  => wp_create_nonce('product-nonce'), 
        'action' => 'filter_products' 
    ));
});
function ajax_filter_products() {
    $categories = isset($_POST['categories']) ? array_map('intval', $_POST['categories']) : array();

    $args = array(
        'post_type' => 'productos',
        'posts_per_page' => -1,
    );

    if (!empty($categories) && !in_array(0, $categories)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categorias',
                'field' => 'term_id',
                'terms' => $categories,
                'operator' => 'IN',
            ),
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
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
            </div>
            <?php
        }
    } else {
        echo '<p>No hay productos en esta categoría.</p>';
    }

    wp_reset_postdata();
    die();
}

add_action('wp_ajax_filter_products', 'ajax_filter_products');
add_action('wp_ajax_nopriv_filter_products', 'ajax_filter_products');
