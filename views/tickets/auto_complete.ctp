<?php
if(!empty($applications)) {  
	foreach($applications as $application) {  
  		echo $application['Application']['name'].'^';  
 	}  
} else {  
 	echo 'No results';  
}
?>