<?php
session_start();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$nickname = $_POST['nickname'];
$mail = $_POST['mail'];
$contrasena = $_POST['contrasena'];

$conn = new mysqli("localhost", "root", "", "onboard");
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$sql = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', nickname = '$nickname', mail = '$mail', contrasena = '$contrasena' WHERE id = $_SESSION[id]";

if ($conn->query($sql) === TRUE) {
    echo'<script type="text/javascript">
	        alert("Registro actualizado correctamente");
			window.history.go(-2);
			</script>';
	
} else {
    echo "Error al actualizar el registro: " . $conn->error;
}

$conn->close();
?>
