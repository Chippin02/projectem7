<?php
	include '../configuracions/config.php';
	if(isset($_POST['submit'])) {
		if(!empty($_POST['nom']) && !empty($_POST['usuari']) && !empty($_POST['contrasenya']) && $_POST['tipus'] != 0) {
			$nom = $_POST['nom'];
			$usuari = $_POST['usuari'];
			$contrasenya = $_POST['contrasenya'];
			if ($_POST['tipus'] == 1) { $tipus = "comprador"; }
			else { $tipus = "venedor"; }
		}
		$stmt = $dbh -> prepare("SELECT user FROM users WHERE user = :usuari");
		$stmt -> bindParam(':usuari', $usuari);
		$trobat = $stmt -> execute();
		if ($stmt -> rowCount() == 1) {
			$existe = true;
		}
		else {
			$stmt = $dbh -> prepare('INSERT INTO users (name, user, password, type) VALUES (:nom, :usuari, :contrasenya, :tipus)');
			$stmt -> bindParam(':nom', $nom);
			$stmt -> bindParam(':usuari', $usuari);
			$stmt -> bindParam(':contrasenya', $contrasenya);
			$stmt -> bindParam(':tipus', $tipus);
			$stmt -> execute();
			if ($_POST['recordar']) {
				setcookie('recordar', $usuari."#".$contrasenya,time()+365*24*60*60);
			}
			session_start();
			$_SESSION['nom'] = $nom;
			$_SESSION['tipo'] = $tipus;
			header('Location:../pagines/home.php');
			//$stmt -> debugDumpParams(); 
		}
	}
?>