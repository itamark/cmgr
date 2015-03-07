	<div class="medium-6 push-3 columns">


<?php
echo $this->Html->link(
    '',
    '/auth/linkedin',
    array('id' => 'linkedinbutton')
);
?>

		<!-- <?php echo $this->Form->create('User',array(
												'url' => array(
													'controller' => 'users',
													'action' => 'login'
												)));?>
		<div class="text-centered">
			<h2><?php echo Configure::read('Application.name') ?></h2>
		</div>

		<hr>
		  <?php echo $this->Form->input('email', array('label' => false, 'placeholder' => 'Email'));?>
		  <?php echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Password'));?>
		  <div class="form-group">
		  	<?php echo $this->Html->link(__('Forgot your password?'),array('controller' => 'users','action' => 'remember_password')) ?>
		  </div>
		  <div class="checkbox">
		    <label>
		      <input type="checkbox" name="data[User][remember_me]" value="S"> <?php echo __('Remember me')?>
		    </label>
		  </div>
		  <button type="submit" class="button right small"><?php echo __('Login')?></button>
		</form> -->


	</div>
