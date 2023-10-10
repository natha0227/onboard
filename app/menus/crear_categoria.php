<!DOCTYPE html>
<html lang="en">
<head>
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <link href="../css/cssboni.css" rel="stylesheet" type="text/css">
  <title>Formulario de Edición</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Incluye FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="contenedor-formulario">
       <div class="wrap">
           <form action="guardar_categoria.php" class="formulario" name="cate" method="post">
                <div>
                
                    <div class="input-group" >
                        <label class="label active" for="categoria">Categoría de la solicitud:</label>
                        <input type="text"  id="nombre" name="nombre" placeholder="" value="" required="required">
                    </div>
                    <div class="input-group">
                        <input type="text"  id="descripcion" name="descripcion" placeholder="Descripción" value="" required="required">
                        <label class="label active" for="descripcion">Descripción:</label>
                    </div>

                    <input type="submit" id="btn-submit" name="editar" value="Guardar">
                </div>
            </form>
            <a href="listar_categoria.php">  
                    <input type="submit" id="btn-submit" value="Cancelar" style="background: #303F9F;border-radius: 1px;border: 2px solid #f2f2f2;color: #fff;cursor: pointer;display: inline-block;
                    font-family: 'Roboto';
                    font-size: 16px;
                    padding: 15px;
                    width: 23%;
                    -webkit-transition: all 0.3s ease;
                    -o-transition: all 0.3s ease;
                    transition: all 0.3s ease;">  
                    </a>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
