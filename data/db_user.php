<?php

	define("DB2_HOST", "");
	define("DB2_USER", "");
	define("DB2_PASSWORD", "");
	define("DB2_NAME", "DR2_User");

	try {
		$dbh2 = new PDO('sqlsrv:Server='.DB2_HOST.', 1433; Database='.DB2_NAME, DB2_USER, DB2_PASSWORD);
	} 
	catch (PDOException $e) {
	    echo 'Erreur de connexion : ' . $e->getMessage();
	}

?>