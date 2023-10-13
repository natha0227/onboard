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

  <div class="container">
    <h1 class="mt-5">Solicitudes Agendadas</h1>
    <form class="formulario" name="cate" method="get">
      <label for="estado">Seleccionar Estado:</label>
      <select class="form-select" aria-label="Default select example" id="estado_solicitud" name="estado_solicitud">
        <?php
        // Incluir el archivo de conexión
        include("../iniciar_sesion/conexion.php");

        // Consulta SQL para obtener las categorías
        $sql = "SELECT id, nombre_estado FROM estado_solicitud";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Agregar opciones a la lista desplegable
          while ($row = $result->fetch_assoc()) {
            $selected = ($estado_solicitud == $row["id"]) ? "selected" : "";
            echo "<option value='" . $row["id"] . "' $selected>" . $row["nombre_estado"] . "</option>";
          }
        } else {
          echo "No se encontraron categorías en la base de datos.";
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>
      </select>
      <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    <div id="listaSolicitudes">

      <table class="table table-bordered table-responsive">
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Agendamiento</th>
            <th scope="col">Usuario</th>
            <th scope="col">Correo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Detalles</th>
            <th scope="col">Estado Solicitud</th>
            <th scope="col">Metodo</th>
            <th scope="col" colspan="2">Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_GET['estado_solicitud'])) {
            $estado_solicitud = $_GET['estado_solicitud'];
            include("../iniciar_sesion/conexion.php");
            $sql_listar = "SELECT solicitud.*, estado_solicitud.id AS 'id_e_s', estado_solicitud.nombre_estado, metodo.nombre FROM `solicitud` INNER JOIN estado_solicitud ON solicitud.estado_solicitud = estado_solicitud.id INNER JOIN metodo ON solicitud.metodo = metodo.id WHERE solicitud.estado_solicitud = $estado_solicitud;";
            $ejecutar_sql_listar = mysqli_query($conn, $sql_listar);

            if ($ejecutar_sql_listar->num_rows > 0) {

              while ($datos = mysqli_fetch_array($ejecutar_sql_listar)) {
                echo '<tr>
                    <td>' . $datos['id'] . '</td>
                    <td>' . $datos['f_p'] . '</td>
                    <td>' . $datos['id_usuario'] . '</td>
                    <td>' . $datos['email'] . '</td>
                    <td>' . $datos['servicio'] . '</td>
                    <td>' . $datos['detalles'] . '</td>
                    <td>' . $datos['nombre_estado'] . '</td>
                    <td>' . $datos['nombre'] . '</td>

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
        </tbody>
      </table>
    </div>

  </div>
  <!-- Aquí mostrarás la lista de solicitudes filtradas -->

  <!-- Incluye los archivos JavaScript de Bootstrap (si es necesario) -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>