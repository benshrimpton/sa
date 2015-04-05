<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage Fabulous WPExplorer Theme
 * @since Fabulous 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( get_theme_mod('wpex_custom_favicon') ) { ?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod('wpex_custom_favicon'); ?>" />
	<?php } ?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.masonry.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>
<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" type="text/css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css" type="text/css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/font/stylesheet.css" type="text/css" rel="stylesheet">
<script>
		window.jQuery = window.$ = jQuery;
		jQuery(document).ready(function(){	
				jQuery('.wppg_gallery_item_container, .wppg_album_item_container').mouseover(function(){
				jQuery(this).children('.wppg_gallery_item_bottom, .wppg_album_item_bottom').toggle();			
				});
				jQuery('.wppg_gallery_item_container, .wppg_album_item_container').mouseout(function(){
				jQuery(this).children('.wppg_gallery_item_bottom, .wppg_album_item_bottom').toggle();			
				});
				var $container = $('#wppg_gallery_container');

				$container.imagesLoaded( function(){
				  $container.masonry({
				    itemSelector : '.wppg_gallery_item_container'
				  });
				});
				
				var $container1 = $('#wppg_albumcontainer');

				$container1.imagesLoaded( function(){
				  $container1.masonry({
				    itemSelector : '.wppg_album_item_container'
				  });
				});
				
				});
				//$(function(){
				//  $('#wppg_albumcontainer').masonry({
				//    // options
				//    itemSelector : '.wppg_album_item_container',
				//    columnWidth : 400
				//  });
				//});
				//$(function(){
				//  $('#wppg_albumcontainer').masonry({
				//    // options
				//    itemSelector : '.wppg_album_item_container_main',
				//    columnWidth : 440
				//  });
				//});
				//$(function(){
				//  $('#wppg_albumcontainer1').masonry({
				//    // options
				//    itemSelector : '.wppg_album_item_container1',
				//    columnWidth : 400
				//  });
				//});
				//$(function(){
				//  $('#wppg_gallery_container').masonry({
				//    // options
				//    itemSelector : '.wppg_gallery_item_container_main',
				//    columnWidth : 440
				//  });
				//});
		//var $container = $('#wppg_gallery_container');
		//			// initialize
		//			$container.masonry({
		//			  columnWidth: 400,
		//			  itemSelector: '.wppg_gallery_item_container'
		//			});
		//var msnry = $container.data('masonry');
</script>
<style>
.wppg_album_item_container {
  width: 400px;
  margin: 10px;
  float: left;
}
.wppg_album_item_container_main {
  width: 420px;
  margin: 10px;
  float: left;
}
.wppg_gallery_item_container {
  width: 400px;
  margin: 10px;
  float: left;
}
.wppg_gallery_item_container_main {
  width: 420px;
  margin: 10px;
  float: left;
}
/*.wppg_gallery_item_container { width: 30%; }*/
/*.wppg_gallery_item_container .w2 { width: 50%; }*/
</style>
</head>

<body <?php body_class(); ?>>

	<div id="wrap" class="clr">

		<div id="header-wrap" class="clr">
			<header id="header" class="site-header clr container" role="banner">
				<?php
				// Outputs the site logo
				// See functions/logo.php
				wpex_logo(); ?> <div class="search_form"><?php get_search_form();?></div>
			</header><!-- #header -->
		</div><!-- #header-wrap -->

		<div id="site-navigation-wrap" class="clr <?php if ( get_theme_mod( 'wpex_fixed_nav', '1' ) && !wp_is_mobile() ) echo 'sticky-nav'; ?>">
			<div id="site-navigation-inner" class="clr">
				<nav id="site-navigation" class="navigation main-navigation clr container" role="navigation">
					<a href="#mobile-nav" class="navigation-toggle"><span class="fa fa-bars navigation-toggle-icon"></span><span class="navigation-toggle-text"><?php echo get_theme_mod( 'wpex_mobile_menu_open_text', __( 'Click here to navigate', 'wpex' ) ); ?></span></a>
					<?php
					// Display main menu
					//$social =  do_shortcode("[social_media_header]");
					wp_nav_menu( array(
						'theme_location'	=> 'main_menu',
						'sort_column'		=> 'menu_order',
						'menu_class'		=> 'main-nav dropdown-menu sf-menu',
						'fallback_cb'		=> false,
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					) ); ?>
					<?php echo do_shortcode("[social_media_header]"); ?>
				</nav><!-- #site-navigation -->
			</div><!-- #site-navigation-inner -->
		</div><!-- #site-navigation-wrap -->

		<div class="site-main-wrap clr">
			<?php if ( is_front_page() ) { ?>
			<?php if( function_exists('cyclone_slider') ) cyclone_slider('home-page'); ?>
			
			<?php }
			elseif(is_archive())
			{
				if( function_exists('cyclone_slider') ) cyclone_slider('home-page');
			}
			?>
			<div id="main" class="site-main clr container">
			<?php
			// Breadcrumbs
			wpex_display_breadcrumbs(); ?>