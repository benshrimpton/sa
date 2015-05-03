<?

//add featured image support to all post types
add_theme_support( 'post-thumbnails', array( 'post','portfolios') );


//PORTFOLIO

function create_post_type() {
  register_post_type( 'portfolios',
    array(
      'labels' => array(
        'name' => __( 'Portfolios' ),
        'singular_name' => __( 'portfolio' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail' )
    )
  );
   register_post_type( 'homeslider',
    array(
      'labels' => array(
        'name' => __( 'Home Slider' ),
        'singular_name' => __( 'Home Slide' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail' )
    )
  );
  flush_rewrite_rules( false );
}


register_nav_menus( array(
	'main_menu' => 'Main Menu',
	'footer_menu' => 'Footer Menu',
) );






add_action( 'init', 'create_post_type' );

?>