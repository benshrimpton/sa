<menu class="sidebar-menu">
	<ul>
  	<li><a href="/about/">WHO IS SARAH?</a></li>
  	<li><a href="/catgeory/use/">USE</a></li>
  	<li><a href="/catgeory/work/">WORK</a></li>
  	<li><a href="/catgeory/live/">LIVE</a></li>
	</ul>
</menu>
<div class="tags-wrap">
<?php $tagargs = array(
'smallest'                  => '12', 
'largest'                   => '12',
'unit'                      => 'px', 
'number'                    => 20,  
'format'                    => 'list',
/*
'separator'                 => "\n",
'orderby'                   => 'name', 
'order'                     => 'ASC',
'exclude'                   => null, 
'include'                   => null, 
'topic_count_text_callback' => default_topic_count_text,
'link'                      => 'view', 
'taxonomy'                  => 'post_tag', 
'echo'                      => true,
'child_of'                  => null, // see Note!
*/
); ?>
<?php wp_tag_cloud( $tagargs ); ?>
<a href="/tagged/" class="see-more-tags">See more tags <span>&raquo;</span></a>
</div>

<div class="blog-lovin-cta">
  <a hef="">
    Follow me on Bloglovin
  </a>
</div>

<div class="popular-posts">
  <h3>Popular Posts</h3>
</div>

<div class="ad-banner sidebar-ad">
 <a hef="">
  <img src="http://placehold.it/300x600" class="">
</a>
</div>

<div class="follow-on-instagram">
  <h3>Follow On Instagram<h3>
    <img src="http://placehold.it/250x250">
</div>
