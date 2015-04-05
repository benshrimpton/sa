<?php
/**
 * Theme functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Fabulous WPExplorer Theme
 * @since Fabulous 1.0
 */



/**
	Constants
 **/
define( 'WPEX_JS_DIR_URI', get_template_directory_uri().'/js' );
define( 'WPEX_THEME_BRANDING', get_theme_mod( 'wpex_theme_branding', 'FAB' ) );

/**
	Theme Setup
 **/
if ( ! isset( $content_width ) ) $content_width = 650;

// Theme setup - menus, theme support, etc
require_once( get_template_directory() .'/functions/theme-setup.php' );

// Recommend plugins for use with this theme
require_once ( get_template_directory() .'/functions/recommend-plugins.php' );



/**
	Theme Customizer
 **/

// Header Options
require_once ( get_template_directory() .'/functions/theme-customizer/header.php' );

// General Options
require_once ( get_template_directory() .'/functions/theme-customizer/general.php' );

// Styling Options
require_once ( get_template_directory() .'/functions/theme-customizer/styling.php' );

// Image resizing Options
require_once ( get_template_directory() .'/functions/theme-customizer/image-sizes.php' );


/**
	Includes
 **/

// Define widget areas & custom widgets
require_once( get_template_directory() .'/functions/widgets/widget-areas.php' );
require_once( get_template_directory() .'/functions/widgets/widget-flickr.php' );
require_once( get_template_directory() .'/functions/widgets/widget-social.php' );
require_once( get_template_directory() .'/functions/widgets/widget-video.php' );
require_once( get_template_directory() .'/functions/widgets/widget-posts-thumbnails.php' );

