<?php
	session_start();
	//var_dump($_SESSION);
	if (isset($_POST['desconnectar'])) {
		session_destroy();
		header('Location:../index.php');
	}
?>