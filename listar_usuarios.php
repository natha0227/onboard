<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Lista de Usuarios</title>

  <!-- Incluye los archivos de Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/css.listar.css" rel="stylesheet" type="text/css">

  <!-- Incluye FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>

  <div class="container">
  <a href="crear_cuenta2.html" class="btn btn-info">
    <i class="fas fa-create"></i> Crear usuario</a>
    <h1 class="mt-5">Usuarios registrados</h1>
    <form class="formulario" name="cate" method="get">
      <label for="estado">Seleccionar nivel:</label>
      <select class="form-select" aria-label="Default select example" id="lvel" name="lvel">
        <?php
        // Incluir el archivo de conexión
        include("../iniciar_sesion/conexion.php");

        // Consulta SQL para obtener las categorías
        $sql = "SELECT id, nivel FROM lvel";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Agregar opciones a la lista desplegable
          while ($row = $result->fetch_assoc()) {
            $selected = ($lvel == $row["id"]) ? "selected" : "";
            echo "<option value='" . $row["id"] . "' $selected>" . $row["nivel"] . "</option>";
          }
        } else {
          echo "No se encontraron niveles en la base de datos.";
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
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">nickname</th>
            <th scope="col">Mail</th>
            <th scope="col">Contraseña</th>
            <th scope="col">Nivel</th>
            <th scope="col">Estado</th>
            <th scope="col" colspan="2">Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_GET['lvel'])) {
            $lvel = $_GET['lvel'];
            include("../iniciar_sesion/conexion.php");
            $sql_listar = "SELECT * FROM usuario WHERE lvel = $lvel";
            $ejecutar_sql_listar = mysqli_query($conn, $sql_listar);

            if ($ejecutar_sql_listar->num_rows > 0) {

              while ($datos = mysqli_fetch_array($ejecutar_sql_listar)) {
                echo '<tr>
                    <td>' . $datos['id'] . '</td>
                    <td>' . $datos['nombre'] . '</td>
                    <td>' . $datos['apellido'] . '</td>
                    <td>' . $datos['nickname'] . '</td>
                    <td>' . $datos['mail'] . '</td>
                    <td>' . $datos['contrasena'] . '</td>
                    <td>' . $datos['lvel'] . '</td>
                    <td>' . $datos['estado'] . '</td>

                    </td>
                    <td><a href="borrar_solicitud.php?id=' . $datos["id"] . '" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Eliminar</a></td>
                    <td><a href="editar_solicitud.php?id=' . $datos["id"] . '" class="btn btn-warning">
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