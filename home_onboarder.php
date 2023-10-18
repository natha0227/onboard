<?php
session_start();

if($_SESSION['id_session']!=session_id()){
echo "<script>
location.href='entrada_erronea.php';
</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <title>Onboarder</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #333;
            padding-top: 20px;
            color: white;
        }

        .sidebar a {
            padding: 8px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .content {
            padding: 16px;
            flex: 1;
        }

        .submenu {
            padding-left: 20px;
        }

        .submenu a {
            padding: 8px;
            text-decoration: none;
            font-size: 16px;
            color: #808080;
            display: block;
            transition: 0.3s;
        }

        .submenu a:hover {
            background-color: #555;
        }

        .iframe-container {
            height: calc(100% - 20px); /* Ajustar el tamaño del iframe según el contenido restante */
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .sidebar h2 {
        text-align: center;
        margin-bottom: none; /* Puedes ajustar este margen según tus preferencias */
        }

        footer {
            background-color: #fff;
            color: black;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="sidebar">
    <a href="../iniciar_sesion/cerrar_sesion.php"> 🡸 </a>
       
    <h2>Menú</h2>
    <p style="font-size: 16px; text-align: center;">Bienvenid@ <?php echo $_SESSION['nickname']?>. </p> 
        <ul>
            <li><a href="#" onclick="cargarContenido('perfil.php')">Mi Perfil</a></li>
            <li><a href="#" onclick="cargarContenido('explicacion.html')">¿Como funciona la solicitud?</a></li>
            <li><a href="#" onclick="cargarContenido('solicitud_2.php')">Hacer Solicitud</a></li>
            <li><a href="#" onclick="cargarContenido('mis_solicitudes.php')">Mis Solicitudes</a>
                <ul class="submenu">
                    <li><a href="#" onclick="cargarContenido('pendientes_onboarder.php')">Pendientes</a></li>
                    <li><a href="#" onclick="cargarContenido('aceptadas_onboarder.php')">Aceptadas</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="content">
        <!-- Contenedor del iframe que ocupará el espacio restante -->
        <div class="iframe-container">
            <iframe id="miIframe" src="" frameborder="0"></iframe>
        </div>
    </div>
    <footer>
        <p>© 2023 Onboard | Todos los derechos reservados</p>
    </footer>
    <script>
        function cargarContenido(url) {
            document.getElementById('miIframe').src = url;
        }
    </script>
</body>
</html>