// Admin only functions
if ( is_admin() ) {

	// Default meta options usage
	require_once( get_template_directory() .'/functions/meta/usage.php' );

	// Post editor tweaks
	require_once( get_template_directory() .'/functions/mce.php' );

	// Gallery Metabox
	require_once( get_template_directory() .'/functions/meta/gallery-metabox/gmb-admin.php' );

// Non admin functions
} else {

	// Gallery Metabox
	require_once( get_template_directory() .'/functions/meta/gallery-metabox/gmb-display.php' );

	// Function that returns correct grid class for specific column number
	require_once( get_template_directory() .'/functions/grid.php' );

	// Outputs the main site logo
	require_once( get_template_directory() .'/functions/logo.php' );

	// Loads front end css and js
	require_once( get_template_directory() .'/functions/scripts.php' );

	// Image resizing script
	require_once( get_template_directory() .'/functions/aqua-resizer.php' );

	// Show or hide sidebar accordingly
	require_once( get_template_directory() .'/functions/sidebar-display.php' );

	// Returns the correct image sizes for cropping
	require_once( get_template_directory() .'/functions/featured-image.php' );

	// Comments output
	require_once( get_template_directory() .'/functions/comments-callback.php' );

	// Pagination output
	require_once( get_template_directory() .'/functions/pagination.php' );

	// Custom excerpts
	require_once( get_template_directory() .'/functions/excerpts.php' );

	// Alter posts per page for various archives
	require_once( get_template_directory() .'/functions/posts-per-page.php' );

	// Outputs the footer copyright
	require_once( get_template_directory() .'/functions/copyright.php' );

	// Outputs post meta (date, cat, comment count)
	require_once( get_template_directory() .'/functions/post-meta.php' );

	// Used for next/previous links on single posts
	require_once( get_template_directory() .'/functions/next-prev.php' );

	// Outputs the post format video
	require_once( get_template_directory() .'/functions/post-video.php' );

	// Outputs the post format audio
	require_once( get_template_directory() .'/functions/post-audio.php' );

	// Outputs post author bio
	require_once( get_template_directory() .'/functions/post-author.php' );

	// Outputs post slider
	require_once( get_template_directory() .'/functions/post-gallery.php' );

	// Adds classes to entries
	require_once( get_template_directory() .'/functions/post-classes.php' );

	// Adds a mobile search to the sidr container
	require_once( get_template_directory() .'/functions/mobile-search.php' );

	// Custom WP Gallery Output
	if ( get_theme_mod( 'wpex_custom_wp_gallery_output', '1' ) ) {
		require_once( get_template_directory() .'/functions/wp-gallery.php' );
	}

	// Page featured images
	require_once( get_template_directory() .'/functions/page-featured-image.php' );

	// Post featured images
	require_once( get_template_directory() .'/functions/post-featured-image.php' );

	// Breadcrumbs
	require_once( get_template_directory() .'/functions/breadcrumbs.php' );

	// Pre_get_posts filter tweaks
	require_once( get_template_directory() .'/functions/pre-get-posts.php' );

	// Scroll top link
	require_once( get_template_directory() .'/functions/scroll-top-link.php' );

	// Body Classes
	require_once( get_template_directory() .'/functions/body-classes.php' );

	// Outputs content for quote format
	require_once( get_template_directory() .'/functions/quote-content.php' );
        //Footer Social Media function
         function social_fun( $atts ){
            $args = array('post_type'=>'social_media', 'order'=> 'ASC', 'orderby' => 'menu_oder');
            $posts_array = get_posts($args);
            $output = "";
            foreach($posts_array AS $key=>$value)
            {
               $icon_id = $value->ID;
               $social_title = $value->post_title;
               $post_meta = get_post_meta($icon_id);
               $social_icon = $post_meta['wpcf-icon'][0];
               $social_url = $post_meta['wpcf-link'][0];
               $output .= "<div class='sm sm_".$social_title."'><img src='".$social_icon."' class='social_icon'/><a href='".$social_url."'>".$social_title."</a></div>";
            }
            return $output;
        }
        add_shortcode( 'social_media', 'social_fun' );
        //Header Social Media function
        function social_h_fun( $atts ){
            $args = array('post_type'=>'social_media', 'order'=> 'ASC', 'orderby' => 'menu_oder');
            $posts_array = get_posts($args);
            $output = "<div class='smh'>";
            foreach($posts_array AS $key=>$value)
            {
               $icon_id = $value->ID;
               $social_title = $value->post_title;
               $post_meta = get_post_meta($icon_id);
               $social_icon = $post_meta['wpcf-icon'][0];
               $social_url = $post_meta['wpcf-link'][0];
               $output .= "<a class='social_header' href='".$social_url."'><img src='".$social_icon."' class='social_icon'/></a>";
            }
             $output .= "</div>";
            return $output;
        }
        add_shortcode( 'social_media_header', 'social_h_fun' );
        
        //Function to get the category listings in the pages
        function category_listing($cat_id){
            $array_cat = get_the_category($cat_id);
            $cat_slug = array();
            $out = "";
            foreach($array_cat AS $value)
            {
                    //$cat_slug[] = $value->slug;
                    if (($value->slug=="uncategorized") || ($value->slug=="homepage")||  ($value->slug=="popular")) {
                    
                    }
                    else{
                            // Get the ID of a given category
                            $category_id = get_cat_ID($value->name);
                            // Get the URL of this category
                            $category_link = get_category_link( $category_id );
                            $out .= '<a class="home_post_cat" href="'. esc_url( $category_link ).'" title="Category Name">'.$value->name.'</a>';
                            
                    }
            }
            return $out;
        }
        
        
        //Function to get the post date
        function post_date($id,$format){
            if(!empty($format))
            {
                return strtoupper(the_time($format, $id));
            }
            else{
                 return strtoupper(the_time('M j', $id));
            }
        }
        
        //Is blog page
        function is_blog () {
            global $post;
            $posttype = get_post_type($post );
            return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post') ) ? true : false ;
        }
        
        //TAgs cloud shortcode function
        function tags_cloud_sb_fun( $atts ){
            $args = array('smallest'                  => 8, 
                            'largest'                   => 22,
                            'unit'                      => 'pt', 
                            'number'                    => 45,  
                            'format'                    => 'flat',
                            'separator'                 => " - ",
                            'orderby'                   => 'name', 
                            'order'                     => 'ASC',
                            'exclude'                   => null, 
                            'include'                   => '5,6,222,65,8,22,9,10,11,12,13,14,15,16', 
                            'topic_count_text_callback' => default_topic_count_text,
                            'link'                      => 'view', 
                            'taxonomy'                  => 'post_tag', 
                            'echo'                      => true,
                            'child_of'                  => null, // see Note!
                    );
            $tag_cloud = wp_tag_cloud( $args );
            
            return $tag_cloud;
        }
        add_shortcode( 'tags_cloud_sb', 'tags_cloud_sb_fun' );
}