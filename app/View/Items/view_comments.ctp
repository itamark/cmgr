
	<?php foreach ($comments as $comment): ?>
 <div class="row listing">
		<div class="large-1 columns">
<img class="media-object img-circle" src="https://secure.gravatar.com/avatar/<?php echo md5(h($comment['User']['email'])); ?>?s=25&d=mm">
		</div>
		<div class="large-11 columns">
<p><?php echo $comment['Comment']['comment_txt']; ?></p>
<small><?php echo $this->Time->timeAgoInWords($comment['Comment']['created']); ?></small>
		</div>
	</div>
  <?php endforeach; ?>

