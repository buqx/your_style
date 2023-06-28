<?php
include_once '../../controllers/producto.control.php';
if (isset($_GET['id'])) {
    $id_pro = $_GET['id'];
    $producto_obj = new ProductoControl();
    // Obtener los datos del artículo para su edición
    $producto = $producto_obj->eliminar_producto($id_pro); 
    header('Location: list_producto.php');
} else {
    // Manejar el caso en que no se ha proporcionado un ID de artículo válido
    echo "ID de artículo no especificado";
    exit;
}
?>