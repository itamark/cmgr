<!--  <pre>
  <?php print_r(AuthComponent::user()); ?>
</pre>   -->
<!-- Begin MailChimp Signup Form -->
<div class="row">
  <div class="large-12 columns">
    
    <div id="mc_embed_signup" class="row listing alert-box info radius" data-alert>
      <form action="http://cmgr.us9.list-manage.com/subscribe/post?u=a79d5f301ae99a362a69ea02b&amp;id=1f26e7205f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
          <h5>Sign up for our newsletter!</h5>
          <div class="mc-field-gr oup" style="float:left;">
            
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
          <a href="#" class="close">&times;</a>
        </div>
      </div>
    </div>
    <!--  <div class="row">
      <div class="large-12 columns">
        
        <?php echo $this->Paginator->sort('upvotes', 'Top', array('class' => 'button small')); ?>
        <?php echo $this->Paginator->sort('score', 'Hot', array('class' => 'button small')); ?>
        <?php echo $this->Paginator->sort('created', 'Recent', array('class' => 'button small')); ?>
      </div>
    </div> -->
    <?php //echo $this->Paginator->sort('created', 'Recent'); ?>
    <?php foreach ($items as $item): ?>
    <div class="row">
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
                  </a> <?php echo $this->Html->link('Flag', array('controller' => 'items', 'action' => 'flag', $item['Item']['id'])); ?> -->
                  </small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--   <?php echo $item['Item']['score']; ?>
    --> <!-- <div class="row">
      <div class="large-12 columns">
        <?php $comments = count(h($item['Comment'])); ?>
        <div class="row listing">
          <div class="large-11 columns">
            <h3>
            <?php if($item['Item']['type'] == 'article'): ?>
            <a href="<?php echo h($item['Item']['url']); ?>"><?php echo h($item['Item']['title']); ?>
            <small>(<?php echo parse_url(h($item['Item']['url']))['host']; ?>)</small></a>
            <?php elseif($item['Item']['type'] == 'question'): ?>
            <a class="comments" href="/items/view/<?php echo h($item['Item']['id']); ?>"><?php echo h($item['Item']['title']); ?></a>
            <?php endif; ?>
            </h3>
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
            <i class="fa fa-<?php if($item['Item']['type'] == 'question'){ echo 'question'; } else { echo 'link'; } ?>"></i>
            <div class="clearfix">
              <h2>
              <?php if($item['Item']['type'] == 'article'): ?>
              <a href="<?php echo h($item['Item']['url']); ?>"><?php echo h($item['Item']['title']); ?>
              <small>(<?php echo parse_url(h($item['Item']['url']))['host']; ?>)</small></a>
              <?php elseif($item['Item']['type'] == 'question'): ?>
              <a class="comments" href="/items/view/<?php echo h($item['Item']['id']); ?>"><?php echo h($item['Item']['title']); ?></a>
              <?php endif; ?>
              <h2>
            </div>
            <small>Submitted <?php echo $this->Time->timeAgoInWords($item['Item']['created']); ?> by
            <?php echo $this->Html->link($item['User']['first_name'].' '.$item['User']['last_name'], array('controller' => 'users', 'action' => 'view', $item['User']['username'])); ?>
            | <a class="comments" href="/items/view/<?php echo h($item['Item']['id']); ?>"><?php echo count(h($item['Comment'])); ?> Comment<?php if($comments != 1){echo 's';} ?>
            </a> <?php echo $this->Html->link('Flag', array('controller' => 'items', 'action' => 'flag', $item['Item']['id'])); ?></small>
          </div>
          <div class="large-1 columns">
            <div class="pull-right"><img class="media-object img-circle" src="https://secure.gravatar.com/avatar/<?php echo md5(h($item['User']['email'])); ?>?s=50&d=mm"></div>
          </div>
          <hr>
        </div>
      </div>
    </div> -->
    <?php endforeach; ?>
    <?php echo $this->Paginator->numbers(); ?>