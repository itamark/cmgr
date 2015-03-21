<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 */
class InvitesController extends AppController {

    public function index() {
        // $this->set(
        //      'UpvoteList',
        //      $this->Upvote->find('all')
        //  );
    }

    public function invite(){
    	if($this->request->is('post')){
    		if($this->Invite->save($this->request->data)){
                
    			$invite = $this->Invite->read(null, $this->Invite->id);
                // die(print_r($invite['Invite']['invite_code']));
    			$email = new CakeEmail();
			     $email->template('invite', 'default')
					->config('default')
					->emailFormat('html')
                    ->viewVars(array(
                        'invite_code' => $invite['Invite']['invite_code'],
                        'invitor_name' => AuthComponent::user('first_name')
                        ))
					->subject(__(AuthComponent::user('first_name').' invited you to join CMGR'))
					->to($invite['Invite']['invitee_email'])
					// ->from(Configure::read('Application.from_email'))
					->from(AuthComponent::user('email'))
					->send();

    			// CakeEmail::deliver($invite['Invite']['invitee_email'], 'Subject', 'Message', array('from' => 'itamar@cmgr.org'));

    		}
    	}

    }

   

//     public function vote() {
//         if ($this->request->is('post')) {
//             // $something = $this->Upvote->find('count', array('Upvote.item_id' => 33, 'Upvote.user_id' =>  6));
//                         // $something = $this->Upvote->find('all', array('Upvote.item_id' => $this->request->data['item_id'], 'Upvote.user_id' =>  AuthComponent::user('id')));

//             $myvotes = $this->Upvote->find('count', array(
//        'conditions' => array('Upvote.item_id' => $this->request->data['item_id'], 'Upvote.user_id' => AuthComponent::user('id'))
//     ));
//             // die(json_encode($something));
// $callback = array();
//     if($myvotes === 0){
//         if ($this->Upvote->save($this->request->data)) {
//             $callback['action'] = 'upvoted';
//             $callback['count'] = $this->Upvote->find('count', array(
//        'conditions' => array('Upvote.item_id ' => $this->request->data['item_id'])
//     ));
//                 header('Content-type: application/json');
//                 die(json_encode($callback));
//             }
//         } else {
//             if($this->Upvote->undo($this->request->data['item_id'], AuthComponent::user('id'))){
//                 $callback['action'] = 'undone';
//                 $callback['count'] = $this->Upvote->find('count', array(
//        'conditions' => array('Upvote.item_id ' => $this->request->data['item_id'])
//     ));
//                 header('Content-type: application/json');
//                 die(json_encode($callback));
//             }
//         }

//         }
    
            
        
//     }
}