<?php
	define("DB_HOST", "");
	define("DB_USER", "");
	define("DB_PASSWORD", "");
	define("DB_NAME", "DR2_Member");

	try {
		$dbh = new PDO('sqlsrv:Server='.DB_HOST.', 1433; Database='.DB_NAME, DB_USER, DB_PASSWORD);
	} 
	catch (PDOException $e) {
	    echo 'Erreur de connexion : ' . $e->getMessage();
	}
?>