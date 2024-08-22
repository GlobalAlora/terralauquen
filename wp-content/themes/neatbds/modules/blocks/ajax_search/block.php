<?php
/**
 * Ajax Search
 *
 * Title:       Ajax Search
 * Slug:        ajax-search
 * Description: Ajax Search
 * Category:    neatbds
 * Icon:        align-full-width
 * Keywords:    example
 * Post Types:  all
 * Multiple:    true
 * Active:      true
 * Styles:      
 * CSS Deps:
 * JS Deps:
 *
 * @package neatbds
 * @subpackage defaultTheme
 * @since defaultTheme  1.0
 * Full docs: https://app.clickup.com/9014020574/v/dc/8cme2ey-169354/8cme2ey-169294
 */

 do_action( 'neatbds_pre_render_block', $block );

?>
<section id="<?php echo $block['id'] ?? ""; ?>" class='block-ajax-search <?php echo esc_attr( $block['className'] );?>'>
    <div class="container">
        
    
    <?php do_action('ajax_filters_open_form', ['callback' => 'ajaxfiltersubmit']); ?>
            <div class="block-ajax-search__form">

            <?php do_action('ajax_filters_input', ['type' => 'hidden', 'name' => 'page',       'value' => 1]); ?>
            <?php do_action('ajax_filters_input', ['type' => 'hidden', 'name' => 'perpage',    'value' => 10]); 10; ?>
            <?php do_action('ajax_filters_input', ['type' => 'hidden', 'name' => 'post_types', 'value' => 'business']); ?>
            <?php do_action('ajax_filters_input', ['type' => 'hidden', 'name' => 'orderby',   'value' => 'title']); ?>
            <?php do_action('ajax_filters_input', ['type' => 'hidden', 'name' => 'order',      'value' => 'ASC']); ?>
            <?php do_action('ajax_filters_input', ['type' => 'hidden', 'name' => 'template',   'value' => 'components/card-business/card']); ?>
        
            <div class="input">
                <?php do_action('ajax_filters_input', ['name' => 'search', 'placeholder' => 'Keyword Search']); ?>
                
                <?php do_action('ajax_filters_submit', ['label' => __('<span>Search</span>'), 'class' => ['button']]); ?>
            </div>
        
            <div class="select">
                <?php do_action('ajax_filters_taxonomy', [ 'label' => 'Business Assistance Services', 'taxonomy' => 'business-service', 'submit-on-change' => true]); ?>
            </div>
            <div class="select">
                <?php do_action('ajax_filters_taxonomy', [ 'label' => 'Locations Served', 'taxonomy' => 'business-locations', 'submit-on-change' => true]); ?>
            </div>
            <div class="select">
                <?php do_action('ajax_filters_taxonomy', [ 'label' => 'Specialized Industries', 'taxonomy' => 'business-industries', 'submit-on-change' => true]); ?>
            </div>

            <div class="clear">
                <?php do_action('ajax_filters_reset', ['label' => 'Clear Filters', 'class' => 'clearfilters']); ?>
            </div>
        </div>

        <div class="block-ajax-search__results">
            <?php do_action('ajax_filters_results'); ?>
        </div>

        <div class="pager--container">
            <?php do_action('ajax_filters_pager', ['type' => 'pagenavi']); ?>
        </div>

        <?php do_action('ajax_filters_close_form'); ?>


    </div>
</section>
