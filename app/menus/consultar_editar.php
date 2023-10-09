<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Crear Cuenta</title>
  <link rel="stylesheet" type="text/css" href="../css/consultar.css">
</head>
<body>
  <div class="edit-container">
    <div class="edit-box">
      <?php
      $conn = new mysqli("localhost", "root", "", "onboard");
      if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM usuario WHERE id = $_SESSION[id]";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $id = $row['id'];
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $nickname = $row['nickname'];
        $mail = $row['mail'];
        $contrasena = $row['contrasena'];

        echo '<h2>Actualiza estos datos</h2>';
        echo '<form action="guardar_edicion.php" method="POST" class="edit-box">';
        echo '<input type="hidden" name="id" value="' . $id . '">';
        echo 'Nombre: <input type="text" name="nombre" value="' . $nombre . '"><br>';
        echo 'Apellido: <input type="text" name="apellido" value="' . $apellido . '"><br>';
        echo 'Nickname: <input type="text" name="nickname" value="' . $nickname . '"><br>';
        echo 'Mail: <input type="email" name="mail" value="' . $mail . '"><br>';
        echo 'Contraseña: <input type="text" name="contrasena" value="' . $contrasena . '"><br>';
        echo '<input type="submit" value="Guardar" onclick="redirigir()">';
        echo '</form>';
      } else {
        echo "hay un problema!";
          exit;
      }

      $conn->close();
      ?>
    </div>
  </div>
</body>
</html>
