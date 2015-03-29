
  <div class="row listing">
        <?php $comments = count(h($item['Comment'])); ?>
        <div class="large-1 columns"> 
<div class="upvote pull-left">
                  <?php if (AuthComponent::user('id')): ?>
                  <span class="glyphicon glyphicon-arrow-up pull-left upvotearrow
                    <?php if($item['Item']['upvoted']){
                    echo 'upvoted';
                    } ?>"
                    
                  hidden-aria="true" id="item-<?php echo h($item['Item']['id']); ?>">&#9650;</span>
                  <?php else: ?>
                  <span href="#" data-reveal-id="mustBeModal">&#9650;</span>
                  <?php endif; ?>
                  
                  <br>
                  <span class="votecount">
                    <?php echo $item['Item']['upvotes'] ?>
                  </span>
                </div>
        </div>
          <div class="large-1 columns">
            <img src="/img/users/<?php echo h($item['Item']['user_id']); ?>.jpg">  
          </div>
          <div class="large-9 columns">
            <div class="row">
              <div class="large-12 columns">
                <small><?php echo h($item['User']['first_name']); ?> <?php echo h($item['User']['last_name']); ?></small>
               <br> <small><?php echo $this->Time->timeAgoInWords($item['Item']['created']); ?></small>  
              </div>
            </div>
           

          </div>
          <div class="large-12 columns">
            <?php echo h($item['Item']['post_comment']); ?>
          </div>
          <hr>

          
          <?php 
$commentors = array();
          foreach($item['Comment'] as $comment){
if ( in_array($comment['user_id'], $commentors) ) {
        continue;
    }
    $commentors[] = $comment['user_id'];
echo '<img src="/img/users/'.$comment['user_id'].'.jpg" style="width:30px; border-radius:50%;" title="'.$comment['User']['first_name'].' '.$comment['User']['last_name'].'">';
          } ?>
          

  <?php if (AuthComponent::user('id')): ?>
	<?php echo $this->Form->create('Comment', array('url' => array('controller'=>'comments', 'action'=>'add'), 'class' => 'ajaxform')); ?>
	<?php
		echo $this->Form->input('item_id', array('default' => h($item['Item']['id']), 'type' => 'hidden'));
		echo $this->Form->input('user_id', array('default' => h($item['User']['id']), 'type' => 'hidden'));
		echo $this->Form->input('comment_txt', array('label' => false, 'placeholder' => 'What do you think?'));
	?>
<?php echo $this->Form->end(__('Submit')); ?>
<?php endif; ?>
<div>
	<?php foreach($item['Comment'] as $comment): ?>
	<?php echo $comment['comment_txt'].'<br>'; ?>
<?php endforeach; ?>
</div>
    </div> 