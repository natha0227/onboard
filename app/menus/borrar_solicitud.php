<?php
require 'conexion.php';

// Verificar si se ha enviado el ID válido para eliminar
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id']; // Obtener el ID del registro a eliminar

    // Verificar si se ha confirmado la eliminación
    if (isset($_GET['opcion']) && $_GET['opcion'] === 'borrar') {
        // Ejecutar la consulta para eliminar el registro
        $sql = "DELETE FROM solicitud WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            header('Location: listar_solicitud_2.php'); // Redireccionar a la página de listar después de eliminar
            exit();
        } else {
            echo "Error al eliminar el registro: " . mysqli_error($conn);
        }
    } else {
        // Mostrar confirmación antes de eliminar
        echo "<script>
            var confirmacion = confirm('¿Seguro que deseas borrar el registro?');
            if (confirmacion) {
                location.href = 'borrar_solicitud.php?opcion=borrar&id=$id';
            } else {
                location.href = 'listar_solicitud_2.php';
            }
        </script>";
    }
} else {
    echo "ID no válido para eliminar.";
}

mysqli_close($mysqli);
?>