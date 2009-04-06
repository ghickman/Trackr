<?php
class DATABASE_CONFIG {
    if(evn('HTTP_HOST') == Configure::read('env.dev')) {
    	var $default = array(
    		'driver' => 'mysql',
    		'persistent' => false,
    		'host' => 'localhost',
    		'login' => 'root',
    		'password' => 'Jil)(23af9',
    		'database' => 'tellannDev'
    	);
	} elseif(evn('HTTP_HOST') == Configure::read('env.prod')) {
	    var $default = array(
    		'driver' => 'mysql',
    		'persistent' => false,
    		'host' => 'localhost',
    		'login' => 'root',
    		'password' => 'Jil)(23af9',
    		'database' => 'tellann'
    	);
	}
	
    var $test = array(
    	'driver' => 'mysql',
    	'persistent' => false,
    	'host' => 'localhost',
    	'login' => 'root',
    	'password' => 'Jil)(23af9',
    	'database' => 'tellannTest',
    	'prefix' => ''
    );
}
?>