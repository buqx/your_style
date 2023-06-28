<?php
include_once '../../controllers/producto.control.php';

// Verificar si se ha enviado un ID de producto
if (isset($_GET['id']) ) {
    $id_pro = $_GET['id'];
    // Se crea una instancia de la clase ProductoControl
    $producto_obj = new ProductoControl();
    // Se llama al método para obtener el producto por ID
    $producto = $producto_obj->select_producto($id_pro);
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid backg1">
        HEADER MENU
    </div>

    <div class="container">
        <h1>Detalles del Producto</h1>
        <?php if (isset($producto)) { ?>
            <form>
                <div class="mb-3">
                    <label for="id_pro" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id_pro" onlyread value="<?php echo $producto->getId_pro(); ?>" >
                </div>
                <div class="mb-3">
                    <label for="nom_pro" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nom_pro"onlyread value="<?php echo $producto->getNom_pro(); ?>" >
                </div>
                <div class="mb-3">
                    <label for="precio_pro" class="form-label">Precio</label>
                    <input type="text" class="form-control" id="precio_pro"onlyread value="<?php echo $producto->getPrecio_pro(); ?>" >
                </div>
                <div class="mb-3">
                    <label for="descripcion_pro" class="form-label">Descripción</label>
                    <textarea class="form-control" onlyread id="descripcion_pro" rows="3" ><?php echo $producto->getDescripcion_pro(); ?></textarea>
                </div>
                
            </form>
        <?php } else { ?>
            <p>No se encontró el producto solicitado.</p>
        <?php } ?>
    </div>

    <br>
    <div class="container-fluid backg1">FOOTER</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
