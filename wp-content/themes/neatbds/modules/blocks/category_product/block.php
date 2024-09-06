<?php
/**
 * Categoria De Productos
 *
 * Title:       Categoria De Productos
 * Slug:        categoria-de-productos
 * Description: Categoria De Productos
 * Category:    neatbds
 * Icon:        align-full-width
 * Keywords:    example
 * Post Types:  all
 * Multiple:    true
 * Active:      true
 * CSS Deps:
 * JS Deps:
 *
 * @package  Neatbds
 * @subpackage defaultTheme
 * @since defaultTheme  1.0
 */

do_action( 'neatbds_pre_render_block', $block ); ?>

<section class="product-categories bg--white">
    <div class="container">
        <h1 class="product-categories__title h2"><?php echo the_title(); ?></h1>
        <?php
        $terms = get_terms(array(
            'taxonomy' => 'categorias',
            'hide_empty' => false,
        ));

        if (!empty($terms) && !is_wp_error($terms)) {
            echo '<div class="product-categories__cont">';
                foreach ($terms as $term) { 
                    $term_link = get_term_link($term);                
                    $image = get_field('image', 'categorias_' . $term->term_id); ?>
                    <a href="<?php echo esc_url($term_link); ?>" class="product-categories__item">
                        <div class="image-background"><?php get_template_part('modules/components/image', null, array('image' => $image));?></div>
                        <span class="h3"><?php echo esc_html($term->name); ?></span>
                    </a>
                <?php }
            echo '</div>';
        } else {
            echo '<p>No hay categorías disponibles.</p>';
        }
        ?>
    </div>
</section>

