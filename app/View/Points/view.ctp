<!-- File: /app/View/Pints/view.ctp -->

<?php debug($point); ?>

<p><?php echo h($point['Point']['id']); ?></p>
<p><?php echo $point['Point']['date'] ?></p>
<p><?php echo h($point['Point']['value']); ?></p>