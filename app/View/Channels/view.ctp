<!-- File: /app/View/Channels/view.ctp -->
<?php 
	// Insert Library Graph
	$this->Html->script('dygraph-combined', array('inline' => false));

	// Add BreadCrumb
	$this->Html->addCrumb('Channels', '/Channels');
?>
<h3>Name : <?php echo h($channel['Channel']['name']); ?></h3>

<p><small><?php echo $channel['Channel']['description']; ?></small></p>

<p>Sensor ID : <?php echo h($channel['Channel']['sensor']); ?></p>

<p>Last available points : </p>

<table>
	<tr>
        <th>Date</th>
        <th>Value</th>
    </tr>

<?php foreach ($channel['LastPoints'] as $point): ?>

	<tr>
	    <td><?php echo $point['date']; ?></td>
	    <td><?php echo $point['value']; ?> <?php echo h($channel['Channel']['unit']); ?></td>
	</tr>

<?php endforeach; ?>

</table>

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
	    $channel['Channel']['id']
	)); ?>",

	// Options
	{
		animatedZooms: true,

		labelsDivWidth: 300


	}

  );
</script>