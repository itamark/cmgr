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

<?php echo $this->element('post', array(
    "item" => $item
)) ?>

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



