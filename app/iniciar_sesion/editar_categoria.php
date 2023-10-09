<?php
// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_categoria = $_POST["id_categoria"];
    $nombre_categoria = $_POST["nombre_categoria"];
    $descripcion_categoria = $_POST["descripcion_categoria"];

    // Actualiza la categoría en la base de datos o realiza la operación necesaria aquí

    // Redirige a la lista de categorías después de editar
    header("Location: lista_categorias.php");
    exit;
}
