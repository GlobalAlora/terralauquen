<?php
/*
* Esta funcion busca si hay una pagian con el template 'page-coming-soon.php'. Si lo encuentra, busca un field (boolean) "active". Si este es true, redireccionara a los usuarios no logueados a esa pagina
Docs: https://app.clickup.com/9014020574/v/dc/8cme2ey-79614/8cme2ey-169414
*/

function neatbds_has_published_page_with_template($template) {
    global $wpdb;

    $query = $wpdb->prepare(
        "SELECT p.ID FROM {$wpdb->posts} p
         INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
         WHERE p.post_type = 'page'
         AND p.post_status = 'publish'
         AND pm.meta_key = '_wp_page_template'
         AND pm.meta_value = %s",
        $template
    );

    $id = $wpdb->get_var($query);
    
    if ( $id > 0 ) {
        return $id;
    }
    return false;
}

function neatbds_coming_soon_redirect() {
    global $post;    

    $template = 'page-coming-soon.php';
    $coming_soon_id = neatbds_has_published_page_with_template( $template );

    if ( !$coming_soon_id || $post->ID == $coming_soon_id ) return;

    $active = get_field('active', $coming_soon_id);

    if ( $active && !is_user_logged_in()) {
        wp_redirect( get_permalink( $coming_soon_id ) );
        exit;
    }
}
add_action('template_redirect', 'neatbds_coming_soon_redirect');

/*
Campo de active para el template coming soon
*/
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
	'key' => 'group_6684153ccb150',
	'title' => 'Active',
	'fields' => array(
		array(
			'key' => 'field_66841af608637',
			'label' => 'Active',
			'name' => 'active',
			'aria-label' => '',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
			'ui' => 1,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-coming-soon.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );
} );
