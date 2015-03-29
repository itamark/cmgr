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
 <div class="row listing">
        <?php $comments = count(h($item['Comment'])); ?>
          <div class="large-2 columns">
            <img src="/img/users/<?php echo h($item['Item']['user_id']); ?>.jpg">  
          </div>
          <div class="large-10 columns">
            <div class="row">
              <div class="large-12 columns">
                <?php echo h($item['User']['first_name']); ?> <?php echo h($item['User']['last_name']); ?>
              </div>
            </div>
            <div class="row">
 <div class="large-12 columns">
            <small><?php echo $this->Time->timeAgoInWords($item['Item']['created']); ?></small>  

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
          

  
    </div>



<!--     <div class="row">
      <div class="large-12 columns">
        <?php $comments = count(h($item['Comment'])); ?>
        <div class="row listing">
          <div class="large-12 columns">
            <div class="row">
              <div class="large-11 columns">
                <h3>
                <?php if($item['Item']['type'] == 'article'): ?>
                <a href="<?php echo h($item['Item']['url']); ?>"><?php echo h($item['Item']['title']); ?>
                <small>(<?php echo parse_url(h($item['Item']['url']))['host']; ?>)</small></a>
                <?php elseif($item['Item']['type'] == 'question'): ?>
                <a class="comments" href="/items/view/<?php echo h($item['Item']['id']); ?>"><?php echo h($item['Item']['title']); ?></a>
                <?php endif; ?><h3>
              </div>
              <div class="large-1 columns">
                <i class="fa fa-<?php if($item['Item']['type'] == 'question'){ echo 'question'; } else { echo 'link'; } ?> pull-right"></i>
              </div>
            </div>
          </div>
          <hr>
          <div class="large-12 columns">
            <div class="row">
              
              <div class="large-12 columns">
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
                <div class="pull-left">
                  <a href="/items/view/<?php echo $item['Item']['id']; ?>"><i class="fa fa-comment"></i></a> <br><?php echo count(h($item['Comment'])); ?>
                </div>
                <div class="pull-left" style="padding-left:10px;">
                  <small>Submitted <?php echo $this->Time->timeAgoInWords($item['Item']['created']); ?> by
                  <?php echo $this->Html->link($item['User']['first_name'].' '.$item['User']['last_name'], array('controller' => 'users', 'action' => 'view', $item['User']['username'])); ?>
                  <!-- | <a class="comments" href="/items/view/<?php echo h($item['Item']['id']); ?>"><?php echo count(h($item['Comment'])); ?> Comment<?php if($comments != 1){echo 's';} ?>
                  </a>  -->
               <!--   <?php echo $this->Html->link('Flag', array('controller' => 'items', 'action' => 'flag', $item['Item']['id']), array('class' => 'flag')); ?>
                  </small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <?php endforeach; ?>
    <?php echo $this->Paginator->numbers(); ?>