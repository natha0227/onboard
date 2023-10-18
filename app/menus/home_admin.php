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
    <title>Admin</title>
</head>
<body>
<div class="sidebar">
<a href="../iniciar_sesion/cerrar_sesion.php"> 🡸 </a>
    
        <h2>Menú</h2>
        <p style="font-size: 16px; text-align: center;">Bienvenid@ admin <?php echo $_SESSION['nickname']?>. </p> 
        <ul>
        <li><a href="#" onclick="cargarContenido('perfil.php')">Mi Perfil</a></li>
        <li><a href="#" onclick="cargarContenido('listar_categoria.php')">Servicios</a></li>
        <li><a href="#" onclick="cargarContenido('listar_usuarios.php')">Usuarios</a></li>
        <li><a href="#" onclick="cargarContenido('listar_solicitud_2.php')">Solicitudes</a> </li>
        <li><a href="#" onclick="cargarContenido('Reporte.php')">Reporte</a></li>
        </ul>
    </div>
    
    <div class="content">

        <div class="iframe-container">
            <iframe id="miIframe" src="" frameborder="0" scrolling="yes" seamless></iframe>
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