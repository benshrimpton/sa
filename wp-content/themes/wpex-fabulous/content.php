<?php
/**
 * The default template for displaying post content.
 *
 * @package WordPress
 * @subpackage Fabulous WPExplorer Theme
 * @since Fabulous 1.0
 */



/**
	Entries
**/
global $wpex_query;

if ( is_singular() && !$wpex_query ) {

	// Display post featured image
	// See functions/post-featured-image.php
	wpex_post_featured_image();

}

/**
	Posts
**/
else {  ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		$id = get_the_ID();
		// Display post thumbnail
		if ( has_post_thumbnail() && get_theme_mod( 'wpex_blog_entry_thumb', '1' ) == '1' ) { ?>
			<div class="loop-entry-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>">
					<img src="<?php echo wpex_get_featured_img_url(); ?>" alt="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" />
				</a>
			</div>
			<!-- .post-entry-thumbnail -->
		<?php } ?>
		<div class="loop-entry-content clr">
			<header>
				<div class="post-date">
				<h1>
				<?php
				echo post_date($id, 'j');
				?>
				</h1>
				<p>
				<?php
				echo post_date($id, 'M');
				?>
				</p>
				</div>
				<!--
				<a class="sidebar_cat" title="Category Name" href="http://182.71.22.42/sarah/?cat=18">
				<?php
				//echo category_listing($id);
				$title_old = get_the_title();
						if (strpos($title_old,':') !== false) {
							$arra_tit = explode(":",$title_old);
							$title =  $arra_tit[1];
						}
						elseif (strpos($title_old,'/') !== false) {
							$arra_tit = explode("/",$title_old);
							$title =  $arra_tit[1];
						}
						else{
							$title = $title_old;
						}
				?>
				</a>
				-->
				<h4>
					<a title="Category Name" href="" class="home_post_cat"><?php echo $arra_tit[0]; ?></a>
				</h4>
				<h2 class="loop-entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php echo $title; ?></a></h2>
			</header>
			<div class="loop-entry-excerpt entry clr">
				<?php if ( get_theme_mod( 'wpex_entry_content_excerpt','excerpt' ) == 'content' ) {
					the_content();
				} else {
					
					$wpex_readmore = get_theme_mod( 'wpex_blog_readmore', '1' ) ? true : false;
					
					wpex_excerpt( 52, $wpex_readmore );
				} ?>
			</div><!-- .loop-entry-excerpt -->
		</div><!-- .loop-entry-content -->
		<?php
		// Display post meta details
		wpex_post_meta() ;?>
	</article><!-- .loop-entry -->

<?php } ?>