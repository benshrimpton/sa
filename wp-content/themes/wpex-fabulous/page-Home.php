<?php
/**
 * The template for displaying all pages.
 * Template name: Home Page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Fabulous WPExplorer Theme
 * @since Fabulous 1.0
 */

get_header(); ?>
<style>
	.sidebar-container { margin-top:-100px;}
	body.page .site-content, body.single .single-post-article, body.single .comments-inner {margin-top: -100px;}
</style>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jPages.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">

<script src="<?php bloginfo('template_url'); ?>/js/jPages.js"></script>

<style>
	.holder{display: block !important;}
</style>
<script>
	jQuery(function() {

		jQuery("div.holder").jPages({
			containerID: "itemContainer"

		});

	});
</script>
<div class="carousel_main" style="width: 100%">
			<div class="carousel_text">
				<h3>What Sarah has been up to ?</h3>
				<h4>FOLLOW ON BLOGLOVIN</h4>
		       </div>
			<div class="carousel_slider">
			<?php echo do_shortcode('[carousel-horizontal-posts-content-slider]');
			//echo"<pre>";
			//print_r($slides);
			//echo "</pre>";
			?>
			</div>
		</div>
	<div id="primary" class="content-area clr">
		
		

		<div id="content" class="site-content left-content" role="main" >
			<div class="middle_content">
				
			<div class="colm-1">
			     <ul class="timeline" id="itemContainer">
				<?php
				//query_posts(array( 'category_name' => 'homepage', 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'DESC'));
				query_posts(array( 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'DESC'));
				while (have_posts()):the_post();
				$postid = $post->ID;
				$meta = get_post_meta($postid);
				$video = $meta['wpex_post_video'][0];
				//echo "<pre>";
				//print_r($meta);
				//echo "<pre>";
				$array_cat = get_the_category($post->ID);
				$cat_slug = array();
				//print_r($array_cat);
				foreach($array_cat AS $value)
				{
					
					//$cat_slug[] = $value->slug;
					//if(($value->slug=="homepage")){
					
				?>
				<li>
					<div class="post">
					<div class="date">
					   <h1>
						<?php 
						echo $date_day = strtoupper(the_time('j', $post->ID));
						?>
						</h1>
					   <p>
					   <?php 
						echo $date_day = strtoupper(the_time('M', $post->ID));
						?>
						</p>
					   </div>
					   <h3>
						<?php
						//foreach($array_cat AS $value)
						//{
						//	
						//	//$cat_slug[] = $value->slug;
						//	if (($value->slug=="uncategorized") || ($value->slug=="homepage") ||  ($value->slug=="popular") || ($value->slug=="carousel") ) {
						//	//echo "Got Irix";
						//	}
						//	else{
						//		// Get the ID of a given category
						//		$category_id = get_cat_ID($value->name);
						//		// Get the URL of this category
						//		$category_link = get_category_link( $category_id );
								?>
								<!--<a class="home_post_cat" href="<?php //echo esc_url( $category_link ); ?>" title="Category Name"><?php //echo $value->name; ?></a>-->
								<?php
						//	}
						//}
						//
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
						<a class="home_post_cat" href="" title="Category Name"><?php echo $arra_tit[0]; ?></a>
					   </h3>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><h2><?php echo substr($title,0,45); ?> </h2></a>
					<div class="home_post_img">
					<a href="<?php the_permalink() ?>">
					    <?php
					    if(!empty($video))
					    {
						if(strpos($video,'vimeo') !== true)
						{
							$v_vid_array = explode(".com/",$video);
						?>
						<iframe src="//player.vimeo.com/video/<?php echo $v_vid_array[1]; ?>?byline=0&amp;portrait=0" width="100%" height="" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						<?php
						}
						elseif(strpos($video,'youtube') !== true){
							$yt_vid_array = explode("v=/",$video);
						?>
						<iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $yt_vid_array[1]; ?>" frameborder="0" allowfullscreen></iframe>
						<?php
						}
					    }
					    else
					    {
						
						if ( function_exists("has_post_thumbnail") && has_post_thumbnail() )
						{
						    the_post_thumbnail(array(200,160), array("class" => "post_img"));
						}
					    }
					    
					     ?>
					</a>
					</div>
		     
					   <p><?php the_excerpt(); ?>
					  </p>
					   
					  <span><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Continue Reading &raquo;</a></span>
					  <div class="tags">
					  <p><?php
						$posttags = get_the_tags();
						//echo "<pre>";print_r($posttags);
						if ($posttags) {
						  foreach($posttags as $tag) {
							$tag_id = $tag->term_id;
							?>
							<a href="<?php echo get_tag_link($tag_id); ?>">
							<?php
								echo $tag->name . '</a> - '; 
						  }
						}
						?></p>
					  </div>
					  </div>
			
				</li>

				<?php
				//}
				}
			endwhile;
			wp_reset_query();
			?>

			</ul>
			<div class="holder">
			</div>
			<div class="clear"></div>
			<!--<div class="post noborder">
			     <div class="date">
			      <h1>17</h1>
					<p>SEPT</p>
				</div>
			      <h3>NEW Hair Trends</h3>
			      <h2>Five Favorites From New York Fashion Week</h2>
			      <div class="post_img"><img src="images/post3.png" alt="post1" class="img-responsive"></div>
			 <p>During the madness of fashion week, the geniuses at Relapse Magazine pulled together two of the most talked about tatted babes in the fashion industry, Lawson Rhys Taylor + Bradey Soireau. Along with Mitchell Belk styling + Molly Goldrick shooting, I did some grooming + we created this editorial…
			</p>
			 
			<span><a href="#">Continue Reading>></a></span>
			<div class="tags">
			<p>BEAUTY - COLOR - FASHION HAIR - HOW TO INSPIRATION INSPIREME - LIVE-BEAUTY - COLOR - FASHION HAIR - HOW TO INSPIRATION INSPIREME</p>
			</div>
			</div>-->
			</div>
			</div>
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" class="clr">
				
					<?php if ( !is_front_page() ) { ?>
						<?php
						// Display featured image
						wpex_page_featured_image(); ?>
						<header class="page-header clr">
							<!--<h1 class="page-header-title"><?php //the_title(); ?></h1>-->
							<?php $str="get_the_title();" ?>
							 <h1 class="page-header-title"><?php wordwrap($str,22,"<br>\n");?></h1>
						</header><!-- #page-header -->
					<?php } ?>
					<div class="entry clr">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links clr">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry -->
				</article><!-- #post -->
				<?php
				if ( get_theme_mod( 'wpex_page_comments' ) ) {
					comments_template();
				} ?>
			<?php endwhile; ?>
			<?php if ( is_user_logged_in() && current_user_can('edit_post', get_the_ID() ) ) { ?>
			<footer class="entry-footer">
				<?php edit_post_link( __( 'Edit this page', 'wpex' ) .' &#8594;', '<span class="edit-link clr">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
			<?php } ?>
			<!--<div class="bottom_read_arch" style="text-align: center;border: 2px solid #8c734b;color: #8c734b;font-weight: bold;text-align: center;padding: 10px 0;"><a  style="color: #8c734b;font-weight: bold;" href="<?php //bloginfo('url'); ?>" >GO TO ARCHIVE</a></div>-->
		</div><!-- #content -->
		<?php //get_sidebar(); ?>
		<aside role="complementary" class="sidebar-container" id="secondary">
			<div class="colm-2">

					<div class="sidebar tags"> 
					<p><?php dynamic_sidebar('Sidebar');?></p>
					
		</aside>
	</div><!-- #primary -->
	<script>
	$(document).ready(function(){
	$('.jp-next').click(function(){
   $("html, body").animate({ scrollTop: 0 }, 500);
 });
 });
 </script>
	
<?php get_footer(); ?>