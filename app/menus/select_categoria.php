<?php
include("../iniciar_sesion/conexion.php"); // Asegúrate de incluir tu archivo de conexión

// Verifica si se ha proporcionado un ID válido para la edición
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obtener los datos de la categoría por su ID
    $sql = "SELECT * FROM servicio WHERE id = $id";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado) {
        // Verifica si se encontraron resultados
        if (mysqli_num_rows($resultado) > 0) {
            // Recupera los datos de la categoría
            $fila = mysqli_fetch_assoc($resultado);
            $id = $fila['id'];
            $nombre = $fila['nombre'];
            $descripcion = $fila['descripcion'];

            // Ahora, puedes enviar estos datos al formulario HTML para prellenar los campos de edición
            // También puedes incluir el formulario HTML aquí mismo y utilizar estos valores para prellenar los campos.
        } else {
            echo "No se encontraron datos para el ID proporcionado.";
        }
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }
} else {
    echo "ID no válido o no proporcionado.";
}

// Cierra la conexión con la base de datos
mysqli_close($conn);
?>
