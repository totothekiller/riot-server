<!-- File: /app/View/Channels/view.ctp -->

<h1><?php echo h($channel['Channel']['name']); ?></h1>

<p><small><?php echo $channel['Channel']['description']; ?></small></p>

<p><?php echo h($channel['Channel']['sensorID']); ?></p>