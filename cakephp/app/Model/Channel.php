<?php

/**
 * Channel Model
 *
 */
 
App::uses('AppModel', 'Model');

class Channel extends AppModel {

    public $name = 'Channel';

    // Validation conditions
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
		),
		'description' => array(
			'rule' => 'notEmpty'
		),
		'sensor' => array(
			'rule1' => array(
				'rule' => 'decimal'
				),
			'rule2' => array(
				'rule'    => 'isUnique',
        		'message' => 'This sensor is already in use'
				)
		)
	);


	// Link to Points
	public $hasMany = array(
	    'LastPoints' => array(
	        'className' => 'Point',
	        'foreignKey' => 'channel_id',
	        'order' => 'LastPoints.date DESC',
	        'limit' => '5', // Load only lasts point
	        'dependent' => true
	    )
	);

	
}

?>