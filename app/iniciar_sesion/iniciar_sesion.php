<?php
session_start();
include ("conexion.php");

$mail = $_POST['mail'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuario WHERE mail='$mail' AND contrasena ='$contrasena' AND estado=0";
$result = mysqli_query($conn,$sql);
$datos=mysqli_fetch_assoc($result);

$_SESSION['id_session']=session_id();
$_SESSION['nickname']=$datos['nickname'];
$_SESSION['mail']=$datos['mail'];
$_SESSION['nombre']=$datos['nombre'];
$_SESSION['apellido']=$datos['apellido'];
$_SESSION['id']=$datos['id'];
$_SESSION['lvel']=$datos['lvel'];

$subir = "UPDATE usuario SET estado = 1 WHERE id = $_SESSION[id]";
$subido = mysqli_query($conn,$subir);

if (mysqli_num_rows($result) > 0) {
    switch ($_SESSION['lvel']) {
        case 1:
            echo'<script type="text/javascript">
            alert("inicio de sesion exitoso!");
            </script>';
            header("Location: ../menus/home_onboarder.php");
            exit;
            break;
        case 2:
            echo'<script type="text/javascript">
            alert("inicio de sesion exitoso!");
            </script>';
            header("Location: ../menus/home_asesor.php");
            exit;
            break;
        case 3:
            echo'<script type="text/javascript">
            alert("inicio de sesion exitoso!");
            </script>';
            header("Location: ../menus/home_admin.php");
            exit;
            break;            
    }

} else {
    echo "session iniciada o credenciales";
}

mysqli_close($conn);
?>
