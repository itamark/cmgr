<?php
App::uses('AppModel', 'Model');


/**
 * Item Model
 *
 * @property User $User
 * @property Comment $Comment
 */
class Item extends AppModel {


	public function beforeSave($options = array())
  {
  	$this->data['Item']['user_id'] = AuthComponent::user('id');
  	// if the article url doesn't have a host - give it one.
  	if(isset($this->data['Item']['url'])){
  		$this->data['Item']['type'] = 'article';
  	} else {
  		$this->data['Item']['type'] = 'question';
  	}
  	if($this->data['Item']['type'] == 'article' && mb_substr($this->data['Item']['url'], 0, 4) !== 'http') $this->data['Item']['url'] = 'http://' . $this->data['Item']['url'];
  }

    public $virtualFields = array(
    'score' => 'Item.created',
    'upvoted' => 'Item.created'
);

 public function afterFind($results, $primary = false){

	parent::afterFind($results, $primary);



	foreach ($results as $key => $val) {
        $results[$key]['Item']['upvotes'] = $this->Upvote->find('count', array(
        'conditions' => array('Upvote.item_id' => $results[$key]['Item']['id'])
    ));
        $results[$key]['Item']['upvoted'] = $this->Upvote->find('count', array(
        'conditions' => array('Upvote.item_id' => $results[$key]['Item']['id'], 'Upvote.user_id' => AuthComponent::user('id'))
    ));
		$results[$key]['Item']['score'] = $this->hot($results[$key]['Item']['upvotes'], strtotime($val['Item']['created']));		
    
// $results[$key]['Comments']


    }

    
    // $results = Set::sort($results, '{n}.Item.score', 'desc');

    return $results;
}



  public function hot($upvotes, $date)
  {
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
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'url' => array(
			'notEmpty' => array(
				'rule' => 'url',
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'item_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
    	'Upvote'=> array()
	);

}