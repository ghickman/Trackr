<?php 
echo $javascript->link('jquery/jquery.min', false);
echo $form->text('Application.name', array('size'=>'30', 'id'=>'autoComplete'));

if(!empty($applications)) {  
	foreach($applications as $application) {  
  		//echo $application['Application']['name'].'|'.$application['Application']['id'].'^';
		echo key($applications).'|'.$application[0].'^';
 	}  
} else {  
	echo 'No results';  
}
?>