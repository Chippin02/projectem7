<?php
	include 'configuracions/config.php';
    //Autenticació d'usuari
    if(isset($_POST['submit'])) {
        if(!empty($_POST['usuari']) && !empty($_POST['contrasenya'])) {
            $usuari = $_POST['usuari'];
            $contrasenya= $_POST['contrasenya'];
            $stmt = $dbh -> prepare("SELECT * FROM users WHERE user = :usuari AND password = :contrasenya");
            $stmt -> bindParam(':usuari', $usuari);
            $stmt -> bindParam(':contrasenya', $contrasenya);
            $stmt -> execute();
            if ($stmt -> rowCount() == 1) {
                if ($_POST['recordar']) {
                    setcookie('recordar', $usuari."#".$contrasenya,time()+3652460*60);
                }
                session_start();
                $_SESSION['nom'] = $usuari;
                $result = $stmt -> fetch(PDO::FETCH_BOTH);
                $_SESSION['tipo'] = $result['type'];
                if ($_POST['fons']) {
                    setcookie('fons', $result['type']);
                }
                header('Location:pagines/home.php');
                //$stmt -> debugDumpParams();
            }
            else { $noexiste = true; }
        }
        else { $noexiste = true; }
    }
    if (isset($_COOKIE['recordar'])) {
        $values = explode("#", $_COOKIE['recordar']);
        $usuari_recordat = $values[0];
        $contrasenya_recordada = $values[1];
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Log me in</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<style>
			body {
				margin: 0px;
				padding: 0px;
			}
		</style>
	</head>
	<body class="bg-light">
		<h1 class="p-3 mb-2 bg-secondary text-white text-center">Llars per a tots</h1>
		<div class="d-flex flex-column align-items-center">
				<h3>Log in</h3>
				<?php if ($noexiste == true) { ?>
					<p class="text-danger">L'usuari o la contrasenya son incorrectes, torni a intentar-ho</p>
				<?php } ?>
				<form class="d-flex flex-column" method="POST" action="<?= $_SERVER['PHP_SELF'];?>">
					<input class="mb-2" type="text" name="usuari" placeholder="Nom d'usuari" <?php if (isset($_COOKIE['recordar'])) { ?> value="<?php echo $usuari_recordat; ?>" <?php } ?> >
					<input class="mb-2" type="password" name="contrasenya" placeholder="Contrasenya" <?php if (isset($_COOKIE['recordar'])) { ?> value="<?php echo $contrasenya_recordada; ?>" <?php } ?> >
					<input class="mb-2" type="submit" name="submit" value="Connectar">
					<div class="d-flex flex-row"><input type="checkbox" name="recordar" <?php if ($_POST['recordar']) { ?> checked="checked" <?php } ?> value="1" class="mr-2">Recordar-me</div>
					<div class="d-flex flex-row"><input type="checkbox" name="fons" <?php if ($_POST['fons']) { ?> checked="checked" <?php } ?> value="1" class="mr-2">Fons especial</div>
				</form>
				<a href="pagines/sign_up.php">Crear nou usuari</a>
		</div>
	</body>
</html>