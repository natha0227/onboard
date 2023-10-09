<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onboard";

$conn = new mysqli($servername, $username, $password, $dbname);
$conexion=mysqli_error($conn);
if (!$conn) {
    die("Error al conectar a la base de datos: " . $conexion);
}


?>