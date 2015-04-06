<!--  <pre>
  <?php print_r(AuthComponent::user()); ?>
</pre>   -->
<!-- Begin MailChimp Signup Form -->
<div class="row">
  <div class="large-12 columns">



    <?php echo $this->Session->flash(); ?>
    

  <?php if (AuthComponent::user('id')): ?>
<div class="row listing">
  
 <?php echo $this->Form->create('Item', array(
        'url' => array(
            'controller'=>'items',
            'action'=>'add'
        ), 'class' => 'postForm'
    )); ?>
  <?php
    // echo $this->Form->input('user_id');
    // echo $this->Form->input('type', array('default' => 'question', 'type' => 'hidden'));
    // echo $this->Form->input('title', array('label' => false, 'placeholder' => 'Question'));
    echo $this->Form->input('post_comment', array('label' => false, 'placeholder' => 'Ask a question', 'rows' => '3'));
    // echo $this->Form->input('url');
  ?>
<?php echo $this->Form->end(__('Post')); ?>
</div>
<?php else: ?>
<div class="row listing">
<span href="#" data-reveal-id="mustBeModal" style="cursor:pointer;">Login with LinkedIn to post.</span>
</div>

  <?php endif; ?>
   
</div>
</div>

      
    <?php //echo $this->Paginator->sort('created', 'Recent'); ?>
    <?php foreach ($items as $item): ?>
      <?php echo $this->element('post', array(
    "item" => $item
)) ?>



    <?php endforeach; ?>
    <?php echo $this->Paginator->numbers(); ?>