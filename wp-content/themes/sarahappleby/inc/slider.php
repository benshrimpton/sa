<?php
$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
$isiPhone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPhone');
$isAndroid = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Android');
?>
<section class="slide-wrapper">
<section id="homepage-gallery" class="royalSlider rsDefault">
<?php query_posts('post_type=homeslider, & posts_per_page=1'); ?>
<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php
$images = get_field('images');
$image = $images[0];
?>
<?php foreach( $images as $image ): ?>

  <?php if( $isiPhone ||  $isAndroid ):?>
     <div class="slide"><a href="<?php echo $image['sizes']['large']; ?>" class="rsImg"/></a></div>
  <?php else: ?>
      <div class="slide"><a href="<?php echo $image['sizes']['extra_large']; ?>" class="rsImg"/></a></div>
  <?php endif; ?>  
 
<?php endforeach; ?>
<?php endwhile; endif;  ?>
<?php wp_reset_query(); ?>
</section>

  <div class="instgram-feed-wrapper">
    <div class="instgram-feed-inner container">
      <div class="instagram-feed-notice">
        <h3>Currently Sarah</h3>


      <?php if( $isiPhone ||  $isAndroid ):?>
      <a href="instagram://user?username=oksarahappleby" target="_blank">Follow on Instagram</a>
      <?php else: ?>
      <a href="https://instagram.com/oksarahappleby/" target="_blank">Follow on Instagram</a>
      <?php endif; ?>  

      </div>
      <div class="instagram-feed-carousel">
        <div id="owl-demo" class="touchcarousel black-and-white">
          <ul class="touchcarousel-container" id="instagram-feed">
          <!-- ajax populate -->
          </ul>
        </div>
      </div>
    </div>
  </div>
 
</section>