<section class="slide-wrapper">
<section id="homepage-gallery" class="royalSlider rsDefault">
<?php query_posts('post_type=homeslider, & posts_per_page=1'); ?>
<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php
$images = get_field('images');
$image = $images[0];
?>
<?php foreach( $images as $image ): ?>
<a href="<?php echo $image['sizes']['large']; ?>" class="rsImg"/></a>
<?php endforeach; ?>
<?php endwhile; endif;  ?>
<?php wp_reset_query(); ?>
</section>

  <div class="instgram-feed-wrapper">
    <div class="instgram-feed-inner container">
      <div class="instagram-feed-notice">
        <h3>What Sarah has been up to?</h3>
        <a href="https://www.bloglovin.com/blogs/sarah-appleby-blog-7335823" target="_blank">Follow on Bloglovin</a>
      </div>
      <div class="instagram-feed-carousel">
        <div id="owl-demo" class="touchcarousel black-and-white">
          <ul class="touchcarousel-container" id="instagram-feed">
          <!--
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
            <li class="touchcarousel-item"><img src="http://placehold.it/120x120" alt="Owl Image"></li>
          -->
          </ul>
        </div>
      </div>
    </div>
  </div>
 
</section>