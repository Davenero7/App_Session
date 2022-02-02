
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$link = new PDO('mysql:host=layercode.cekito7y0gsd.us-east-1.rds.amazonaws.com;dbname=layercode', 'admin', '123456789');
?>
<section class="container wrapper">
			<div class="page-header">
				<center><h1 class="display-5">Lista de usuarios</h1></center>
			</div>
			<a href="inicio.php" class="btn btn-block btn-outline-danger">Regresar</a>
		</section>


<table class="table table-striped">
  	
		<thead>
		<tr>
			<th>ID</th>
			<th>NOMBRE</th>
			<th>FECHA DE NACIMIENTO</th>
            <th>CORREO</th>
            <th>DIRECCIÓN</th>
            <th>CODIGO POSTAL</th>
			
		</tr>
		</thead>
<?php foreach ($link->query('SELECT * from formulario') as $row){ // aca puedes hacer la consulta e iterarla con each. ?> 
<tr>
	<td><?php echo $row['id'] // aca te faltaba poner los echo para que se muestre el valor de la variable.  ?></td>
    <td><?php echo $row['nombre'] ?></td>
    <td><?php echo $row['f_nacimiento'] ?></td>
    <td><?php echo $row['correo'] ?></td>
    <td><?php echo $row['direccion'] ?> </td>
    <td><?php echo $row['cp'] ?> </td>
 </tr>
<?php
	}
?>
</table>
</body>
</html>