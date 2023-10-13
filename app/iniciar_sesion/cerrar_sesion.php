<!DOCTYPE html>
<html>
<head>
    <title>Cerrar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }

        .message {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 5px;
            margin: 100px auto;
            max-width: 400px;
        }
    </style>
</head>
<body>

    <h1>¡Sesión Cerrada!</h1>
    <p>Tu sesión se ha cerrado correctamente.</p>
    <p>Vuelve a <a href="index.html">iniciar sesión</a> si deseas acceder nuevamente.</p>
    <?php
        session_start();
        include ("conexion.php");
        header("Cache-control: private");
        $subir = "UPDATE usuario SET estado = 0 WHERE id = $_SESSION[id]";
        $subido = mysqli_query($conn,$subir);
        session_unset();
        session_destroy();
    ?>
</body>
</html>