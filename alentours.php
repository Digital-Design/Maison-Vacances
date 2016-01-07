<li>
  <?php preg_match_all('/<img[^>]+>/i',$post->post_content, $result); print_r($result[0][0]);?>
  <span class="text-content"><span><?php echo strip_tags($post->post_content); ?></span></span>
</li>