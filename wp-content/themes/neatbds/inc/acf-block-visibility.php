<?php

acf_add_local_field_group(array(
'key' => 'neatbds_block_visibility_group',
'title' => 'Block Visibility',
'fields' => array(
    array(
        'key' => 'neatbds_block_visibility',
        'label' => 'Block Visibility',
        'name' => 'neatbds_block_visibility',
        'aria-label' => 'Block Visibility',
        'type' => 'true_false',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => 'neatbds_block_visibility',
            'id' => '',
        ),
        'default_value' => 1,
        'message' => 'Block Visibility',
        'ui' => 0,
        'ui_on_text' => '',
        'ui_off_text' => '',
    ),
),
'location' => array(
    array(
        array(
            'param' => 'block',
            'operator' => '==',
            'value' => 'all',
        ),
    ),
),
'menu_order' => 0,
'position' => 'high',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => '',
'active' => true,
'description' => '',
'show_in_rest' => 1,
));


// Render a div over the preview in admin
add_action('neatbds_pre_render_block', 'neatbds_block_visibility_action', 10, 2);
function neatbds_block_visibility_action($block)
{
    if ( 
        isset($block['data']['neatbds_block_visibility']) && 
        $block['data']['neatbds_block_visibility'] == 0 && 
        is_admin()) { 
        
        echo '<div class="neatbds_block_visibility--disabled-block"></div>';        
    }
}

// Do not render the block if the visibility is disabled
function neatbds_block_visibility_render($block_content, $block)
{
    
    if (isset($block['attrs']['data']['neatbds_block_visibility']) &&
        $block['attrs']['data']['neatbds_block_visibility'] == 0 &&
        !is_admin()
        ) {
        return ''; // Don't render this block.
    }

    return $block_content;
}
 
add_filter('render_block', 'neatbds_block_visibility_render', 10, 2);
