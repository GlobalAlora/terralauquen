<?php
if (!function_exists('acf_add_local_field_group'))
	return;

$settings_pages = ['settings' => 'General', 'analytics' => 'Analytics', 'menu' => 'Menu'];

acf_add_options_page();

foreach ($settings_pages as $file => $label):
	$file = get_template_directory() . '/inc/acf/' . $file . '.php';
	if (file_exists($file) === false)
		continue;

	acf_add_options_sub_page($label);

	include_once($file);
endforeach;

// Enable local json acf
function neatbds_acf_json_save_point($path)
{
	return get_stylesheet_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'neatbds_acf_json_save_point');



function neatbds_acf_description($field)
{
	if (!empty($field['instructions']))
		$field['instructions'] = '<span><em>' . $field['instructions'] . '</em></span>';
	return $field;
}
add_filter('acf/pre_render_field', 'neatbds_acf_description');

/**
 * Enable behavior early for escaping html
 */
add_filter('acf/the_field/escape_html_optin', '__return_true');

/**
 * Disable acf shortcode 
 */
add_action('acf/init', function () {
	acf_update_setting('enable_shortcode', false);
});

/**
 * Allow unsafe html only when wrapper has class "allow_unsafe_html" 
 * 
 * @return boolean 		True if allow. False if not
 */
add_filter('acf/the_field/allow_unsafe_html', function ($allow, $selector, $post_id, $field_type, $field_object) {
	if (strstr($field_object['wrapper']['class'], 'allow_unsafe_html') !== false)
		$allow = true;

	return $allow;
}, 10, 5);
