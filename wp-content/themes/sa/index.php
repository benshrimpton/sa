<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
<header>
	<h1><a href="/">Sarah Appleby</a></h1>
	<nav>
		<a href="/blog">Blog</a>
		<a href="/portfolio">Portfolio</a>
		<a href="/about">About</a>
		<a href="/contact">Contact</a>
	</nav>
	

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>"/>

	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>

	
	<menu>
		<a href="/blog">FACEBOOK</a>
		<a href="/blog">TWITTER</a>
		<a href="/blog">INSTAGRAM</a>
		<a href="/blog">PINTEREST</a>
	</menu>

</header>


<section class="instagram">
	
	Instagram feed.
	
</section>


<menu>
	<a href="/catgeory/use">Use</a>
	<a href="/catgeory/work">Work</a>
	<a href="/catgeory/live">Live</a>
</menu>



<section class="container">
	<div class="row">
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
</section>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
e=o.createElement(i);r=o.getElementsByTagName(i)[0];
e.src='https://www.google-analytics.com/analytics.js';
r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>
</html>