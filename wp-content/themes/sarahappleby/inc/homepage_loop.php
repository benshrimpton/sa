<?php query_posts('cat=23,50,16 & posts_per_page=24'); ?>
<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article class="post">
	
	<header>
		<h2><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
		<time><?php the_time('F jS, Y') ?></time>
	</header>
	
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
<?php wp_reset_query(); ?>