  <h1>Thanks for signing up!</h1>
                        <h3>We are currently letting select people into CMGR.<br>
                        	If you have a code - please enter it below. If not - <a href="https://twitter.com/itamarok">ask us for one!</a>
                        </h3>
                        <hr class="intro-divider">
                       


<?php echo $this->Form->create('User', array('controller' => 'users', 'action' => 'thanks'));?>
	<?php echo $this->Form->input('secret_code',array(
		'placeholder' => __('Enter your code here'), 'style'=>'width:30%; margin:0 auto;'
		));?>

<?php echo $this->Form->end(__("Submit"), array('class'=>'btn', 'style'=> 'background:#3060A8;'));?>
