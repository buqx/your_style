<?php
include_once '../../controllers/producto.control.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los valores del formulario
    $nom_pro = $_POST['nom_pro'];
    $precio_pro = $_POST['precio_pro'];
    $descripcion_pro = $_POST['descripcion_pro'];

    // Crea una instancia del controlador
    $controlador = new ProductoControl();

    // Llama a la función editar_producto para actualizar los datos del producto
    $controlador->insertProducto( $nom_pro, $precio_pro, $descripcion_pro);

    // Redirecciona a la página de lista de productos o a donde desees
    header('Location: list_producto.php');
    exit();
}
else{
    echo("error");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Formulario de Inserción de Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nom_pro" class="form-label">Nombre del producto:</label>
                <input type="text" class="form-control" id="nom_pro" name="nom_pro" required>
            </div>
            <div class="mb-3">
                <label for="precio_pro" class="form-label">Precio:</label>
                <input type="number" class="form-control" id="precio_pro" name="precio_pro" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="descripcion_pro" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion_pro" name="descripcion_pro" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</body>
</html>
