<?php include ('../controladors/sign_up.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sign up</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
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
			<h3>Sign up</h3>
			<?php if ($existe == true) { ?>
				<p class="text-danger">L'usuari ja existeix, provi amb un altre</p>
			<?php } ?>
			<form class="d-flex flex-column" method="POST" action="<?= $_SERVER['PHP_SELF'];?>">
				<input class="mb-2" type="text" name="nom" placeholder="Nom"><br>
				<input class="mb-2" type="text" name="usuari" placeholder="Nom d'usuari"><br>
				<input class="mb-2" type="password" name="contrasenya" placeholder="Contrasenya"><br>
				<select class="mb-2" name="tipus">
					<option selected value="0"> -- Seleccioni un tipus de compte -- </option>
					<option value="1">Comprador</option> 
		        	<option value="2">Venedor</option> 
		       	</select><br>
				<input class="mb-2" type="submit" name="submit" value="Registrar-me">
				<div class="d-flex flex-row"><input type="checkbox" name="recordar" <?php if ($_POST['recordar']) { ?> checked="checked" <?php } ?> value="1" class="mr-2">Recordar-me</div>
			</form>
		</div>
	</body>
</html>