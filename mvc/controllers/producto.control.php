<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/mvc/models/productos.class.php';
class ProductoControl
{
    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = new PDO('mysql:host=localhost;dbname=taller_java', 'root', '');
        // Asegúrate de reemplazar 'nombre_host', 'nombre_base_datos', 'nombre_usuario' y 'contraseña' con los valores correctos de tu configuración de base de datos.
    }

    public function list_productos()
    {
        $producto_obj = new Productos();
        $productos = $producto_obj->getAll();
        return $productos;
    }

    public function select_producto($id_pro)
    {
        // FETCH_OBJ
        $sql = $this->dbConnection->prepare("SELECT * FROM productos WHERE id_pro = ?");
        $sql->bindParam(1, $id_pro);
        // Ejecutamos
        $sql->execute();

        // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
        if($row = $sql->fetch(PDO::FETCH_OBJ)) {
            // Creacion de objeto de la clase productos
            $pro_obj = new Productos($row->id_pro, $row->nom_pro, $row->precio_pro, $row->descripcion_pro);
        }else{
            $pro_obj = null;
        }
        return $pro_obj; // Se retorna el objeto de productos
    }
    public function insertProducto( $id_pro,$nom_pro, $precio_pro, $descripcion_pro)
    {
        $producto_obj = new Productos($id_pro,$nom_pro, $precio_pro, $descripcion_pro);
        $producto = $producto_obj->insertar_productos();
        return $producto;
    }

    public function editar_producto($id_pro,$nom_pro, $precio_pro, $descripcion_pro)
    {
        $producto_obj = new Productos($id_pro,$nom_pro, $precio_pro, $descripcion_pro);
        $producto = $producto_obj->editar_producto($id_pro);
        return $producto;
    }

     public function eliminar_producto($id_pro)
    {
       $producto_obj = new Productos($id_pro);
       $producto=$producto_obj->eliminar_producto();
       return $producto;
    }}
?>