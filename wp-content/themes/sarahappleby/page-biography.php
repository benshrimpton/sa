<?php get_header(); ?>


<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="row bio-wrap">
  
  <?php 
  $images = get_field('image');
  ?>
  
  <?php foreach( $images as $image ): ?>
  <figure class="bio-img">
    <img src="<?php echo $image['sizes']['extra_large']; ?>" alt="<?php echo $image['alt']; ?>" class="img-responsive"/>
<!--    <img src="http://applebywebsite.s3.amazonaws.com/wp-content/uploads/2015/05/SARAH_APPLEBY_JANET_KIM_BIO_PHOTO-1800x600.jpeg" class="img-responsive"/> -->
    
  </figure>
  
  <?php endforeach; ?>
</section>
  
<section class="container bio-text">
        <h2 class="about-heading">
        <?php the_title(); ?>
        </h2>
        <? the_content();  ?>
  </section>      
  					
<?php endwhile; endif;  ?>





<?php get_footer(); ?>