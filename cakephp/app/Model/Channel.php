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
		'sensorID' => array(
			'rule1' => array(
				'rule' => 'decimal'
				),
			'rule2' => array(
				'rule'    => 'isUnique',
        		'message' => 'This sensorID is already in use'
				)
		)
	);

	
}

?>