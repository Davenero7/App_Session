<?php
	// Database credentials
	define('DB_SERVER', 'layercode.cekito7y0gsd.us-east-1.rds.amazonaws.com');
	define('DB_USERNAME', 'admin');
	define('DB_PASSWORD', '123456789');
	define('DB_NAME', 'layercode');

	// Attempt to connect to MySQL database
	$mysql_db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if (!$mysql_db) 
	{
		echo "<script>Error en la conexión: => ".$mysql_db->connect_error."</script>";
		die("Error: Unable to connect " . $mysql_db->connect_error);
	}