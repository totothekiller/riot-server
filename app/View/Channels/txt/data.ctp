<?php 

// Order By Date
$orderedList = array_reverse($points,true);


// Display Header
echo "Date,$id1";
echo isset($id2) ? ",$id2" : '';
echo "\n";

// loop
foreach ($orderedList as $point):
	
	echo strftime('%Y/%m/%d %T', strtotime($point['Point']['date']));
	echo ',';
	
	if(isset($id2))
	{
		// Dual Channel
		if($point['Point']['channel_id'] == $id2)
		{
			echo ',';
			echo $point['Point']['value'];
		}
		else
		{
			echo $point['Point']['value'];
			echo ',';
		}
	}
	else
	{
		// Single Channel
		echo $point['Point']['value'];
	}
	
	echo "\n";
endforeach; 

?>
