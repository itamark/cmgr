<?php foreach ($comments as $comment): ?>
<div class="row comment">
	<div class="one columns">
		<a href="/users/view/<?php echo $comment['User']['username'] ?>">
			<img src="<?php echo $comment['User']['image']; ?>"  
			style="width:30px; border-radius:50%;"
			 title="<?php echo $comment['User']['first_name']; ?> <?php echo $comment['User']['last_name']; ?>">
		</a>
	</div>
	<div class="eleven columns">
		 <p><?php echo $comment['Comment']['comment_txt']; ?></p>
	</div>
</div>
  <?php endforeach; ?>




<!-- 	<?php foreach ($comments as $comment): ?>
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




  <div>
	<?php foreach($item['Comment'] as $comment): ?>
	<?php echo $comment['comment_txt'].'<br>'; ?>
<?php endforeach; ?>
</div>
 -->
