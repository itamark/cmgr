<!-- <table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Comment Txt'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($item['Comment'] as $comment): ?>
		<tr>
			<td><?php echo $comment['id']; ?></td>
			<td><?php echo $comment['item_id']; ?></td>
			<td><?php echo $comment['user_id']; ?></td>
			<td><?php echo $comment['comment_txt']; ?></td>
			<td><?php echo $comment['created']; ?></td>
			<td><?php echo $comment['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), array(), __('Are you sure you want to delete # %s?', $comment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table> -->
	<?php foreach ($comments as $comment): ?>
  <li class="list-group-item item-listing" id="comment-<?php echo h($comment['Comment']['id']); ?>">
<img class="media-object" src="https://secure.gravatar.com/avatar/<?php echo md5(h($comment['User']['email'])); ?>?s=25&d=mm">
<p><?php echo $comment['Comment']['comment_txt']; ?></p>
 </li>
  <?php endforeach; ?>

	<pre>
		<?php print_r($comments); ?>
	</pre>