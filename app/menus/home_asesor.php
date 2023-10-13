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
    <title>Asesor</title>
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
            height: 88%;
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
        <ul>
            <li><a href="#" onclick="cargarContenido('perfil.php')">Mi Perfil</a></li>
            <li><a href="#" onclick="cargarContenido('listar_categoria.php')">Categorias</a></li>
            <li><a href="#" onclick="cargarContenido('solicitudes.php')">Solicitudes</a></li>
            <li><a href="#" onclick="cargarContenido('mis_asesorias.php')">Mis Asesorias</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Página Principal</h1>
        <p>Bienvenid@ Asesor <?php echo $_SESSION['nickname']?>. </p>
        
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