<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mi perfil</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .profile-container {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
        }

        .profile-container h2 {
            font-weight: bold;
            color: #333;
        }

        .profile-info {
            color: #555;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .edit-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }

        .edit-button:hover {
            background-color: #2980b9;
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
	die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT usuario.*, lvel.nivel FROM usuario INNER JOIN lvel ON usuario.lvel = lvel.id WHERE usuario.id= $_SESSION[id]";

$result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="profile-container">';
            echo '<h2>Datos del Perfil</h2>';
            echo '<table>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr><th>ID</th><td>' . $row["id"] . '</td></tr>';
                echo '<tr><th>Nombre</th><td>' . $row["nombre"] . '</td></tr>';
                echo '<tr><th>Apellido</th><td>' . $row["apellido"] . '</td></tr>';
                echo '<tr><th>Nickname</th><td>' . $row["nickname"] . '</td></tr>';
                echo '<tr><th>Correo Electrónico</th><td>' . $row["mail"] . '</td></tr>';
                echo '<tr><th>Contraseña</th><td>' . $row["contrasena"] . '</td></tr>';
                echo '<tr><th>Nivel</th><td>' . $row["nivel"] . '</td></tr>';
            }
            echo '</table>';
            echo '<a href="consultar_editar.php" class="edit-button">Editar</a>';
            echo '</div>';
        } else {
            echo "inicie sesion.";
        }

        $conn->close();
    ?>
</body>
</html>
