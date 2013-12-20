Date,Value
<?php foreach ($points as $point): ?>
<?php echo strftime('%Y/%m/%d %T',strtotime( $point['Point']['date'])); ?>,<?php echo $point['Point']['value'] ?>

<?php endforeach; ?>