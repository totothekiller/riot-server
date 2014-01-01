Date,Value
<?php foreach (array_reverse($points,true) as $point): ?>
<?php echo strftime('%Y/%m/%d %T',strtotime( $point['Point']['date'])); ?>,<?php echo $point['Point']['value'] ?>

<?php endforeach; ?>
