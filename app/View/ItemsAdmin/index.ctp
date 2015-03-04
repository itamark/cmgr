
<!--  <pre>
<?php print_r($items); ?>
</pre>  --> 

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Votes/Comm</th>
      <th>Title</th>
      <th>Posted</th>
      <th>Status</th>
      <!-- <th>Resolved</th>
      <th>Live?</th> -->
    </tr>
  </thead>
  <tbody>
<!--     <pre>
<?php print_r($items); ?>
    </pre> -->
    <?php foreach ($items as $item): ?>
    <tr>
      <td><?php echo $item['Item']['id'] ?></td>
      <td><?php echo $item['Item']['upvotes'] ?> / <?php echo count(h($item['Comment'])); ?></td>
      <td><?php echo $item['Item']['title']; ?></td>
      <td><?php echo $this->Time->timeAgoInWords($item['Item']['created']); ?></td>
      <td>
        <?php echo $item['Item']['live']; ?>
        <?php echo $item['Item']['live'] ? '<span class="label success">Live</span>' : ''; ?>
        <?php echo $item['Item']['flagged'] ? '<span class="label alert">Flagged</span>' : ''; ?>
        <?php echo $item['Item']['resolved'] ? '<span class="label default">Resolved</span>' : ''; ?>
      </td>
      <!-- <td><?php echo $item['Item']['flagged']; ?></td>
      <td><?php echo $item['Item']['resolved']; ?></td>
      <td><?php echo $item['Item']['live']; ?></td> -->
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>



<!-- 

<?php foreach ($items as $item): ?>
  <?php echo $item['Item']['score']; ?>
	<div class="row">
		<div class="large-11 push-1 columns">
    <?php $comments = count(h($item['Comment'])); ?>
    <div class="row listing">
    	<div class="large-1 columns">
<div class="upvote pull-left">
  <?php if (AuthComponent::user('id')): ?>
    <span class="glyphicon glyphicon-arrow-up pull-left upvotearrow 
        <?php foreach ($item['User']['Upvote'] as $upvote){
            if($upvote['item_id'] == $item['Item']['id'] && $upvote['user_id'] == AuthComponent::user('id')){
              echo 'upvoted';
            }
          } ?>" 

          hidden-aria="true" id="item-<?php echo h($item['Item']['id']); ?>">&#9650;</span>
  <?php else: ?>
      <span href="#" data-reveal-id="myModal">&#9650;</span>

  <?php endif; ?>

    		


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


<small><a class="comments" href="/items/view/<?php echo h($item['Item']['id']); ?>"><?php echo count(h($item['Comment'])); ?> Comment<?php if($comments != 1){echo 's';} ?> 
  <?php echo $this->Time->timeAgoInWords($item['Item']['created']); ?>
 	</a></small>

    	</div>
    	<div class="large-1 columns">
 <div class="pull-right"><img class="media-object img-circle" src="https://secure.gravatar.com/avatar/<?php echo md5(h($item['User']['email'])); ?>?s=50&d=mm"></div>
    	</div>

    </div>

    </div>
     </div>
     <?php endforeach; ?> -->