<?php
class DATABASE_CONFIG {
	var $default = array(
    	'driver' => 'mysql',
    	'persistent' => false,
    	'host' => 'localhost',
    	'login' => 'root',
    	'password' => 'Jil)(23af9',
    	'database' => 'tellannDev'
    );
	
	var $development = array(
    	'driver' => 'mysql',
    	'persistent' => false,
    	'host' => 'localhost',
    	'login' => 'root',
    	'password' => 'Jil)(23af9',
    	'database' => 'tellannDev'
    );
    
    var $production = array(
    	'driver' => 'mysql',
    	'persistent' => false,
    	'host' => 'localhost',
    	'login' => 'root',
    	'password' => 'Jil)(23af9',
    	'database' => 'tellann'
    );
	
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