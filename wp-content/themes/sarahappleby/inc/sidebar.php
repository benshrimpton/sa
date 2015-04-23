


<menu class="sudebar-menu">
	<ul>
	<li><a href="/about">WHO IS SARAH?</a></li>
	<li><a href="/catgeory/use">USE</a></li>
	<li><a href="/catgeory/work">WORK</a></li>
	<li><a href="/catgeory/live">LIVE</a></li>
	</ul>
</menu>


<?php $tagargs = array(
'smallest'                  => '12', 
'largest'                   => '12',
'unit'                      => 'px', 
'number'                    => 45,  

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
