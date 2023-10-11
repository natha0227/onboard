<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link href="../css/cssboni.css" rel="stylesheet" type="text/css"> 
    <!-- Incluye FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<title>Agendar Mantenimiento</title>
</head>

<body>
  
  <div class="contenedor-formulario">
    <div class="wrap">
      <form action="guardar_solicitud.php" class="formulario" name="formu" method="post" required="required">
        <div>
          <div class="input-group">
            <label class="label active" for="f_p">Fecha de solicitud:</label>
            <input type="date" id="f_p" name="f_p" class="form_input" placeholder=" " >
           
          </div>
          <div class="input-group">
            <label class="label active" for="remitente">Nombre del remitente:</label>
            <input type="text" id="id_usuario" name="id_usuario"  placeholder="  " >
            
          </div>
          <div class="input-group">
            <label class="label active" for="mail">Correo:</label>
            <input type="email" id="mail" name="mail" placeholder="email@gmail.com" required="required">
        
          </div>
          <div class="input-group" style="padding: 17px;">
            <select class="form-select" aria-label="Default select example" id="servicio" name="servicio" required="required">
              <?php
                // Incluir el archivo de conexión
                include("../iniciar_sesion/conexion.php");
    
                // Consulta SQL para obtener los usuarios
                $sql = "SELECT id, nombre FROM servicio";
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
			      <label class="label active" for="servicio">Categoria de la solicitud:</label>
          </div>
          <div class="input-group">
            <label class="label active" for="detalles">Detalle de la solicitud:</label>
            <input type="text" id="detalles" name="detalles"  placeholder="  " required="required">

          </div>
          <div class="input-group" style="padding: 17px;">
                <select class="form-select" aria-label="Default select example" id="metodo" name="metodo" required="required">
                <?php
                    // Incluir el archivo de conexión
                    include("../iniciar_sesion/conexion.php");
        
                    // Consulta SQL para obtener los usuarios
                    $sql = "SELECT  id, nombre FROM metodo";
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
			      <label class="label active" for="metodo">Metodo:</label>
          </div>
          <input type="submit" id="btn-submit" value="Enviar">
        </div>
      </form>
    </div>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>