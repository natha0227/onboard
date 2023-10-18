<?php
session_start();
include("../iniciar_sesion/conexion.php");
//echo var_dump($_POST);
$f_p = $_POST['f_p'];
$id_usuario = $_SESSION['id'];
$servicio = $_POST['servicio'];
$detalles = $_POST['detalles'];
$email = $_POST['mail'];
$metodo = $_POST['metodo'];

$sql_insertar = "INSERT INTO `solicitud` (`id`, `f_p`, `id_usuario`, `email`, `servicio`, `detalles`, `metodo`, `estado_solicitud`, `id_asesor`) VALUES (NULL, '$f_p', '$id_usuario', '$email', '$servicio', '$detalles', '$metodo', '1', '0')";

$guardardatos = mysqli_query($conn, $sql_insertar);

if ($guardardatos) {
    echo "<script>
        alert('La inserción de los datos fue correcta');
        location.href='solicitud_2.php';
    </script>";
} else {
    echo "Error en la Inserción: " . mysqli_error($conn) . " <a href='solicitud_2.php'> <--- Regresar</a>";
}

// cerrar la conexión con el servidor
mysqli_close($conn);
?>
 