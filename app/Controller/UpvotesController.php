<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 */
class UpvotesController extends AppController {
    public $uses = array('Upvote');

    public function index() {
        $this->set(
             'UpvoteList',
             $this->Upvote->find('all')
         );
    }

    public function vote() {
        if ($this->request->is('post')) {
            // $something = $this->Upvote->find('count', array('Upvote.item_id' => 33, 'Upvote.user_id' =>  6));
                        // $something = $this->Upvote->find('all', array('Upvote.item_id' => $this->request->data['item_id'], 'Upvote.user_id' =>  AuthComponent::user('id')));

            $myvotes = $this->Upvote->find('count', array(
       'conditions' => array('Upvote.item_id' => $this->request->data['item_id'], 'Upvote.user_id' => AuthComponent::user('id'))
    ));
            // die(json_encode($something));
$callback = array();
    if($myvotes === 0){
        if ($this->Upvote->saveAssociated($this->request->data)) {
            $callback['action'] = 'upvoted';
            $callback['count'] = $this->Upvote->find('count', array(
       'conditions' => array('Upvote.item_id ' => $this->request->data['item_id'])
    ));
                header('Content-type: application/json');
                die(json_encode($callback));
            }
        } else {
            if($this->Upvote->undo($this->request->data['item_id'], AuthComponent::user('id'))){
                $callback['action'] = 'undone';
                $callback['count'] = $this->Upvote->find('count', array(
       'conditions' => array('Upvote.item_id ' => $this->request->data['item_id'])
    ));
                header('Content-type: application/json');
                die(json_encode($callback));
            }
        }

        }
    
            
        
    }
}