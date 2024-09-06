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
	'productos',
	array(
		'labels' => array(
			'name' => __('Productos'),
			'singular_name' => __('Producto'),
			'add_new' => __('Nuevo Producto'),
			'add_new_item' => __('Nuevo Producto'),
			'edit' => __('Editar Producto'),
			'edit_item' => __('Editar Producto'),
			'new_item' => __('Nuevo Producto'),
			'view' => __('Ver Producto'),
			'view_item' => __('Ver Producto'),
			'search_items' => __('Buscar Productos'),
			'not_found' => __('No encontrado'),
			'not_found_in_trash' => __('No encontrado en la papelera'),
		),
		'public' => true,
		'show_ui' => true,
		'menu_position' => 18,
		'query_var' => true,
		'supports' => array('title', 'thumbnail', 'editor'),
		'rewrite' => array('slug' => 'productos', 'with_front' => true),
		'can_export' => true,
	)
);

register_taxonomy(
	'categorias',
	'productos',
	array(
		'labels' => array(
			'name' => __('Categorias'),
			'singular_name' => __('Categoria'),
			'search_items' => __('Buscar Categorias'),
			'all_items' => __('Todas las Categorias'),
			'edit_item' => __('Editar Categoria'),
			'update_item' => __('Actualizar Categoria'),
			'add_new_item' => __('Agregar Nueva Categoria'),
			'new_item_name' => __('Nuevo Nombre de Categoria'),
			'menu_name' => __('Categorias'),
		),
		'hierarchical' => true, 
		'public' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => false,
		'rewrite' => array('slug' => 'Categorias'),
	)
);