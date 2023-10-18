<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- ... Tus etiquetas meta, enlaces a CSS y otros encabezados ... -->
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link href="../css/cssboni.css" rel="stylesheet" type="text/css">
  <title>Formulario de Edición</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
 
    <!-- Incluye FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
  <div class="contenedor-formulario">
    <div class="wrap">
      <form action="actualizar_solicitud2.php" class="formulario" name="formu" method="post">
        <div>
          <?php
          // Incluir el script obtener_datos_edicion.php para obtener los datos a editar
          include("select_solicitud.php");
          ?>

          <!-- Campo oculto para el ID -->
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          
          <div class="input-group">
            <label class="label active" for="f_p">Fecha de publicación:</label>
            <input type="date" id="f_p" name="f_p" class="form_input" placeholder=" " value="<?php echo $f_p; ?>">
          </div>
          
          <div class="input-group">
            <label class="label active" for="mail">Correo:</label>
            <input type="email" id="mail" name="mail" class="form_input" placeholder="email@gmail.com" value="<?php echo $mail; ?>">
          </div>
          
          <div class="input-group" style="padding: 17px;">
            <select class="form-select" aria-label="Default select example" id="servicio" name="servicio">
              <?php
              // Incluir el archivo de conexión
              include("../iniciar_sesion/conexion.php");

              // Consulta SQL para obtener las categorías
              $sql = "SELECT id, nombre FROM servicio";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // Agregar opciones a la lista desplegable
                while ($row = $result->fetch_assoc()) {
                  $selected = ($categoria == $row["id"]) ? "selected" : "";
                  echo "<option value='" . $row["id"] . "' $selected>" . $row["nombre"] . "</option>";
                }
              } else {
                echo "No se encontraron categorías en la base de datos.";
              }

              // Cerrar la conexión a la base de datos
              $conn->close();
              ?>
            </select>
            <label class="label active" for="servicio">Servicio para la solicitud:</label>
          </div>

          <div class="input-group" style="padding: 17px;">
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
            <label class="label active" for="estado_solicitud">Estado de la solicitud:</label>
          </div>

          <div class="input-group">
            <label class="label active" for="detalles">Detalle de la solicitud:</label>
            <input type="text" id="detalles" name="detalles" class="form_input" value="<?php echo $detalles; ?>">
          </div>
          <div class="input-group" style="padding: 17px;">
                <select class="form-select" aria-label="Default select example" id="metodo" name="metodo">
                <?php
                    // Incluir el archivo de conexión
                    include("../iniciar_sesion/conexion.php");
        
                    // Consulta SQL para obtener los usuarios
                    $sql = "SELECT id, nombre FROM metodo";
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                    // Agregar opciones a la lista desplegable
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                    }
                    } else {
                    echo "No se encontraron usuarios en la base de datos.";
                    }
        
                    // Cerrar la conexión a la base de datos
                    $conn->close();
                ?>
                </select>
                <input type="hidden" name="id_asesor" value="<?php echo $_SESSION['id']; ?>">
			      <label class="label active" for="metodo">Metodo:</label>
          </div>
          <input type="submit" id="btn-submit" name="editar" value="Editar">
        </div>
      </form>
    </div>
  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
