<?php
/*
USE
$button = get_field('buttonfieldname');
get_template_part( 
    'modules/components/button', 
    null,  
    [
        'button' => $button
    ]
);
*/



$button = $args['button']['link'];
(isset($args['button']['style']) && !empty($args['button']['style'])) ? $cssclass = 'button ' . $args['button']['style'] : $cssclass = 'button';

if (!empty($button)) {
    ?>
    <a class="<?php echo esc_attr($cssclass); ?>" href="<?php echo esc_url($button['url']); ?>" <?php echo !empty($button['target']) ? 'target="' . esc_attr($button['target']) . '"' : ''; ?>>
        <?php echo esc_html($button['title']); ?>
    </a>
    <?php
}
