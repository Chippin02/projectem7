<?php include ('../controladors/home.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>My home</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<style>
			body {
				<?php if ($_COOKIE['fons']) { ?> background-image: url("../css/<?php echo $_COOKIE['fons']; ?>.jpg");
				background-repeat: no-repeat;
				background-size: cover;
				<?php } ?>
			}
			#sombreado {
				text-shadow: 0px -2px 3px rgb(0, 0, 0, 1);
			}
		</style>
	</head>
	<body class="bg-light">
		<div class="d-flex flex-column">
			<h1 class="p-3 mb-2 bg-secondary text-white text-center">Llars per a tots</h1>
			<div class="p-1 bg-light d-flex flex-row align-items-center justify-content-between">
				Compte tipus: <?php echo $_SESSION['tipo']; ?>
				<div class="d-flex flex-row align-items-center">
					Benvingut <?php echo $_SESSION['nom']; ?>
					<form class="ml-2" method="POST" action="<?= $_SERVER['PHP_SELF'];?>">
						<input type="submit" name="desconnectar" value="Desconnectar">
					</form>
				</div>
			</div>
		</div>
		<div class="d-flex flex-column align-items-center">
			<h3 id="sombreado" class="text-light font-weight-bold d-flex flex-column align-items-center">El meu perfil</h3>		
		</div>
	</body>
</html>