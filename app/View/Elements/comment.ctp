<div>

<?php 
echo '<a href="/users/view/'.$comment['User']['username'].'">';
echo '<img src="/img/users/'.$comment['user_id'].'.jpg" style="width:30px; border-radius:50%;" title="'.$comment['User']['first_name'].' '.$comment['User']['last_name'].'">';
echo '</a>';   
 ?>
 <?php echo $comment['comment_txt'].'<br>'; ?>
</div>



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
