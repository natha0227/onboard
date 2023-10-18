<?php
session_start();
$conn = new mysqli("localhost", "root", "", "onboard");
$conexion=mysqli_error($conn);
if (!$conn) {
    die("Error al conectar a la base de datos: " . $conexion);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Lista de Solicitudes</title>

  <!-- Incluye los archivos de Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/css.listar.css" rel="stylesheet" type="text/css">

  <!-- Incluye FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>

  <div id="listaSolicitudes">

    <table class="table table-bordered table-responsive">
      <thead class="thead-dark">
        <tr>
          <th scope="col">id</th>
          <th scope="col">Agendamiento</th>
          <th scope="col">id Usuario</th>
          <th scope="col">Correo</th>
          <th scope="col">Nombre</th>
          <th scope="col">Servicio</th>
          <th scope="col">Detalles</th>
          <th scope="col">Estado Solicitud</th>
          <th scope="col">Metodo</th>
          <th scope="col" colspan="2">Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include("../iniciar_sesion/conexion.php");
          $sql_listar = "SELECT solicitud.*, CONCAT(usuario.nombre, ' ', usuario.apellido) AS nombre_completo, estado_solicitud.id AS 'id_e_s', estado_solicitud.nombre_estado, metodo.nombre FROM solicitud INNER JOIN estado_solicitud ON solicitud.estado_solicitud = estado_solicitud.id INNER JOIN metodo ON solicitud.metodo = metodo.id INNER JOIN usuario ON solicitud.id_usuario = usuario.id WHERE solicitud.id_usuario = $_SESSION[id] AND solicitud.estado_solicitud = 3";
          $ejecutar_sql_listar = mysqli_query($conn, $sql_listar);
          if ($ejecutar_sql_listar->num_rows > 0) {

            while ($datos = mysqli_fetch_array($ejecutar_sql_listar)) {
              echo '<tr>
                    <td>' . $datos['id'] . '</td>
                    <td>' . $datos['f_p'] . '</td>
                    <td>' . $datos['id_usuario'] . '</td>
                    <td>' . $datos['email'] . '</td>
                    <td>' . $datos['nombre_completo'] . '</td>
                    <td>' . $datos['servicio'] . '</td>
                    <td>' . $datos['detalles'] . '</td>
                    <td>' . $datos['nombre_estado'] . '</td>
                    <td>' . $datos['nombre'] . '</td>
                    <td><a href="borrar_solicitud.php?id=' . $datos["id"] . '" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Eliminar</a></td>
                    </tr>';
            }
          } else {
            echo "No se encontraron solicitudes con el estado seleccionado.";
          }

          $conn->close(); // Cierra la conexión a la base de datos
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
