<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Lista de Categorias</title>

    <!-- Incluye los archivos de Bootstrap y FontAwesome -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <a href="crear_categoria.php" class="btn btn-info">
                            <i class="fas fa-create"></i> Crear servicio</a>
        <table class="table table-bordered table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">descripcion</th>
                    <th scope="col" colspan="2">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("../iniciar_sesion/conexion.php");
                $sql_listar = "select * from servicio";
                $ejecutar_sql_listar = mysqli_query($conn, $sql_listar);

                while ($datos = mysqli_fetch_array($ejecutar_sql_listar)) {
                    echo '<tr>
                        <td>' . $datos['id'] . '</td>
                        <td>' . $datos['nombre'] . '</td>
                        <td>' . $datos['descripcion'] . '</td>
                        <td><a href="borrar_categoria.php?id=' . $datos["id"] . '" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Eliminar</a></td>
                        <td><a href="editar_categoria.php?id=' . $datos["id"] . '" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Editar</a></td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Incluye los archivos JavaScript de Bootstrap (si es necesario) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
