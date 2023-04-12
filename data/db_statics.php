<?php
	define("DB3_HOST", "");
	define("DB3_USER", "");
	define("DB3_PASSWORD", "");
	define("DB3_NAME", "DR2_Statics");

	try {
		$dbh3 = new PDO('sqlsrv:Server='.DB3_HOST.', 1433; Database='.DB3_NAME, DB3_USER, DB3_PASSWORD);
	} 
	catch (PDOException $e) {
	    echo 'Erreur de connexion : ' . $e->getMessage();
	}
?>