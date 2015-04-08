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
           <?php if(!empty($item['Item']['preview_img'])): ?>
          <a class="large-12 columns listing" href="<?php echo $item['Item']['preview_link']; ?>">
           
            <div href="#" class="large-4 columns">
 <img src="<?php echo $item['Item']['preview_img']; ?>">
            </div>
            <div href="#" class="large-8 columns">
           <h6><?php echo $item['Item']['preview_title']; ?></h6>
           <small><?php echo $item['Item']['preview_txt']; ?></small>
            </div>
          </a>
            <?php endif; ?>
          <hr>
<div class="large-12 columns">
<!-- <span class="count-icon">
 -->    <!-- <i class="fa fa-2x fa-comment"></i> -->

    <span class="count"><?php echo $comments; ?> comments</span>
<!-- </span>
 -->

          <?php 
$commentors = array();
          foreach($item['Comment'] as $comment){




if ( in_array($comment['user_id'], $commentors) ) {
        continue;
    }
    $commentors[] = $comment['user_id'];
echo '<a href="/users/view/'.$comment['User']['username'].'">';
echo '<img src="/img/users/'.$comment['user_id'].'.jpg" style="width:30px; border-radius:50%;" title="'.$comment['User']['first_name'].' '.$comment['User']['last_name'].'">';
echo '</a>';
          } ?>
          

  <?php if (AuthComponent::user('id')): ?>

	<?php echo $this->Form->create('Comment', array('url' => array('controller'=>'comments', 'action'=>'add'), 'class' => 'ajaxform', 'id' => 'CommentIndexForm'.$item['Item']['id'])); ?>
	<?php
		echo $this->Form->input('item_id', array('default' => h($item['Item']['id']), 'type' => 'hidden'));
		echo $this->Form->input('user_id', array('default' => h($item['User']['id']), 'type' => 'hidden'));
		echo $this->Form->input('comment_txt', array('label' => false, 'placeholder' => 'What do you think?', 'rows' => '1'));
	?>
<?php echo $this->Form->end(__('Submit')); ?>
<?php endif; ?>

<div class="commentsview large-12" id="commentsview<?php echo $item['Item']['id']; ?>">
 <?php foreach($item['Comment'] as $comment): ?>
      <?php  echo $this->element('comment', array(
    "comment" => $comment
)) ?>
<?php endforeach; ?>
  </div>
</div>

    </div> 
