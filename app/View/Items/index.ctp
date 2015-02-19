<!-- 
 <pre>
<?php print_r($items); ?>
</pre>  --> 

<!-- Begin MailChimp Signup Form -->

<div class="row">
  <div class="large-11 push-1 columns">
<div id="mc_embed_signup">
<form action="http://cmgr.us9.list-manage.com/subscribe/post?u=a79d5f301ae99a362a69ea02b&amp;id=1f26e7205f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h4>Sign up for our newsletter!</h4>
<div class="mc-field-group" style="float:left;">
	
<div class="row collapse">
        <div class="small-10 columns">
	<input type="email" value="" name="EMAIL" placeholder="Email" class="required email" style="" id="mce-EMAIL">
        </div>
        <div class="small-2 columns">
   <input type="submit" value="Go" name="subscribe" id="mc-embedded-subscribe" class="button small postfix"></div>
        </div>
      </div>
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_a79d5f301ae99a362a69ea02b_1f26e7205f" tabindex="-1" value=""></div>
    
</form>
</div>
  </div>
</div>
<?php foreach ($items as $item): ?>
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

  <?php endif ?>

    		


          <br>
    		<span class="votecount">
     			<?php echo $item['Item']['upvote_count'] ?>
 			</span>
    	</div>

    	</div>
    	<div class="large-10 columns">
<div class="clearfix">
  <?php echo $item['Item']['score']; ?>
	<?php if($item['Item']['type'] == 'article'): ?>
 	<a href="<?php echo h($item['Item']['url']); ?>"><?php echo h($item['Item']['title']); ?>
 	<small>(<?php echo parse_url(h($item['Item']['url']))['host']; ?>)</small></a>
 <?php elseif($item['Item']['type'] == 'question'): ?>
 	<a class="comments" href="/items/view/<?php echo h($item['Item']['id']); ?>"><?php echo h($item['Item']['title']); ?></a>
 <?php endif; ?>
</div>


<small><a class="comments" href="/items/view/<?php echo h($item['Item']['id']); ?>"><?php echo count(h($item['Comment'])); ?> Comment<?php if($comments != 1){echo 's';} ?> 
  <?php echo $this->Time->timeAgoInWords($item['Item']['created']); ?>
   <?php echo strtotime($item['Item']['created']); ?>
 	</a></small>

    	</div>
    	<div class="large-1 columns">
 <div class="pull-right"><img class="media-object img-circle" src="https://secure.gravatar.com/avatar/<?php echo md5(h($item['User']['email'])); ?>?s=50&d=mm"></div>
    	</div>

    </div>

    </div>
     </div>
     <?php endforeach; ?>

<div id="myModal" class="reveal-modal" data-reveal>
  <h2>You must be logged in</h2>
  <?php echo $this->element('form_login') ?>
</div>
