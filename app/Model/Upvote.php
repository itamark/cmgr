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
public $belongsTo = array(
        'User', 'Item'
    );
}
