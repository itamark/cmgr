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
<body data-controller="<?php echo @$dataController; ?>">




  <div class="contain-to-grid sticky">
      <?php echo $this->element('nav'); ?>


</div>

<!--     <div class="overlaybackground"><div id="commentcontainer"></div></div>
    <div id="slideout">
    </div> -->
	<div id="container">

		<div id="content">

			<div class="container large-12 medium-9 small-12 columns">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>

		<div id="footer">
			
		</div>

	</div>
	<?php echo $this->element('sql_dump'); ?>
  <script>
  $(document).foundation();
  $(document).foundation('reflow', 'off-canvas');
</script>


</body>
</html>
