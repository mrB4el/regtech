<?php
    require 'engine/classes/mysqlclass.php';
    require 'engine/classes/profile.php';
    require 'engine/classes/user.php';
    require 'engine/classes/thing.php';
    require 'engine/classes/api.php';
    require 'engine/classes/json.php';
    require 'engine/classes/template.php';
    
    $mysql = new MySQLClass();
	$json = new JSON();
	$api = new API();
?>