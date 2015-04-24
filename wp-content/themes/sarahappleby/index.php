<?php get_header(); ?>

<?php include 'inc/slider.php'; ?>

<section class="container">
	<div class="row">
		<div class="col-md-8">
		<?php include 'inc/homepage_loop.php' ; ?>
		</div>
		<aside class="col-md-4">
		<?php include 'inc/sidebar.php'; ?>	
		</aside>
	</div><!-- END ROW -->
</section>

<?php get_footer(); ?>
