
<!-- <pre>
<?php print_r($items); ?>
</pre>  -->
<ul class="list-group  col-lg-8">
    <?php foreach ($items as $item): ?>
    <?php $comments = count(h($item['Comment'])); ?>
    <li class="list-group-item item-listing clearfix" id="item-<?php echo h($item['Item']['id']); ?>">
    	<div class="upvote pull-left">
    		<span class="glyphicon glyphicon-arrow-up pull-left upvotearrow 
    		<?php foreach ($item['User']['Upvote'] as $upvote){
    				if($upvote['item_id'] == $item['Item']['id']){
    					echo 'upvoted';
    				}
    			} ?>" 
    			hidden-aria="true"></span><br>
    		<span class="votecount">
     			<?php echo $item['Item']['upvote_count'] ?>
 			</span>





    	</div>
<div class="content  pull-left"><h4>
<?php if($item['Item']['type'] == 'article'): ?>
 	<a href="<?php echo h($item['Item']['url']); ?>"><?php echo h($item['Item']['title']); ?>
 	<small>(<?php echo parse_url(h($item['Item']['url']))['host']; ?>)</small></a>
 <?php elseif($item['Item']['type'] == 'question'): ?>
 	<a class="comments" href="/items/view/<?php echo h($item['Item']['id']); ?>"><?php echo h($item['Item']['title']); ?></a>
 <?php endif; ?>
 </h4>
        <small>
 	<a class="comments" href="/items/view/<?php echo h($item['Item']['id']); ?>"><?php echo count(h($item['Comment'])); ?> Comment<?php if($comments != 1){echo 's';} ?>
 	</a>
 </small></div>
 <div class="pull-right"><img class="media-object img-circle" src="https://secure.gravatar.com/avatar/<?php echo md5(h($item['User']['email'])); ?>?s=30&d=mm"></div>
    
    </li>
    <?php endforeach; ?>

</ul>
<!-- 
<div class="items index">
	<h2><?php echo __('Items'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($items as $item): ?>
	<tr>
		<td><?php echo h($item['Item']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($item['User']['name'], array('controller' => 'users', 'action' => 'view', $item['User']['id'])); ?>
		</td>
		<td><?php echo h($item['Item']['title']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['url']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['created']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $item['Item']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $item['Item']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $item['Item']['id']), array(), __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->