<div class="row comment">
	<div class="one columns">
<?php if(!($this->params->params['controller'] == 'users')): ?>
	 <a href="/users/view/<?php echo $comment['User']['username'] ?>">
			<img src="<?php echo $comment['User']['image']; ?>"  
			style="width:30px; border-radius:50%;"
			 title="<?php echo $comment['User']['first_name']; ?> <?php echo $comment['User']['last_name']; ?>">
		</a>

	</div>
	<div class="eleven columns">
		 <p><?php echo $comment['comment_txt']; ?></p>
	</div>
<?php endif; ?>
</div>


