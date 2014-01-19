<!-- File: /app/View/Channels/view.ctp -->
<?php 
	// Insert Library Graph
	$this->Html->script('dygraph-combined', array('inline' => false));

    // Select Active Menu
    $this->set('activeMenu', 'channels');
?>


<div class="jumbotron">
		<p><?php echo $channel['Channel']['name']; ?></p>
		<h1><?php echo $channel['LastPoints'][0]['value']; ?> <?php echo h($channel['Channel']['unit']); ?></h1>
</div>

<h4>Graph : </h4>

<div id="graphdiv" style="width:100%; height:500px;"></div>

<h4>Information : </h4>

<div class="row">
  <div class="col-md-8">
  	<p><?php echo $channel['Channel']['description']; ?></p>
  </div>
  <div class="col-md-4">
  	<p>Sensor #<?php echo $channel['Channel']['sensor']; ?></p>
  </div>
</div>

<script type="text/javascript">
  g = new Dygraph(

    // containing div
    document.getElementById("graphdiv"),

    // CSV Data
    "<?php echo $this->Html->url(array(
	    "controller" => "Channels",
	    "action" => "data",
	    "ext" => "txt",
	    $channel['Channel']['id']
	)); ?>",

	// Options
	{
		animatedZooms: true,

		labelsDivWidth: 300


	}

  );
</script>