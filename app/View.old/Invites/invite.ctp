<div class="row">
  <div class="col-lg-4 col-lg-offset-4">
    <?php echo $this->Form->create('Invite', array('controller'=>'invites', 'action'=>'invite'));?>
    <div class="center">
      <h2>Invite to CMGR!</h2>
    </div>

    <hr>
      
        <?php echo $this->Form->input('invitee_email', array(
            'label' => __('Invitee Email'),
            )); ?>

        <?php echo $this->Form->end(__("Submit"));?>
  </div>
</div>
