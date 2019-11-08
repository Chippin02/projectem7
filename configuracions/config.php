<?php
	//Proveidor de dades
	$config=['user'=>'admin', 'password'=>'contrasenya'];
	//Obrir connexió
	try { $dbh = new PDO('mysql:host=localhost;dbname=projecte1', $config['user'], $config['password']); }
	catch(PDOException $e) {
		echo $e->getMessage();
	}
?>