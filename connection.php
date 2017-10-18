<?php
	/* Connect to a MySQL database using driver invocation */
	//$dsn = 'mysql:dbname=sbc_global_database;host=localhost';
	$dsn = 'mysql:dbname=bit302Assignment;host=localhost';
	$user = 'root';
	$password = '';

	try {
		$MySQLi_CON = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
?>