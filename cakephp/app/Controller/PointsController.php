<?php

/**
 *
 * Control of Points Action
 *
 */
class PointsController extends Controller {

    public $helpers = array('Html', 'Form','Session','Time');
    public $components = array('Session');
    public $uses = array('Point','Channel');


/*
 * View Specific point
 */
public function view($id = null) {

    if (!$id) {
        throw new NotFoundException(__('Invalid Point'));
    }

    $point = $this->Point->findById($id);
    
    if (!$point) {
        throw new NotFoundException(__('Invalid Point'));
    }

    $this->set('point', $point);
}


/*
 * Add a new point with POST request
 */
public function add() {

	// Get Sensor ID
	if(empty($this->request->query['sensorID']))
	{
		throw new NotFoundException(__('No Sensor ID Defined'));
	}
	$sensorID = $this->request->query['sensorID'];

	// Get Value
	if(empty($this->request->query['value']))
	{
		throw new NotFoundException(__('There is no sensor value'));
	}

	$sensorValue = $this->request->query['value'];


	// Find Channel
	$channel = $this->Channel->findBySensor($sensorID);

	if(!$channel)
	{
		throw new NotFoundException(__('Channel ID is not found'));
	}


	debug($channel);

    // Init new Point
	$this->Point->create();

	$this->Point->set("date", DboSource::expression('NOW()'));
	$this->Point->set("value", $sensorValue);
	$this->Point->set("channel_id", $channel['Channel']['id']);


    if ($this->Point->save()) {
		return $this->redirect(array('controller' => 'Channels', 'action' => 'view', $channel['Channel']['id']));
    }

    throw new NotFoundException(__('Unable to add points'));
}




}



?>