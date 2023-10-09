<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$nickname = $_POST['nickname'];
$mail = $_POST['mail'];
$contrasena = $_POST['contrasena'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onboard";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuario (nombre, apellido, nickname, mail, contrasena) VALUES ('$nombre', '$apellido', '$nickname', '$mail', '$contrasena')";

if ($conn->query($sql) === TRUE) {
    // Redirigir a la página después de crear la cuenta
    header("Location: ../iniciar_sesion/index.html");
    exit;
} else {
    echo "Error al crear la cuenta: " . $conn->error;
}

$conn->close();
?>
