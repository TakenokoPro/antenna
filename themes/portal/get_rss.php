

<?php
$xml = simplexml_load_file('http://rss.fnn-news.com/fnn_news.xml');
echo "<ul>";   
foreach($xml->channel->item as $entry){
    $entrydate = date ( "Y.m.d",strtotime ( $entry->pubDate ) );
    echo "<li>$entrydate<a href='$entry->link'>$entry->title</a></li>";
}
echo "</ul>";
?>

<!--------------------------------------------------------------------------------->
<!--GET_RSS-->
<article class="article">
<div id="content_box">
<?php
foreach($xml->channel->item as $entry){
?>
<div class="post excerpt <?php echo (++$j % 3 == 0) ? 'last' : ''; ?>">
<header>
	
<a href='<?php echo($entry->link); ?>' 
	 title="<?php echo($entry->title); ?>" 
	 rel="nofollow" 
	 id="featured-thumbnail"
>
	
<?php
preg_match('/<img.*>/i', $entry->description, $entryimg);
?>	
<?php 
if ($entryimg[0]) {
	echo '<div class="featured-thumbnail">'; 
	echo $entryimg[0]; 
	echo '</div>'; 
} else { 
?>
	
<div class="featured-thumbnail">
<img 
		 width="200" 
		 height="110" 
		 src="<?php echo get_template_directory_uri(); ?>/images/nothumb.png"
		 class="attachment-featured wp-post-image" 
		 alt="<?php the_title(); ?>"
>
</div>
<?php } ?>
</a>
<h2 class="title">
<a 
	 href="<?php echo($entry->link); ?>" 
	 title="<?php echo($entry->title); ?>" 
	 rel="bookmark"><?php echo($entry->title); ?>
</a>
</h2>
</header>
<!--.header-->
	
<div class="readMore">
	<a 
		 href="<?php echo($entry->link); ?>" 
		 title="<?php echo($entry->title); ?>" 
		 rel="bookmark">
		<?php _e('Read More','mythemeshop'); ?>
	</a>
</div>
</div><!--.post excerpt-->
	
<?php 
if ($options['mts_pagenavigation'] == '1') {
	pagination($additional_loop->max_num_pages);?>
} else { 
?>
<div class="pnavigation2">
<div class="nav-previous"><?php next_posts_link( __( '&larr; '.'Older posts', 'mythemeshop' ) ); ?></div>
<div class="nav-next"><?php previous_posts_link( __( 'Newer posts'.' &rarr;', 'mythemeshop' ) ); ?></div>
</div>
<?php }} ?>
</div>
</article>