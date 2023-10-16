<?php
session_start();
include ("conexion.php");
<<<<<<< HEAD
error_reporting(0);
=======
>>>>>>> 132b51384738e71c8d503c17b7a6fd839ab92621
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

if (mysqli_num_rows($result) > 0) {
    $subir = "UPDATE usuario SET estado = 1 WHERE id = $_SESSION[id]";
    $subido = mysqli_query($conn,$subir);
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
} else if (mysqli_num_rows($result) == '0') {
    $cons = "SELECT * FROM usuario WHERE mail='$mail' AND contrasena ='$contrasena'";
    $result = mysqli_query($conn,$cons);
    $datos=mysqli_fetch_assoc($result);
    $id=$datos['id'];
    $cerrar = "UPDATE usuario SET estado = 0 WHERE id = $id";
    $cerrado = mysqli_query($conn,$cerrar);
    echo '<script type="text/javascript">';
    echo 'alert("Este usuario ya tiene una sesión iniciada o sus Credenciales son invalidas");';
    echo 'window.location.href = "index.html";';
    echo '</script>';
exit;
} else {
    echo '<script type="text/javascript">';
    echo 'alert("Credenciales invalidas");';
    echo 'window.location.href = "index.html";';
    echo '</script>';
}
mysqli_close($conn);
?>