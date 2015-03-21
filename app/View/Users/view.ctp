
<!--  <pre>
<?php print_r($comments); ?>
</pre>  -->
<div class="row listing">
  <div class="large-2 columns">
       <img class="media-object" src="/img/users/<?php echo AuthComponent::user('id'); ?>.jpg" style="width:100%; border-radius:50%;">
  </div>
  <div class="large-10 columns">
<h3><?php echo $user['User']['first_name'].' '.$user['User']['last_name']; ?></h3>
<h5><?php echo $user['User']['headline']; ?></h5>
  </div>
<!--   <div class="large-12 columns">
  	
    <div class="large-10 pull-right">
      Headline: 


    </div>
 <div class="large-10">

 </div>
  	
  </div> -->
</div>
<hr>


<div class="row">
<div class="large-12 columns">
<ul class="tabs" data-tab>
  <li class="tab-title active"><a href="#panel11">Posts</a></li>
  <li class="tab-title"><a href="#panel21">Comments</a></li>
<!--   <li class="tab-title"><a href="#panel31">Upvotes</a></li>
 --></ul>
<div class="tabs-content">

  <!-- begin Posts Tab -->
  <div class="content active" id="panel11">
   
    <?php foreach ($items as $item): ?>
          <?php $cmts = count(h($item['Comment'])); ?>
    <div class="row listing">
      <div class="large-1 columns">
<div class="upvote pull-left">
  <?php if (AuthComponent::user('id')): ?>
    <span class="glyphicon glyphicon-arrow-up pull-left upvotearrow 
        <?php foreach ($item['Upvote'] as $upvote){
            if($upvote['item_id'] == $item['Item']['id'] && $upvote['user_id'] == AuthComponent::user('id')){
              echo 'upvoted';
            }
          } ?>" 

          hidden-aria="true" id="item-<?php echo h($item['Item']['id']); ?>">&#9650;</span>
  <?php else: ?>
      <span href="#" data-reveal-id="mustBeModal">&#9650;</span>

  <?php endif ?>

        


          <br>
        <span class="votecount">
          <?php echo $item['Item']['upvotes'] ?>
      </span>
      </div>

      </div>
      <div class="large-10 columns">
<div class="clearfix">

  <?php if($item['Item']['type'] == 'article'): ?>
  <a href="<?php echo h($item['Item']['url']); ?>"><?php echo h($item['Item']['title']); ?>
  <small>(<?php echo parse_url(h($item['Item']['url']))['host']; ?>)</small></a>
 <?php elseif($item['Item']['type'] == 'question'): ?>
  <a class="comments" href="/items/view/<?php echo h($item['Item']['id']); ?>"><?php echo h($item['Item']['title']); ?></a>
 <?php endif; ?>
</div>


<small><a class="comments" href="/items/view/<?php echo h($item['Item']['id']); ?>"><?php echo count(h($item['Comment'])); ?> Comment<?php if($cmts != 1){echo 's';} ?> 
  <?php echo $this->Time->timeAgoInWords($item['Item']['created']); ?>
  </a></small>

      </div>
      <div class="large-1 columns">
 <div class="pull-right"><img class="media-object img-circle" src="/img/users/<?php echo $item['User']['id']; ?>.jpg"></div>
      </div>

    </div>

    <?php endforeach ?>
  </div>




  <!-- begin Comments Tab -->
  <div class="content" id="panel21">

<?php foreach ($comments as $comment): ?>
      <div class="row listing">

<?php echo $this->Html->link($comment['User']['first_name'], array('controller' => 'users', 'action' => 'view', $comment['User']['username'])); ?> commented on 
<a href="/items/view/<?php echo $comment['Item']['id']; ?>"><?php echo $comment['Item']['title']; ?></a> <small><?php echo $this->Time->timeAgoInWords($comment['Comment']['created']); ?></small>
  <br>
<p> <?php echo $comment['Comment']['comment_txt']; ?></p>

  </div>
<?php endforeach; ?>

  </div>




  <!-- begin Upvotes Tab -->
  <div class="content" id="panel31">
    <?php foreach ($upvotes as $upvote): ?>
          <?php $cmts = count(h($upvote['Comment'])); ?>
    <div class="row listing">
      <div class="large-1 columns">
<div class="upvote pull-left">
  <?php if (AuthComponent::user('id')): ?>
    <span class="glyphicon glyphicon-arrow-up pull-left upvotearrow 
        <?php foreach ($upvote['User']['Upvote'] as $upvote){
            if($upvote['item_id'] == $upvote['Item']['id'] && $upvote['user_id'] == AuthComponent::user('id')){
              echo 'upvoted';
            }
          } ?>" 

          hidden-aria="true" id="item-<?php echo h($upvote['Item']['id']); ?>">&#9650;</span>
  <?php else: ?>
      <span href="#" data-reveal-id="mustBeModal">&#9650;</span>

  <?php endif ?>

        


          <br>
        <span class="votecount">
          <?php echo $upvote['Item']['upvotes'] ?>
      </span>
      </div>

      </div>
      <div class="large-10 columns">
<div class="clearfix">

  <?php if($upvote['Item']['type'] == 'article'): ?>
  <a href="<?php echo h($upvote['Item']['url']); ?>"><?php echo h($upvote['Item']['title']); ?>
  <small>(<?php echo parse_url(h($upvote['Item']['url']))['host']; ?>)</small></a>
 <?php elseif($upvote['Item']['type'] == 'question'): ?>
  <a class="comments" href="/items/view/<?php echo h($upvote['Item']['id']); ?>"><?php echo h($upvote['Item']['title']); ?></a>
 <?php endif; ?>
</div>


<small><a class="comments" href="/items/view/<?php echo h($upvote['Item']['id']); ?>"><?php echo count(h($upvote['Comment'])); ?> Comment<?php if($cmts != 1){echo 's';} ?> 
  <?php echo $this->Time->timeAgoInWords($upvote['Item']['created']); ?>
  </a></small>

      </div>
      <div class="large-1 columns">
 <div class="pull-right"><img class="media-object img-circle" src="https://secure.gravatar.com/avatar/<?php echo md5(h($upvote['User']['email'])); ?>?s=50&d=mm"></div>
      </div>

    </div>

    <?php endforeach ?>





 </div>

  </div>
  
</div>

</div>


<!-- <div class="media">
  <a class="pull-left" href="#">
  	
  </a>
  <div class="media-body">
    <h4 class="media-heading"><?php echo $user['username'] ?></h4>
    <strong>Email: </strong><?php echo $user['email'] ?><br/>
	<strong>Role: </strong><?php echo $user['role'] ?>
  </div>
</div>
 -->