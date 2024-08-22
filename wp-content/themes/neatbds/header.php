<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php /* activar si lleva google fonts y limpiar este comment 
  <link rel="dns-prefetch" href="//fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  */ ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>



	<div id="page" class="site">
		<header class="header">
			<div class="container">
				<div class="header__top">
					<div class="header__top__left">
						<?php get_template_part('modules/components/site-logo'); ?>
					</div>
					<div class="header__top__center">
						<?php get_template_part('modules/components/search'); ?>
					</div>
					<div class="header__top__right">
						<?php //get_template_part('modules/components/account');      ?>
						<?php //get_template_part('modules/components/cart');      ?>
						<?php get_template_part('modules/components/responsive-btn'); ?>
					</div>
				</div>
				<div class="header__bottom" data-block="menu">
					<?php get_template_part('modules/components/menu'); ?>
				</div>
			</div>
		</header>

		<main id="content" class="site-content">
