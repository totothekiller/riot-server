<!-- File: /app/View/Pints/view.ctp -->

<p><?php echo h($point['Point']['id']); ?></p>
<p><?php echo $this->Time->format('%F %jS, %Y %h:%i %A', $point['Point']['date']); ?></p>
<p><?php echo h($point['Point']['value']); ?></p>