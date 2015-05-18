<?php get_header(); ?>


<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="row">
  
  <?php 
  $images = get_field('image');
  ?>
  
  <?php foreach( $images as $image ): ?>
  <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive"/>
  
  <?php endforeach; ?>
</section>
  
<section class="container">
        <? the_content();  ?>
  </section>      
  					
<?php endwhile; endif;  ?>





<?php get_footer(); ?>