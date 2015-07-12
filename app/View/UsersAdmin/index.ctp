<!-- 
<pre>
<?php print_r($users); ?>
</pre> -->
<div class="row">
  <div class="col-lg-10"><h3><?php echo __('Users')?></h3></div>
  <div class="col-lg-2">
    <?php echo $this->Html->link(__('Add User'),'/users/add',array('class' => 'btn btn-primary pull-right','style' => 'margin-top: 15px')) ?>
  </div>
</div>

<div class="row">

	<div class="col-12">
		<?php echo $this->Session->flash() ?>

    <hr>

<table class="u-full-width">
  <thead>
    <tr>
      <th>#</th>
      <th>Uer</th>
      <th>Role</th>
      <th>Email</th>
            <th>Last Login</th>

      <th>Access</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach( $users as $user ){ ?>
    <tr>
      <td><?php echo $user['User']['id'] ?></td>
      <td><?php echo $user['User']['first_name'].' '.$user['User']['last_name'] ?></td>
      <td><?php echo $user['User']['role'] ?></td>
      <td><?php echo $user['User']['email'] ?></td>
      <td><?php echo $user['User']['last_login'] ?></td>
      <td><?php echo $user['User']['has_access'] ?></td>
      <td><?php echo $this->Html->link(__('View'),'/users/view/'.$user['User']['username']) ?> |
            <?php echo $this->Html->link(__('Edit'),'/users/edit/'.$user['User']['id']) ?> |
            <?php echo $this->Html->link(__('Delete'),'/users/delete/'.$user['User']['id']) ?> |

            <?php if($user['User']['has_access']): ?>
            <?php echo $this->Html->link(__('Revoke Access'),'/users/revoke/'.$user['User']['id']) ?> |
          <?php else: ?>
          <?php echo $this->Html->link(__('Grant Access'),'/users/grant/'.$user['User']['id']) ?> |
        <?php endif; ?></td>
    </tr>
            <?php } ?>

  </tbody>
</table>


   <!--  <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>User</th>
          <th><?php echo __('Role') ?></th>
          <th>Admin</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach( $users as $user ){ ?>
        <tr>
          <td width="50px"><?php echo $user['User']['id'] ?></td>
          <td><?php echo $user['User']['username'] ?></td>
          <td><?php echo $user['User']['role'] ?></td>
          <td><?php echo $user['User']['has_access'] ?></td>
          <td width="150px">
            <?php echo $this->Html->link(__('View'),'/users/view/'.$user['User']['username']) ?> |
            <?php echo $this->Html->link(__('Edit'),'/users/edit/'.$user['User']['id']) ?> |
            <?php echo $this->Html->link(__('Delete'),'/users/delete/'.$user['User']['id']) ?> |

            <?php if($user['User']['has_access']): ?>
            <?php echo $this->Html->link(__('Revoke Access'),'/users/revoke/'.$user['User']['id']) ?> |
          <?php else: ?>
          <?php echo $this->Html->link(__('Grant Access'),'/users/grant/'.$user['User']['id']) ?> |
        <?php endif; ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table> -->
  </div>
</div>




