
	<?php foreach ($comments as $comment): ?>
  <li class="list-group-item item-listing" id="comment-<?php echo h($comment['Comment']['id']); ?>">
<img class="media-object" src="https://secure.gravatar.com/avatar/<?php echo md5(h($comment['User']['email'])); ?>?s=25&d=mm">
<p><?php echo $comment['Comment']['comment_txt']; ?></p>
 </li>
  <?php endforeach; ?>

