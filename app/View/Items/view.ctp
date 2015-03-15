<div class="row listing">
  <div class="large-12 columns">
  		<h3><a href="<?php echo h($item['Item']['url']); ?>"><?php echo h($item['Item']['title']); ?></a></h3>
<div id="postcomment">
<p><?php echo h($item['Item']['post_comment']); ?></p>
</div>


  </div>
</div>


<header>
	
</header>

<div class="items form col-lg-10 col-lg-offset-1">

<?php if (AuthComponent::user('id')): ?>
	<?php echo $this->Form->create('Comment', array('url' => array('controller'=>'comments', 'action'=>'add'), 'class' => 'ajaxform')); ?>
	<?php
		echo $this->Form->input('item_id', array('default' => h($item['Item']['id']), 'type' => 'hidden'));
		echo $this->Form->input('user_id', array('default' => h($item['User']['id']), 'type' => 'hidden'));
		echo $this->Form->input('comment_txt', array('label' => false, 'placeholder' => 'What do you think?'));
	?>
<?php echo '<div class="row">'; ?>
<?php echo $this->Form->end(__('Submit')); ?>
<?php echo '</div>'; ?>
<?php else: ?>
	<div class="row panel">
		To comment, please <a href="/users/login">sign in</a> or <a href="/sign-up">register</a>.
	</div>
<?php endif ?>

<div id="commentsview">
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
<!--   <li class="list-group-item item-listing" id="comment-<?php echo h($comment['Comment']['id']); ?>">
<img class="media-object" src="https://secure.gravatar.com/avatar/<?php echo md5(h($comment['User']['email'])); ?>?s=25&d=mm">
<p><?php echo $comment['Comment']['comment_txt']; ?></p>
 </li> -->
  <?php endforeach; ?>
</div>
</div>

<!-- 

<div class="items view">
<h2><?php echo __('Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($item['Item']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($item['User']['name'], array('controller' => 'users', 'action' => 'view', $item['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($item['Item']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($item['Item']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($item['Item']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($item['Item']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Item'), array('action' => 'edit', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Item'), array('action' => 'delete', $item['Item']['id']), array(), __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Comments'); ?></h3>
	<?php if (!empty($item['Comment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
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
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
 -->