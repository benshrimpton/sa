<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>

<section>
	<div class="container">
				<h1><?php printf( __( 'Search Results for: %s', 'boilerplate' ), '' . get_search_query() . '' ); ?></h1>



<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article class="">
	<h2><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
	<time><?php the_time('F jS, Y') ?></time>
	
	<figure>
		<a href="<? the_permalink(); ?>">
			<? the_post_thumbnail('large');  ?>
		</a>
	</figure>
	
	<div class="meta">
	<?php 
	$category = get_the_category(); 
	if($category[0]){
	echo '<a href="'.get_category_link($category[0]->term_id ).'" class="category-link">'.$category[0]->cat_name.'</a>';
	}
	?>
	</div>
				
	<? the_excerpt(); ?>
	
	
	<p class="author-name-slug"><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></p>

</article>	

<? endwhile; endif; ?>



<?php else : ?>
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'boilerplate' ); ?></p>
					<?php get_search_form(); ?>
	</div>
</section>
<?php get_footer(); ?>
