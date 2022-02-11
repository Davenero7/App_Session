<?php
	// Initialize session
	session_start();
	echo "<script>alert( '".session_id()."' )</script>";

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		echo "<script>alert( 'No tiene seción' )</script>";
		echo "<script>window.location.href='index.php'</script>";
		//header('location: login.php');
		//exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
	<style>
        .wrapper{ 
        	width: 500px; 
        	padding: 20px; 
        }
        .wrapper h2 {text-align: center}
        .wrapper form .form-group span {color: red;}
	</style>
</head>
<body>
	<main>
		<section class="container wrapper">
			<div class="page-header">
				<h2 class="display-5">Bienvenido <?php echo $_SESSION['username']; ?></h2>
				<h2 class="display-5">Id Sesion <?php echo session_id(); ?></h2>
			</div>

			<div class="page-header">
				<br><center><h1 class="display-5">Seleciona una Opción </h1></center><br>
			</div>

			<a href="formulario.php" class="btn btn-block btn-outline-warning">Llenar formulario</a>
			<a href="listar.php" class="btn btn-block btn-outline-success">Mostrar Usuarios</a>
			<a href="logout.php" class="btn btn-block btn-outline-danger">Cerrar Sesion</a>
		</section>
	</main>
</body>
</html>