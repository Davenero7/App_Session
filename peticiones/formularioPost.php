<?php
    require_once( "../config/config.php" );
    $nombre = $_POST["nombre"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $cp = $_POST["cp"];
    $estado = $_POST["estado"];
    $genero = $_POST["genero"];

    echo "Nombre: ".$nombre."<br>fecha de nacimiento: ".$fechaNacimiento;
    $consulta = "INSERT INTO formulario ( nombre, f_nacimiento, correo, direccion, cp, estado, genero ) 
    values ( '$nombre', '$fechaNacimiento', '$correo', '$direccion', '$cp', '$estado', '$genero')";
    $conexion = $mysql_db;
    $resultado = mysqli_query( $conexion, $consulta );
    header( 'location: ./../index.php' );
?>