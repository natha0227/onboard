<?php
echo var_dump($_POST);
include ("../iniciar_sesion/conexion.php");
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];


$sql_insertar="INSERT INTO `categoria` (`nombre`, `descripcion`)VALUES ('$nombre', '$descripcion')";
$guardardatos=mysqli_query($conn,$sql_insertar);


if($guardardatos){
echo "<script>
alert('La categoria se creo correctamente');
location.href='listar_categoria.php';
</script>";
}
else
{
echo "Error en la Inserccion".mysqli_error($mysqli). " <a href='categoria.html'> <--- Regresar</a>";
}

//cerrar la cadena de conexion con el servidor
mysqli_close($mysqli);


?>