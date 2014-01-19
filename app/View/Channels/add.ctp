<!-- File: /app/View/Channels/add.ctp -->

<h2>Add Channel :</h2>
<?php

echo $this->Form->create('Channel', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => array(
			'class' => 'col col-md-3 control-label'
		),
		'wrapInput' => 'col col-md-9',
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
));

echo $this->Form->input('name');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->input('sensor');
echo $this->Form->input('unit');

?>

	<div class="form-group">
		<?php echo $this->Form->submit('Create New', array(
			'div' => 'col col-md-9 col-md-offset-3',
			'class' => 'btn btn-default'
		)); ?>
	</div>

<?php

echo $this->Form->end();

?>