<?php
	// Select Active Menu
	$this->set('activeMenu', 'home');
?>

<div class="jumbotron">
	<h1>Welcome on RIOT-SERVER</h1>
	<p></p>
	<p>See the list of <?php echo $this->Html->link('Channels', array('controller' => 'channels', 'action' => 'index')); ?></p>
</div>

