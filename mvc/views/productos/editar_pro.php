<?php
include_once '../../controllers/producto.control.php';

// Verificar si se ha proporcionado un ID de producto válido
if (isset($_GET['id'])) {
    $id_pro = $_GET['id'];

    // Crear una instancia de la clase ProductoControl
    $producto_obj = new ProductoControl();
    // Obtener el objeto del producto seleccionado
    $producto = $producto_obj->select_producto($id_pro);
} else {
    // Redireccionar a la página principal si no se proporciona un ID válido
    header('Location: list_producto.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los valores del formulario
    $id_pro = $_POST['id_pro'];
    $nom_pro = $_POST['nom_pro'];
    $precio_pro = $_POST['precio_pro'];
    $descripcion_pro = $_POST['descripcion_pro'];

    // Crea una instancia del controlador
    $controlador = new ProductoControl();

    // Llama a la función editar_producto para actualizar los datos del producto
    $controlador->editar_producto($id_pro, $nom_pro, $precio_pro, $descripcion_pro);

    // Redirecciona a la página de lista de productos o a donde desees
    header('Location: list_producto.php');
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css
" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container">
        <h1 class="text-light">Editar Producto</h1>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label text-light">ID:</label>
                <input type="text" name="id_pro" class="form-control" value="<?php echo $producto->getId_pro(); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Nombre:</label>
                <input type="text" name="nom_pro" class="form-control" value="<?php echo $producto->getNom_pro(); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Precio:</label>
                <input type="text" name="precio_pro" class="form-control" value="<?php echo $producto->getPrecio_pro(); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-light">Descripción:</label>
                <input type="text" name="descripcion_pro" class="form-control" value="<?php echo $producto->getDescripcion_pro(); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

    <script src="
https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js
" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html> 