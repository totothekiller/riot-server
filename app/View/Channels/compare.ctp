<!-- File: /app/View/Channels/compare.ctp -->
<?php 
	// Insert Library Graph
	$this->Html->script('dygraph-combined', array('inline' => false));

	// Add BreadCrumb
	$this->Html->addCrumb('Channels', '/Channels');
?>


<h3>Compare : <?php echo h($channel1['Channel']['name']); ?> vs <?php echo h($channel2['Channel']['name']); ?></h3>


<p>Graph : </p>

<div id="graphdiv" style="width:90%; height:500px;"></div>

<script type="text/javascript">
  g = new Dygraph(

    // containing div
    document.getElementById("graphdiv"),

    // CSV Data
    "<?php echo $this->Html->url(array(
	    "controller" => "Channels",
	    "action" => "data",
	    "ext" => "txt",
	    $channel1['Channel']['id'],
	    $channel2['Channel']['id'],
	)); ?>",

	// Options
	{
		series : {
                '<?php echo $channel2['Channel']['id'] ?>': {
                  axis: 'y2'
                }
              },

		animatedZooms: true,
		labelsDivWidth: 300,
		connectSeparatedPoints: true,
		rollPeriod: 20,
		showRoller: true,
	}

  );
</script>