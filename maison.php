<article>
	<div class="article-maison-text">
		<h2><?php echo($post->post_title); ?></h2>
		<p><?php echo strip_tags($post->post_content); ?></p>
	</div>
	<?php preg_match_all('/<img[^>]+>/i',$post->post_content, $result); print_r($result[0][0]);?>
</article>