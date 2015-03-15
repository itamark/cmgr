<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'New Project');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html class="<?php if($this->params['controller'] == 'users' && $this->params['action'] == 'login'){ echo 'login-page'; } ?>">
<head>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'CMGR' ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('foundation');
    echo $this->Html->css('normalize');
        echo $this->Html->css('main');

        // echo $this->Html->css('main');

		echo $this->Html->script('jquery.min');
		echo $this->Html->script('foundation.min');
        echo $this->Html->script('modernizr');
        echo $this->Html->script('placeholder');
                echo $this->Html->script('fastclick');


    echo $this->Html->script('scripts');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">



  <div class="contain-to-grid">
      <?php echo $this->element('nav'); ?>
</div>
  <div class="contain-to-grid subnav">
      <?php echo $this->element('subnav'); ?>
</div>

<!--     <div class="overlaybackground"><div id="commentcontainer"></div></div>
    <div id="slideout">
    </div> -->
	<div id="container">

		<div id="content">

      <div class="large-4 medium-4 push-8 columns">
<ul class="side-nav">
<li>
  <?php if (AuthComponent::user('id')): ?>
  <a href="#" class="button small right-off-canvas-toggle" style="  width: 100%;">Submit a Question or Link</a>
<?php else: ?>
      <a href="#" data-reveal-id="mustBeModal" class="button small"  style="  width: 100%;">Submit a Question or Link</a>
    <?php endif; ?>
</li>
<li class="module" style="">
  <?php if( AuthComponent::user('id')): ?>
  <div style="  width: 100%;
 
  text-align: center;"><img src="/img/users/<?php echo AuthComponent::user('id'); ?>.jpg" style=" border-radius:50%;"></div>
<?php endif; ?>
  
<div style="">Welcome<?php if(!AuthComponent::user('first_name')){ echo '!'; } else { echo ', '.AuthComponent::user('first_name').'!'; } ?><br>
  <?php if(!AuthComponent::user('id')): ?>
<p>CMGR gives community builders from all over the world a platform to share ideas and experience with one another.</p>
<?php endif; ?>

</div>
</li>
<!-- <li><a href="#">Jobs</a></li>
<li><a href="#">Discussion</a></li>
<li><a href="#">CMGR Newsletter</a></li>
<li><a href="#">Section 5</a></li>
<li><a href="#">Section 6</a></li> -->
</ul>

</div>
  </div>
  <div id="mustBeModal" class="reveal-modal" data-reveal>
  <h2>You must be logged in</h2>
 <!--  <?php echo $this->element('form_login') ?> -->
 <a href="/auth/linkedin"><img src="/img/Sign-in-Large---Default.png"></a>
</div>
<div id="loginModal" class="reveal-modal" data-reveal>
  <h2>Login</h2>
 <a href="/auth/linkedin"><img src="/img/Sign-in-Large---Default.png"></a>
</div>
      

      <aside class="right-off-canvas-menu">
        
        <div class="row">
          <div class="large-12 columns">

<ul class="tabs" data-tab>
  <li class="tab-title active"><a href="#panel1">Post a Link</a></li>
  <li class="tab-title"><a href="#panel2">Ask a Question</a></li>
</ul>
<div class="tabs-content">
  <div class="content active" id="panel1">
<?php echo $this->Form->create('Item', array(
        'url' => array(
            'controller'=>'items',
            'action'=>'add'
        ), 'class' => 'ajaxform'
    )); ?>
    <h4><?php echo __('Post an Article'); ?></h4>
  <?php
    // echo $this->Form->input('user_id');
    echo $this->Form->input('type', array('default' => 'article', 'type' => 'hidden'));
    echo $this->Form->input('title', array('label' => false, 'placeholder' => 'Title'));
    echo $this->Form->input('url', array('label' => false, 'placeholder' => 'Link'));
    echo $this->Form->input('post_comment', array('label' => false, 'placeholder' => 'Comment'));
  ?>
<?php echo $this->Form->end(__('Submit')); ?>
  </div>
  <div class="content" id="panel2">
<?php echo $this->Form->create('Item', array(
        'url' => array(
            'controller'=>'items',
            'action'=>'add'
        ), 'class' => 'ajaxform'
    )); ?>
    <h4><?php echo __('Ask a Question'); ?></h4>
  <?php
    // echo $this->Form->input('user_id');
    echo $this->Form->input('type', array('default' => 'question', 'type' => 'hidden'));
    echo $this->Form->input('title', array('label' => false, 'placeholder' => 'Question'));
    echo $this->Form->input('post_comment', array('label' => false, 'placeholder' => 'Comment'));
    // echo $this->Form->input('url');
  ?>
<?php echo $this->Form->end(__('Submit')); ?>
  </div>

</div>


          </div>
        </div>



    </aside>
    <a class="exit-off-canvas"></a>
			<div class="container large-8 medium-8 small-12 pull-4 columns">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>

		<div id="footer">
			
		</div>
  </div>
	</div>
  </div>
	<?php echo $this->element('sql_dump'); ?>
  <script>
  $(document).foundation();
  $(document).foundation('reflow', 'off-canvas');
</script>


</body>
</html>
