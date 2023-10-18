<?php
include("../iniciar_sesion/conexion.php");

// Comprueba si se ha proporcionado un ID válido para la edición
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obtener los datos de la solicitud por su ID
    $sql = "SELECT solicitud.*, estado_solicitud.id AS 'id_e_s', estado_solicitud.nombre_estado, metodo.nombre FROM `solicitud` INNER JOIN estado_solicitud ON solicitud.estado_solicitud = estado_solicitud.id INNER JOIN metodo ON solicitud.metodo = metodo.id WHERE solicitud.id = $id";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado) {
        // Verifica si se encontraron resultados
        if (mysqli_num_rows($resultado) > 0) {
            // Recupera los datos de la solicitud
            $fila = mysqli_fetch_assoc($resultado);
            $f_p = $fila['f_p'];
            $id_usuario = $fila['id_usuario'];
            $categoria = $fila['servicio'];
            $detalles = $fila['detalles'];
            $estado_solicitud = $fila['id_e_s'];
            $nombre_metodo = $fila['nombre'];
            $mail = $fila['email'];
            
        } else {
            echo "No se encontraron datos para el ID proporcionado.";
            exit; // Termina el script si no se encontraron datos
        }
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
        exit; // Termina el script si hay un error en la consulta
    }
} else {
    echo "ID no válido o no proporcionado.";
    exit; // Termina el script si el ID no es válido o no se proporciona
}

// Cierra la conexión con la base de datos
mysqli_close($conn);
?>
