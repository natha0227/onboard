<?php
include("../iniciar_sesion/conexion.php");
echo var_dump($_POST);
if (isset($_POST['editar'])) {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    
    // Consulta SQL para actualizar los datos
    $sql_actualizar = "UPDATE `categoria` SET
        `nombre` = '$nombre',
        `descripcion` = '$descripcion'
        WHERE `id` = $id";

    $actualizardatos = mysqli_query($conn, $sql_actualizar);

    if ($actualizardatos) {
        echo "<script>
            alert('La actualización de los datos fue correcta');
            location.href='listar_categoria.php'; 
        </script>";
    } else {
        echo "Error en la Actualización: " . mysqli_error($conn) . " <a href='categoria.html'> <--- Regresar</a>";
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
