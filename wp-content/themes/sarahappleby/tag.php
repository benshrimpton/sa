<?php get_header(); ?>


<section class="container">
  <header class="row text-center page-header">
    <h1><?php printf( __( 'Tag Archives: %s', 'boilerplate' ), '' . single_tag_title( '', false ) . '' ); ?></h1>
  </header>
	<div class="row" id="article-grid">
		  <?php include 'inc/tag_loop.php' ; ?>
	</div><!-- END ROW -->
</section>

<?php get_footer(); ?>