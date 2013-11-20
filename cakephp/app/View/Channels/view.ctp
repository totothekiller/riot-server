<!-- File: /app/View/Channels/view.ctp -->

<h1>Name :<?php echo h($channel['Channel']['name']); ?></h1>

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

