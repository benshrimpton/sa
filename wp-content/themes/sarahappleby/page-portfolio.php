<?php get_header(); ?>


<section class="container">
<div class="row" id="portfolio-grid">
<?php query_posts('post_type=portfolios, & posts_per_page=24'); ?>
<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	
	<figure class="col-md-4 folio-thumb">
	<a href="<? the_permalink(); ?>">
	
	<? the_post_thumbnail('large');  ?>
	
	<h2><? the_title(); ?></h2>
	
	</a>
	</figure>
					
<?php endwhile; endif;  ?>
</div>
</section>


<div id="ajax-folio">
	<div class="ajax-folio-closer">
		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
	</div>
	<div class="inner"></div>
</div>

<?php get_footer(); ?>