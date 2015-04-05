<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Fabulous WPExplorer Theme
 * @since Fabulous 1.0
 */

get_header();
?>
<style>
	.sidebar-container { margin-top:-100px;}
	body.page .site-content, body.single .single-post-article, body.single .comments-inner {margin-top: -100px;}
</style>
<link rel="stylesheet" href="<script src="<?php bloginfo('template_url'); ?>/css/jPages.css">
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
			$cat = get_category( get_query_var( 'cat' ) );
			$cat_id = $cat->cat_ID;
			$cat_name = $cat->name;
			$cat_slug = $cat->slug;
			?>
			</div>
		</div>
	<div id="primary" class="content-area clr">
		

		<div id="content" class="site-content left-content" role="main" style="max-width: 66%;width: 670px;margin-top: -100px !important;">
			<h3>Category: <?php echo $cat_name; ?></h3>
			<div class="middle_content">
				
			<div class="colm-1" style="margin-top: 0 !important;">
			     <ul class="timeline" id="itemContainer">
				<?php
				query_posts(array( 'category_name' => $cat_slug, 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'DESC'));
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
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><h2><?php echo $title; ?> </h2></a>
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
			endwhile;
			wp_reset_query();
			?>

			</ul>
			<div class="holder">
			</div>
			<div class="clear"></div>
			
			</div>
			</div>
			<div class="bottom_read_arch" style="clear: both;text-align: center;border: 2px solid #8c734b;color: #8c734b;font-weight: bold;text-align: center;padding: 10px 0;"><a  style="color: #8c734b;font-weight: bold;" href="<?php bloginfo('url'); ?>/?page_id=9" >GO TO ARCHIVE</a></div>
		</div><!-- #content -->

		<aside role="complementary" class="sidebar-container" id="secondary">
			<div class="colm-2">

					<div class="sidebar tags"> 
					<p><?php dynamic_sidebar('Sidebar');?></p>
					
		</aside>
	</div><!-- #primary -->
<?php get_footer(); ?>
