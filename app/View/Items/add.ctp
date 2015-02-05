<header>
	<h2>New Item</h2>
</header>
<div class="items form col-lg-10 col-lg-offset-1">

<ul class="nav nav-tabs" role="tablist" id="myTab">
  <li role="presentation" class="active"><a href="#article" aria-controls="article" role="tab" data-toggle="tab">Post an Article</a></li>
  <li role="presentation"><a href="#question" aria-controls="question" role="tab" data-toggle="tab">Ask a Question</a></li>
</ul>

<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="article">

<?php echo $this->Form->create('Item'); ?>
	<fieldset>
		<legend><?php echo __('Post an Article'); ?></legend>
	<?php
		// echo $this->Form->input('user_id');
		echo $this->Form->input('type', array('default' => 'article', 'type' => 'hidden'));
		echo $this->Form->input('title');
		echo $this->Form->input('url');
		echo $this->Form->input('post_comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
  </div>
  <div role="tabpanel" class="tab-pane" id="question">
<?php echo $this->Form->create('Item'); ?>
	<fieldset>
		<legend><?php echo __('Ask a Question'); ?></legend>
	<?php
		// echo $this->Form->input('user_id');
		echo $this->Form->input('type', array('default' => 'question', 'type' => 'hidden'));
		echo $this->Form->input('title');
		echo $this->Form->input('post_comment');
		// echo $this->Form->input('url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
  </div>
</div>




</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->