<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 */
class ItemsController extends AppController {
public $uses = array('Item', 'Upvote');

public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view', 'recent');
	}





// public $paginate = array(
//     // 'Item' => array(
//     //     'limit' => 20,
//     //     'order' => array('score' => 'desc')
//     // )
// );
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator'); 



/**
 * index metfhknmnmmn/;//mnhod
 *
 * @return void
 */
		public function index() {
 		$this->Item->recursive = 2;
$this->paginate = array(
	'conditions' => array(
         'Item.removed' => false
    ),
    'limit' => 10,
    'order' => array( // sets a default order to sort by
      'Item.score' => 'desc'	
    )
  );
  $items = $this->paginate('Item');
  $this->set(compact('items'));
	}

	public function recent() {
		$this->Item->recursive = 2;	
		$items = $this->Item->find('all');
$sorted = Set::sort($items, '{n}.Item.created', 'desc');
		$this->set('items', $sorted);
	}

	public function top() {
		$this->Item->recursive = 2;
		$items = $this->Item->find('all');
$sorted = Set::sort($items, '{n}.Item.upvotes', 'desc');
		$this->set('items', $sorted);
	}


	public function hot($upvotes, $date){
	$s = $upvotes;
    $order = log10(max(abs($s), 1));

    if ($s > 0) {
        $sign = 1;
    } else if ($s < 0) {
        $sign = -1;
    } else {
        $sign = 0;
    }

    $seconds = $date - 1134028003;

    return round($sign * $order + $seconds / 45000, 7);
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
			$this->Item->set(array(
  				  'score' => $this->hot(1, date("Y-m-d H:i:s"))
				));
			if ($this->Item->save($this->request->data)) {
				$this->request->data['Upvote']['user_id'] = AuthComponent::user('id');
				$this->request->data['Upvote']['item_id'] = $this->Item->id;
				// $this->updateScore($this->Item->id);
				$this->Item->Upvote->saveAll($this->request->data);
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

	public function updateScore($id){
				$this->Item->read(null, $this->Item->id);
				$this->Item->set(array(
  				  'score' => 1
				));
				$this->Item->save();
	}

	public function flag($item_id = null){
		$this->Item->read(null, $item_id);
		$this->Item->set(array(
			'flagged' => true
			));
		$this->Item->save();
	}

	public function unflag($item_id = null){
		$this->Item->read(null, $item_id);
		$this->Item->set(array(
			'flagged' => false
			));
		$this->Item->save();
	}

	public function remove($item_id = null){
		$this->Item->read(null, $item_id);
		$this->Item->set(array(
			'removed' => true,
			'live' => false
			));
		$this->Item->save();
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