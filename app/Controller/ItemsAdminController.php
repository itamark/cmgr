<?php 

App::import('Controller', 'Items');
class ItemsAdminController extends AppController {
public $uses = array('Item');

public function index() {
	$this->layout = 'admin';
		$this->Item->recursive = 2;
		$items = $this->Item->find('all');
$sorted = Set::sort($items, '{n}.Item.score', 'desc');
		$this->set('items', $sorted);
		$this->set('datacontroller', 'itemsAdmin');
	}
}

 ?>