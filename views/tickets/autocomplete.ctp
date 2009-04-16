<div id="test">
<?php
if(!empty($applications)) {  
	foreach($applications as $application) {  
  		echo $application['Application']['name'].'|'.$application['Application']['id']."\n";  
 	}  
} else {  
 	echo 'No results';  
}
?>
</div>