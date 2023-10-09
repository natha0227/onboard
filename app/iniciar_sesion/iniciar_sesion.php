<?php
session_start();
include ("conexion.php");

$mail = $_POST['mail'];
$contrasena = $_POST['contrasena'];
$sql = "SELECT * FROM usuario WHERE mail='$mail' AND contrasena='$contrasena'";
$result = mysqli_query($conn,$sql);
$datos=mysqli_fetch_assoc($result);

$_SESSION['id_session']=session_id();
$_SESSION['nickname']=$datos['nickname'];
$_SESSION['mail']=$datos['mail'];
$_SESSION['nombre']=$datos['nombre'];
$_SESSION['apellido']=$datos['apellido'];
$_SESSION['id']=$datos['id'];
$_SESSION['lvel']=$datos['lvel'];
//echo "level:".$_SESSION['level'];


if (mysqli_num_rows($result) > 0) {
    
    switch ($_SESSION['lvel']) {
        case 0:
            echo "Inicio de sesion exitoso! ";
            header("Location: ../menus/home_onboarder.php");
            exit;
            break;
        case 1:
            echo "Inicio de sesion exitoso!";
            header("Location: ../menus/home_asesor.php");
            exit;
            break;
        case 2:
            echo "Inicio de sesion exitoso!";
            header("Location: ../menus/home_secre.php");
            exit;
            break;
        case 3:
            echo "Inicio de sesion exitoso!";
            header("Location: ../menus/home_admin.php");
            exit;
            break;            
    }

} else {
    echo "Credenciales invalidas";
}

mysql_close($conn);
?>
