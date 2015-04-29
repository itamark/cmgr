<div class="listing" style="margin-bottom:20px;">
<?php $comments = count(h($item['Comment'])); ?>

<div class="row">
<div class="one columns">
 <?php if (AuthComponent::user('id')): ?>
  <span class="glyphicon glyphicon-arrow-up pull-left upvotearrow
                    <?php if($item['Item']['upvoted']){
                    echo 'upvoted';
                    } ?>"
                    
                  hidden-aria="true" id="item-<?php echo h($item['Item']['id']); ?>">&#9650;</span>
 <?php else: ?>
   <span href="#" class="needslogin">&#9650;</span>
 <?php endif; ?>

                  <br>
                  <span class="votecount">
                    <?php echo $item['Item']['upvotes'] ?>
                  </span>
</div>
<div class="eleven columns">
  <a href="/users/view/<?php echo $item['User']['username']; ?>">
<img src="<?php echo h($item['User']['image']); ?>" style="width:30px; position:relative; top:9px;">  
<?php echo h($item['User']['first_name']); ?> <?php echo h($item['User']['last_name']); ?></a> <small><?php echo $this->Time->timeAgoInWords($item['Item']['created']); ?></small>
</div>
</div>
<div class="row">
<div class="one columns">&nbsp;</div>
<div class="eleven columns" style="overflow-wrap: break-word;">
  <p><?php echo $this->Text->autoLinkUrls(h($item['Item']['post_comment'])); ?></p>
            
             <?php if(!empty($item['Item']['preview_img'])): ?>
            <hr>
            <div class="row">
              <div class="two columns">
              <a class="" href="<?php echo $item['Item']['preview_link']; ?>">
<img src="<?php echo $item['Item']['preview_img']; ?>" style="width:100%;">
              </a>
              </div>
              <div class="ten columns">
              <a class="" href="<?php echo $item['Item']['preview_link']; ?>">
<h6><?php echo $item['Item']['preview_title']; ?></h6>
                         </a>
              </div>
            </div>
         
            <?php endif; ?>
</div>
</div>
<div class="row">
<div class="one columns">&nbsp;</div>
<div class="eight columns">
 <?php if (AuthComponent::user('id')): ?>

  <?php echo $this->Form->create('Comment', array('url' => array('controller'=>'comments', 'action'=>'add'), 'class' => 'ajaxform', 'id' => 'CommentIndexForm'.$item['Item']['id'])); ?>
  <?php
    echo $this->Form->input('item_id', array('default' => h($item['Item']['id']), 'type' => 'hidden'));
    echo $this->Form->input('user_id', array('default' => h($item['User']['id']), 'type' => 'hidden'));
    echo $this->Form->textarea('comment_txt', array('label' => false, 'placeholder' => 'What do you think?', 'rows' => '1', 'class'=> 'u-full-width'));
  ?>
<?php endif; ?>
</div>
<div class="three columns" style="text-align:center;"> <?php if (AuthComponent::user('id')): ?>
<?php echo $this->Form->end(__('Submit')); ?>

<?php endif; ?>
</div>
</div>


 
<div class="row">
<div class="one columns">&nbsp;</div>
<div class="ten columns commentsview"  id="commentsview<?php echo $item['Item']['id']; ?>">
 <?php foreach($item['Comment'] as $comment): ?>
 <?php  echo $this->element('comment', array(
    "comment" => $comment
)) ?>
<?php endforeach; ?>
</div>
</div>
</div>