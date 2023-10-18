<?php
if (isset($_GET['estado_solicitud']) && isset($_GET['metodo'])) {
    $estado_solicitud = $_GET['estado_solicitud'];
    $metodo = $_GET['metodo'];
    echo var_dump($_POST);
    include("../inicar_sesion/conexion.php");
    $sql_listar = "SELECT solicitud.*, estado_solicitud.nombre_estado, metodo.nombre_metodo 
           FROM `solicitud` 
           INNER JOIN estado_solicitud ON solicitud.estado_solicitud = estado_solicitud.id 
           INNER JOIN metodo ON solicitud.metodo = metodo.id 
           WHERE solicitud.estado_solicitud = $estado_solicitud AND solicitud.metodo = $metodo;";

    $ejecutar_sql_listar = mysqli_query($conn, $sql_listar);

    if ($ejecutar_sql_listar->num_rows > 0) {
    while ($datos = mysqli_fetch_array($ejecutar_sql_listar)) {
    echo '<tr>
    <td>' . $datos['id'] . '</td>
    <td>' . $datos['f_p'] . '</td>
    <td>' . $datos['id_usuario'] . '</td>
    <td>' . $datos['email'] . '</td>
    <td>' . $datos['categoria'] . '</td>
    <td>' . $datos['detalles'] . '</td>
    <td>' . $datos['nombre_estado'] . '</td>
    <td>' . $datos['metodo'] . '</td>

    </td>
    <td><a href="borrar_solicitud.php?id=' . $datos["id"] . '" class="btn btn-danger">
    <i class="fas fa-trash"></i> Eliminar</a></td>
    <td><a href="../editar_solicitud.php?id=' . $datos["id"] . '" class="btn btn-warning">
    <i class="fas fa-edit"></i> Editar</a></td>
    </tr>';
    }
} else {
    echo "No se encontraron solicitudes con el estado seleccionado.";
}

$conn->close(); // Cierra la conexión a la base de datos
}
?>