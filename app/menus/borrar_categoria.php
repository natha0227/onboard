<?php
include ('../iniciar_sesion/conexion.php');

// Verificar si se ha enviado el ID válido para eliminar
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id']; // Obtener el ID del registro a eliminar

    // Verificar si se ha confirmado la eliminación
    if (isset($_GET['opcion']) && $_GET['opcion'] === 'borrar') {
        // Ejecutar la consulta para eliminar el registro
       $sql1 ="SELECT id fROM solicitud WHERE servicio = $id";
       $sql2 = "DELETE FROM servicio WHERE id = $id";
       $ejecutar_sql1 = mysqli_query($conn,$sql1);
       $total_categorias = $ejecutar_sql1->num_rows;
       if($total_categorias == 0){
        if (mysqli_query($conn, $sql2)) {
            header('Location: listar_categoria.php'); // Redireccionar a la página de listar después de eliminar
            exit();
        } else {
            echo "Error al eliminar el registro: " . mysqli_error($conn);
        }
       } else {
        echo '<script>
        alert("No se Puede borrar la categoria; esta asociada a '. $total_categorias . ' solicitudes");
        window.location.href="listar_categoria.php";
    </script>';
       }
        
    } else {
        // Mostrar confirmación antes de eliminar
        echo "<script>
            var confirmacion = confirm('¿Seguro que deseas borrar el registro?');
            if (confirmacion) {
                location.href = 'borrar_categoria.php?opcion=borrar&id=$id';
            } else {
                location.href = 'listar_categoria.php';
            }
        </script>";
    }
} else {
    echo "ID no válido para eliminar.";
}

mysqli_close($conn);
?>