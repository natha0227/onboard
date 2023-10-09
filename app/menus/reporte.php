<?php
session_start();
$conn = new mysqli("localhost", "root", "", "onboard");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql1 = "SELECT count(*) as count FROM usuario";
$result1 = $conn->query($sql1);

$sql2 = "SELECT count(*) as count FROM categoria";
$result2 = $conn->query($sql2);

$sql3 = "SELECT count(*) as count FROM solicitud";
$result3 = $conn->query($sql3);

$sql4 = "SELECT count(*) as count FROM metodo";
$result4 = $conn->query($sql4);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .query-result {
            background-color: #333;
            color: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            text-align: left;
            max-width: 400px;
            width: 48%; /* Ajusta según tu preferencia */
            margin: 10px;
        }

        .query-result h3 {
            font-weight: bold;
            color: #fff;
        }
</style>
</head>
<body>
    <?php
    if ($result1) {
        $row1 = $result1->fetch_assoc();
        echo "<div class='query-result'>";
        echo "<h3>Cantidad de Usuarios</h3>";
        echo "<p>Resultado: " . $row1['count'] . "</p>";
        echo "</div>";
    } else {
        echo "<p>No se encontraron resultados para Consulta 1.</p>";
    }

    if ($result2) {
        $row2 = $result2->fetch_assoc();
        echo "<div class='query-result'>";
        echo "<h3>Cantidad de categorías</h3>";
        echo "<p>Resultado: " . $row2['count'] . "</p>";
        echo "</div>";
    } else {
        echo "<p>No se encontraron resultados para Consulta 2.</p>";
    }

    if ($result3) {
        $row3 = $result3->fetch_assoc();
        echo "<div class='query-result'>";
        echo "<h3>Cantidad de solicitudes</h3>";
        echo "<p>Resultado: " . $row3['count'] . "</p>";
        echo "</div>";
    } else {
        echo "<p>No se encontraron resultados para Consulta 3.</p>";
    }

    if ($result4) {
        $row4 = $result4->fetch_assoc();
        echo "<div class='query-result'>";
        echo "<h3>Cantidad de métodos</h3>";
        echo "<p>Resultado: " . $row4['count'] . "</p>";
        echo "</div>";
    } else {
        echo "<p>No se encontraron resultados para Consulta 4.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
