<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
		<title><?php
		/*
		* Print the <title> tag based on what is being viewed.
		* We filter the output of wp_title() a bit -- see
		* boilerplate_filter_wp_title() in functions.php.
		*/
		wp_title( '|', true, 'right' );
		?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		
        <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/fonts.css">
		<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.css">
        <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/reset.css">
        <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/style.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        
        
        <?php wp_head(); ?>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
<header class="main-header">
	
	<h1 class="logo"><a href="/">Sarah Appleby</a></h1>
	
    <nav class="navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/blog">Blog</a></li>
            <li><a href="/portfolio">Portfolio</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	
	<menu class="social-links">
		<a href="/blog">&#xe027;</a>
		<a href="/blog">&#xe086;</a>
		<a href="/blog">&#xe100;</a>
		<a href="/blog">&#xe264;</a>
	</menu>
	
	
	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>


</header>




