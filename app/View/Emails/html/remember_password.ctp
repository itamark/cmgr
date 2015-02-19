<h2><?php echo Configure::read('Application.name') ?></h2>

<p>For resetting your password, visit the link below: <a href="http://<?php echo $_SERVER['HTTP_HOST'].'/users/remember_password_step_2/'.$hash; ?>"></a>

	</p>

<p>If you did not request a new password, please ignore this email.</p>