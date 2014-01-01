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
public function data($id = null)
{
    if (!$id) {
        throw new NotFoundException(__('Invalid Channel'));
    }

    $channel = $this->Channel->findById($id);
    
    if (!$channel) {
        throw new NotFoundException(__('Invalid Channel'));
    }

    // Check Extension
    if($this->request['ext']=='txt')
    {
        $points = $this->Point->find('all', 
                array(
                    //tableau de conditions
                    'conditions' => array('Point.channel_id' =>  $id),
                    'order' => array('Point.date DESC'),
                    'limit' => 5000, //Nbr of points
        ) );


        // TXT
        $this->set('points', $points);
    }
    else
    {
        throw new NotFoundException(__('Invalid Extension'));
    }
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



}



?>