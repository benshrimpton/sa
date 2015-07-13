<?php get_header(); ?>


<section class="container-fluid">
  <div class="row" id="portfolio-grid">
  <?php query_posts('post_type=portfolios, & posts_per_page=24'); ?>
  <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  	<figure class="col-sm-3 folio-thumb">
    	<div class="inner">
    
        <? the_post_thumbnail('large');  ?>
    	
      	<figcaption class="meta">
      	 
      	  <div class="table">
            <div class="table-cell">
              <h2> <a href="<? the_permalink(); ?>" class="folio-link"><? the_title(); ?></a></h2>
              <menu class="share">
                <a href="http://www.facebook.com/sharer.php?u=<? the_permalink(); ?>" target="_blank">&#xe027;</a>
                <a href="http://twitter.com/share?url=<? the_permalink(); ?>&text=<? the_title(); ?>"  target="_blank">&#xe086;</a>
                <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">&#xe064;</a>
              </menu>
            </div>
      	  </div>
      		</a>  
      	</figcaption>
    
    	</div>
  	</figure>
  					
  <?php endwhile; endif;  ?>
  </div>
</section>


<div id="ajax-folio">
	<div class="ajax-folio-closer">
		<img src="<?php bloginfo( 'template_url' ); ?>/css/img/close_2.png" alt="close_2" width="20" height="20" />
	</div>
	<div class="inner"></div>
</div>

<?php get_footer(); ?>