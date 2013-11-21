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
 * Add a new point with GET Request : Points/add/{sensorID}/{sensorValue}
 */
public function add($sensorID=null, $sensorValue=null) {

	// Get Sensor ID
	if(!$sensorID)
	{
		throw new NotFoundException(__('No Sensor ID Defined'));
	}

	// Get Value
	if(!$sensorValue)
	{
		throw new NotFoundException(__('There is no sensor value'));
	}

	// Find Channel
	$channel = $this->Channel->findBySensor($sensorID);

	if(!$channel)
	{
		throw new NotFoundException(__('Channel ID is not found'));
	}


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