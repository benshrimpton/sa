<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Shape
 * @since Shape 1.0
 */

get_header(); ?>


<section id="primary" class="content-area">
<div id="content" class="site-content" role="main">

<?php if ( have_posts() ) : ?>

<?php the_post(); ?>

	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2>

<?php else: ?>   

		<h2 class="text-center">no results</h2>

<?php endif; ?>

<?php get_footer(); ?>