<!-- File: /app/View/Channels/add.ctp -->

<h1>Add Channel :</h1>
<?php

echo $this->Form->create('Channel');
echo $this->Form->input('name');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('sensor');
echo $this->Form->input('unit');
echo $this->Form->end('Save Post');

?>