<?php get_header(); ?>


<?php query_posts('cat=23,50,16 & posts_per_page=24'); ?>
<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<h2><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>

<? endwhile; endif; ?>


<?php get_footer(); ?>