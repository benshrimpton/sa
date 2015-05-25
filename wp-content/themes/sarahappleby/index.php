<?php get_header(); ?>

<?php include 'inc/slider.php'; ?>

<section class="container">
	<div class="row">
		<div class="col-md-9 blog-col">
		<?php include 'inc/homepage_loop.php' ; ?>
		</div>
		<aside class="col-md-3 right-sidebar">
		<?php include 'inc/sidebar.php'; ?>	
		</aside>
	</div><!-- END ROW -->
</section>

<?php get_footer(); ?>
