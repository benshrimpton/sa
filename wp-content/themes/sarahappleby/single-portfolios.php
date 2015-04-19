<?php get_header(); ?>

<section class="container">
<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	

<?php
$images = get_field('images');
$image = $images[0];
?>

<?php foreach( $images as $image ): ?>

<img src="<?php echo $image['sizes']['large']; ?>" class="rsImg"/>
<a href="<?php echo $image['sizes']['large']; ?>" class="rsImg"/><?php the_title(); ?><a/>


<?php endforeach; ?>
		
		
		
		
		
					
<?php endwhile; endif;  ?>

</section>


<?php get_footer(); ?>