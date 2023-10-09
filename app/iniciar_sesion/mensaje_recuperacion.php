<!DOCTYPE html>
<html>
<head> 
  <meta charset="utf-8">
  <title>Crear Cuenta</title>

<style>
  body {
  font-family: Arial, sans-serif;
  background-color: #f5f5f5; /* Fondo gris muy claro */
  margin: 0;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  }

  .login-box {
  background-color: rgba(255, 255, 255, 0.8);
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  max-width: 400px;
  width: 100%;
  }

  .login-box h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #333;
  font-size: 24px;
  }

  .form-title {
  font-size: 24px;
  color: #333;
  margin-bottom: 20px;
  }

  .login-container {
  text-align: center; /* Centra horizontalmente */
  }

  .edit-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
  }

  .edit-box {
      background-color: #f2f2f2; /* Formulario en gris claro */
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      max-width: 400px;
      width: 100%;
  }

  .edit-box h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333; /* Letra en negro */
      font-size: 24px;
  }

  .edit-box label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
      color: #555;
      font-size: 16px;
  }

  .edit-box input[type="text"],
  .edit-box input[type="email"],
  .edit-box input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 15px;
      font-size: 16px;
      background-color: rgba(255, 255, 255, 0.8); /* Espacios para rellenar en blanco transparente */
  }

  .edit-box input[type="text"]::placeholder,
  .edit-box input[type="email"]::placeholder,
  .edit-box input[type="password"]::placeholder {
      color: #333; /* Letra en negro */
  }

  .edit-box input[type="submit"] {
      background-color: #00bcd4; /* Botón en azul aciano */
      color: #fff; /* Letra en blanco */
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
      position: relative;
      overflow: hidden;
      z-index: 1;
  }

  .edit-box input[type="submit"]:hover {
      background-color: #0097a7; /* Color de hover ligeramente más oscuro */
  }

    .edit-box input[type="submit"]:before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background-image: radial-gradient(#00bcd4 5%, transparent 10%);
      transform: rotate(30deg);
      pointer-events: none;
      z-index: -1;
      animation: sparkle 1.5s infinite linear;
    }

</style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onboard";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

$mail = $_POST['mail'];

$sql = "SELECT * FROM usuario WHERE mail = '$mail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $contrasena = $row['contrasena'];
    $id = $row['id'];

    echo '<form action="../iniciar_sesion/guardar_edicion.php" method="POST" class="edit-box">';
    echo '<input type="hidden" name="id" value="' . $id . '">'; // Campo oculto para enviar el ID al guardar la edición
    echo 'contraseña: <input type="text" name="contrasena" value="' . $contrasena . '"><br>';
    echo '<input type="submit" value="Guardar" onclick="redirigir()">';
    echo '</form>';

}

?>
</body>
</html>

