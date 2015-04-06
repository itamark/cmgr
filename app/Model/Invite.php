<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property User $User
 * @property Comment $Comment
 */
class Invite extends AppModel {




public function beforeSave($options = array())
  {
  	$this->data['Invite']['referrer_id'] = AuthComponent::user('id');
  	$this->data['Invite']['invite_code'] = $this->randomPassword();
  	// if the article url doesn't have a host - give it one.
  }

 function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

// public function undo($item_id, $user_id){
//     // I assume that each user can subscribe only one time the same course. This calls the ids inputted in the unsubscribe link.
//     return $this->deleteAll(array('Upvote.item_id' => $item_id, 'Upvote.user_id' => $user_id), false);
// }



public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'referrer_id'
        )
    );
}
