<?php
include("../iniciar_sesion/conexion.php");
//echo var_dump($_POST);
if (isset($_POST['editar'])) {
    // Obtener los datos del formulario
    $f_p = $_POST['f_p'];
    $id_usuario = $_POST['id'];
    $email = $_POST['mail'];
    $servicio = $_POST['servicio '];
    $detalles = $_POST['detalles'];
    $estado_solicitud = $_POST['estado_solicitud'];
    $metodo = $_POST['metodo'];
    $id = $_POST['id'];

    // Consulta SQL para actualizar los datos
    $sql_actualizar = "UPDATE `solicitud` SET
        `f_p` = '$f_p',
        `id` = '$id_usuario',
        `email` = '$email',
        `servicio ` = '$servicio ',
        `detalles` = '$detalles',
        `estado_solicitud` = '$estado_solicitud',
        `metodo` = '$metodo'
        WHERE `id` = $id";

    $actualizardatos = mysqli_query($conn, $sql_actualizar);

    if ($actualizardatos) {
        echo "<script>
            alert('La actualización de los datos fue correcta');
            location.href='listar_solicitud_2.php';
        </script>";
    } else {
        echo "Error en la Actualización: " . mysqli_error($conn) . " <a href='solicitud.html'> <--- Regresar</a>";
    }
} elseif (isset($_POST['eliminar'])) {
    // Proceso de eliminación
    // Aquí debes escribir el código para eliminar el registro según el ID proporcionado
    // Puedes usar una consulta SQL DELETE para esto.
} else {
    echo "Acción no válida";
}

// Cerrar la conexión con el servidor
mysqli_close($conn);
?>
