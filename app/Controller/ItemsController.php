<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 */
class ItemsController extends AppController {

public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}


public $uses = array('Item', 'Upvote');

public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Item.created' => 'desc'
        )
    );
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');



/**
 * index method
 *
 * @return void
 */
	public function index() {
		$newitems = [];
		$this->Item->recursive = 2;
		$items = $this->Item->find('all');
		foreach($items as $key=>$item){
			$upvotes = $this->Upvote->find('count', array('conditions' => array('Upvote.item_id' => $item['Item']['id'])));
			$item['Item']['upvote_count'] = $upvotes;
			array_push($newitems, $item);
		}
		$this->set('items', $newitems);
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {

		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
		$this->set('item', $this->Item->find('first', $options));
		$this->set('comments', $this->Item->Comment->find('all', $options));
		// $this->layout = false;
	}


	public function view_comments($id = null){
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
		$this->set('comments', $this->Item->Comment->find('all', $options));
		$this->layout = false;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Item->create();
			if ($this->Item->save($this->request->data)) {
				$this->request->data['new_id'] = $this->Item->id;
				header('Content-type: application/json');
				die(json_encode($this->request->data));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		}
		$users = $this->Item->User->find('list');
		$this->set(compact('users'));
		$this->layout = false;
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
			$this->request->data = $this->Item->find('first', $options);
		}
		$users = $this->Item->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Item->id = $id;
		if (!$this->Item->exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Item->delete()) {
			$this->Session->setFlash(__('The item has been deleted.'));
		} else {
			$this->Session->setFlash(__('The item could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
