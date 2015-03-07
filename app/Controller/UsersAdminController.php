<?php 
App::import('Controller', 'Users');

class UsersAdminController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add', 'logout', 'change_password', 'remember_password', 'remember_password_step_2');
	}
public $uses = array('User');

public function index() {
	$this->layout = 'admin';
		if (AuthComponent::user('role') != 'admin') {
			throw new ForbiddenException("You're now allowed to do this.");
		}
				$this->User->recursive = 2;

		$users = $this->User->find('all');
$sorted = Set::sort($users, '{n}.User.id', 'desc');
		$this->set('users', $sorted);

	}



}

 ?>