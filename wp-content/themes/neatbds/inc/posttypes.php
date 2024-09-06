<?php
/**
 * Fotografia posttypes and taxonomies
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fotografia
 */
register_post_type(
	'Equipo',
	array(
		'labels' => array(
			'name' => __('Equipo'),
			'singular_name' => __('Equipo'),
			'add_new' => __('Nuevo Equipo'),
			'add_new_item' => __('Nuevo Equipo'),
			'edit' => __('Editar Equipo item'),
			'edit_item' => __('Editar Equipo item'),
			'new_item' => __('Nuevo Equipo item'),
			'view' => __('Ver Equipo item'),
			'view_item' => __('Ver Equipo item'),
			'search_items' => __('Search Equipo items'),
			'not_found' => __('Not found'),
			'not_found_in_trash' => __('Not found'),
		),
		'public' => true,
		'show_ui' => true,
		'menu_position' => 18,
		'query_var' => true,
		'supports' => array('title', 'thumbnail', 'editor'),
		'rewrite' => array('slug' => 'Equipo', 'with_front' => false),
		'can_export' => true
	)
);

register_post_type(
	'Productos',
	array(
		'labels' => array(
			'name' => __('Productos'),
			'singular_name' => __('Productos'),
			'add_new' => __('Nuevo Productos'),
			'add_new_item' => __('Nuevo Producto'),
			'edit' => __('Editar Productos item'),
			'edit_item' => __('Editar Productos item'),
			'new_item' => __('Nuevo Productos item'),
			'view' => __('Ver Productos item'),
			'view_item' => __('Ver Productos item'),
			'search_items' => __('Search Productos items'),
			'not_found' => __('Not found'),
			'not_found_in_trash' => __('Not found'),
		),
		'public' => true,
		'show_ui' => true,
		'menu_position' => 18,
		'query_var' => true,
		'supports' => array('title', 'thumbnail', 'editor'),
		'rewrite' => array('slug' => 'Productos', 'with_front' => true),
		'can_export' => true
	)
);