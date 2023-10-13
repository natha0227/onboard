<?php
session_start();
include ("conexion.php");
header("Cache-control: private");
$subir = "UPDATE usuario SET estado = 0 WHERE id = $_SESSION[id]";
$subido = mysqli_query($conn,$subir);
session_unset();
session_destroy();
header("Location: index.html");
?>