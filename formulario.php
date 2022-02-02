<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario</title>
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
			<h2 class="display-4 pt-3">Formulario</h2>
        	<p class="text-center">Ingrese sus Datos</p>
        	<!--<form action="<?php //echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">-->
            <form action="peticiones/formularioPost.php" method="POST">

        		<div class="form-group">
        			<label for="nombre">Nombre</label>
        			<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre ?>">
        		</div>
                <di class="form-group">
                    <label for="fechaNacimiento">Fecha de Nacimiento</label>
        			<input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="<?php echo $fechaNacimiento ?>">
                </div>
                <div class="form-group">
        			<label for="correo">Correo</label>
        			<input type="text" name="correo" id="correo" class="form-control" value="<?php echo $correo ?>">
        		</div>
                <div class="form-group">
        			<label for="direccion">Dirección</label>
        			<input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $direccion ?>">
        		</div>
                <div class="form-group">
        			<label for="cp">Código Postal</label>
        			<input type="text" name="cp" id="cp" class="form-control" value="<?php echo $cp ?>">
        		</div>
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="estado">Estado</label>
						</div>
						<select class="custom-select" id="estado" name="estado">
							<option selected>Escoje...</option>
							<option value="CDMX">CDMX</option>
							<option value="MICHOACAN">Michoacan</option>
							<option value="MORELOS">Morelos</option>
							<option value="GUERRERO">Guerrero</option>
						</select>
					</div>
        		</div>
				<div class="form-group">
        			<label for="genero">Género</label>
        			<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="genero" id="genero" value="Hombre">
						<label class="form-check-label" for="genero">Hombre</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="genero" id="genero" value="Mujer">
						<label class="form-check-label" for="genero">Mujer</label>
					</div>
        		</div>

        		<div class="form-group">
        			<input type="submit" class="btn btn-block btn-outline-success" value="Submit">
                    <a href="inicio.php" class="btn btn-block btn-outline-danger">Regresar</a>
        		</div>
        	</form>
		</section>
	</main>
</body>
</html>