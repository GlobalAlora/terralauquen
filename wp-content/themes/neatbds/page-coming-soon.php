<?php
/*
Template Name: Coming Soon
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">		
	<?php /*
 activar si lleva google fonts y limpiar este comment 
  <link rel="dns-prefetch" href="//fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  */ ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
while (have_posts()):
	the_post(); 	
	the_content();
endwhile;
?>

<?php wp_footer(); ?>

</body>
</html>
