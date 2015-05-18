<?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article class="post">
	<header>
		<date date-time="<?php the_time('d:M:y'); ?>">
			<span class="time-day"><?php the_time('d'); ?></span>
			<span class="time-month"><?php the_time('M'); ?></span>
		</date>
		
		<div class="heading">
		  <h3><? the_field('sub_title'); ?></h3>
      <h2><a href="<? the_permalink(); ?>" class="pjax"><? the_title(); ?></a></h2>
		</div>
    <?php /* 
    <div class="meta">
    <?php
    $category = get_the_category(); 
    if($category[0]){
    echo '<a class="pjax" href="'.get_category_link($category[0]->term_id ).'" class="category-link">'.$category[0]->cat_name.'</a>';
    }
    ?>
    </div>
    */ ?>	
	</header>
	<figure>
		<a href="<? the_permalink(); ?>" class="pjax">
			<? the_post_thumbnail('large');  ?>
		</a>
	</figure>
	
	<div class="excertp">
		<?php the_content(); ?>
		<p class="author-name-slug">
			<?php the_author_firstname(); ?> <?php the_author_lastname(); ?>
		</p>
		<p class="read-more"><a href="/blog" class="pjax">BACK TO BLOG</a></p>
		<div class="post-tags">
		<?php
		$posttags = get_the_tags();
		if ($posttags) {
			foreach($posttags as $tag) {
				echo '<a href="/tag/'.$tag->slug.'"/>'.$tag->name.'</a> '; 
			}
		}
		?>
		
	</div>

  <p class="read-more prev-next">	
  <?php previous_post_link('%link', 'PREVIOUS' ); ?>
  <?php next_post_link('%link', 'NEXT' ); ?>
  <?php #next_post_link( '%link &rarr;', '%title' ) ?>
  </p>
     
	</div>
</article>	
<? endwhile; endif; ?>
<?php wp_reset_query(); ?>