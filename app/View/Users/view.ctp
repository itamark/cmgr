<div class="row listing">
  <div class="two columns">
       <img class="media-object" src="<?php echo $user['User']['image']; ?>" style="width:100%; border-radius:50%;">
  </div>
  <div class="ten columns">
<h3><?php echo $user['User']['first_name'].' '.$user['User']['last_name']; ?></h3>
<h5><?php echo $user['User']['headline']; ?></h5><br>
 <a href="<?php echo $user['User']['linkedin_link']; ?>">View LinkedIn Profile</a>
  </div>
</div>

<ul class="tabs">
  <!-- Give href an ID value of corresponding "tabs-content" <li>'s -->
  <li><a class="active" href="#poststab">Posts</a></li>
  <li><a href="#commentstab">Comments</a></li>
</ul>
 
<!-- Standard <ul> with class of "tabs-content" -->
<ul class="tabs-content">
  <!-- Give ID that matches HREF of above anchors -->
  <li class="active" id="poststab">
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
  <a href="<?php echo h($item['Item']['url']); ?>"><?php echo h($item['Item']['post_comment']); ?>
  <small>(<?php echo parse_url(h($item['Item']['url']))['host']; ?>)</small></a>
 <?php elseif($item['Item']['type'] == 'question'): ?>
  <a class="comments" href="/items/view/<?php echo h($item['Item']['id']); ?>"><?php echo h($item['Item']['post_comment']); ?></a>
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
  </li>
  <li id="commentstab">


<?php foreach ($comments as $comment): ?>
      <div class="row listing">

<?php echo $this->Html->link($comment['User']['first_name'], array('controller' => 'users', 'action' => 'view', $comment['User']['username'])); ?> commented on 
<a href="/items/view/<?php echo $comment['Item']['id']; ?>"><?php echo $this->Text->truncate($comment['Item']['post_comment'],
    75,
    array(
        'ellipsis' => '...',
        'exact' => false
    )); ?></a> <small><?php echo $this->Time->timeAgoInWords($comment['Comment']['created']); ?></small>
  <br>
<p> <?php echo $comment['Comment']['comment_txt']; ?></p>

  </div>
<?php endforeach; ?>
  </li>
</ul>



