<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property User $User
 * @property Comment $Comment
 */
class Upvote extends AppModel {




public function beforeSave($options = array())
  {
  	$this->data['Upvote']['user_id'] = AuthComponent::user('id');
  	// if the article url doesn't have a host - give it one.
  }

public function undo($item_id, $user_id){
    // I assume that each user can subscribe only one time the same course. This calls the ids inputted in the unsubscribe link.
    return $this->deleteAll(array('Upvote.item_id' => $item_id, 'Upvote.user_id' => $user_id));
}


public $belongsTo = array(
        'User', 'Item'
    );
}
