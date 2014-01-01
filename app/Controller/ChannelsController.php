<?php

/**
 *
 * Control Channels Action
 *
 */
class ChannelsController extends Controller {

    public $helpers = array('Html', 'Form','Session');
    public $components = array('Session','RequestHandler');
    public $uses = array('Point','Channel');

/**
 * Default landing page
 */
public function index() {

   $this->set('channels', $this->Channel->find('all'));

}


/*
 * View Selected channel
 */
public function view($id = null) {

    if (!$id) {
        throw new NotFoundException(__('Invalid Channel'));
    }

    $channel = $this->Channel->findById($id);
    
    if (!$channel) {
        throw new NotFoundException(__('Invalid Channel'));
    }

    //debug($this->request);

    $this->set('channel', $channel);
}


/*
 * Extract Raw Data in TXT format
 */
public function data($id1 = null, $id2 = null)
{
    // Check extension
    if($this->request['ext'] != 'txt')
    {
        throw new NotFoundException(__('Invalid Extension'));
    }

    // Check Channel ID 1
    if (!$id1) {
        throw new NotFoundException(__('Invalid Channel 1'));
    }

    $channel1 = $this->Channel->findById($id1);
    
    if (!$channel1) {
        throw new NotFoundException(__('Invalid Channel 1'));
    }

    // Check Channel ID2
    $channel2 = $this->Channel->findById($id2);

    if($channel2)
    {
        // Dual Channel
        $points = $this->Point->find('all', 
                array(
                    //tableau de conditions
                    'conditions' => array('Point.channel_id' =>  array($id1, $id2)),
                    'order' => array('Point.date DESC'),
                    'limit' => 10000, //Nbr of points
        ));

        // Send data to View
        $this->set('id2', $id2);
    }
    else
    {
        // Single Channel
        $points = $this->Point->find('all', 
                array(
                    //tableau de conditions
                    'conditions' => array('Point.channel_id' =>  $id1),
                    'order' => array('Point.date DESC'),
                    'limit' => 5000, //Nbr of points
        ));
    }

    // Send data to View
    $this->set('id1', $id1);
    $this->set('points', $points);
}


/*
 * Add a new Channel
 */
public function add() {
    if ($this->request->is('post')) {

        // Init new
        $this->Channel->create();
        
        if ($this->Channel->save($this->request->data)) {

            $this->Session->setFlash(__('Your Channel has been created.'));

            // Go back to Channel list
            return $this->redirect(array('action' => 'index'));
        }
        
        $this->Session->setFlash(__('Unable to add your Channel.'));
    }
}


/*
 * Compare Channels
 */
public function compare($id1 = null, $id2 = null)
{
    if (!$id1) {
        throw new NotFoundException(__('Invalid Channel 1'));
    }

    $channel1 = $this->Channel->findById($id1);
    
    if (!$channel1) {
        throw new NotFoundException(__('Invalid Channel 1'));
    }

    if (!$id2) {
        throw new NotFoundException(__('Invalid Channel 2'));
    }

    if($id1 == $id2)
    {
        throw new NotFoundException(__('Please choose different channels'));
    }

    $channel2 = $this->Channel->findById($id2);
    
    if (!$channel2) {
        throw new NotFoundException(__('Invalid Channel 2'));
    }

    // Set Data for view
    $this->set('channel1', $channel1);
    $this->set('channel2', $channel2);

}


} ?>