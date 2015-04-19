<section class="row homepage-row">
	<div class="container">
	

	<div class="masonry-wrapper row">
			<?php query_posts('cat=23 & posts_per_page=12'); ?>
			<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				
			<article class="col-sm-6 col-md-3 col-lg-3 item-masonry">
				
				<figure>
					<a href="<? the_permalink(); ?>"><? the_post_thumbnail('medium');  ?></a>
				</figure>
				
				<div class="meta">
					<?php 
					$category = get_the_category(); 
					if($category[0]){
					echo '<a href="'.get_category_link($category[0]->term_id ).'" class="category-link">'.$category[0]->cat_name.'</a>';
					}
					?>
					<time><?php the_time('F jS, Y') ?></time>
				</div>
					<h2><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>			
					<? the_excerpt(); ?>
					<p class="author-name-slug"><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></p>
			</article>	
			
			<? endwhile; endif; ?>
			<article class="col-sm-6 col-md-3 col-lg-3 item-masonry ad-item">
			
				<?php //echo adrotate_ad(8); ?>
			
			</article>
			<?php wp_reset_query(); ?>
		</div>
	</div>
</section>