<?php
     include_once '../../controllers/producto.control.php';
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
    <?php
        // Se crea una instancia de la clase ProductoControl
        $producto_obj = new ProductoControl();
        // Se llama al método que lista a todos los productos
        $productos = $producto_obj->list_productos();
    ?>
    <div class="container-fluid backg1">
        HEADER MENU
    </div>
    <div class="col-1">
            <a class="btn btn-success btn-lg" href="insertar_pro.php" role="button">Insertar</a>
            </div>
    <div class="container">
        <h1>Gestionar Productos</h1>
    
        <div class="row">
            <div class="col-1">Id</div>
            <div class="col-1">nombre</div>
            <div class="col-1">precio</div>
            <div class="col-1">descripcion</div>
        </div>
        
        <?php foreach ($productos as $item) {?>
        <div class="row">
            <div class="col-1"><?php echo $item->id_pro; ?></div>
            <div class="col-1"><?php echo $item->nom_pro; ?></div>
            <div class="col-1"><?php echo $item->precio_pro; ?></div>
            <div class="col-1"><?php echo $item->descripcion_pro; ?></div>
            <div class="col-1">        
            <a class="btn btn-primary btn-lg" href="ver_pro.php?id=<?php echo $item ->id_pro; ?>" role="button">Ver</a>
            </div>
            <div class="col-1">
            <a class="btn btn-primary btn-lg" href="editar_pro.php?id=<?php echo $item ->id_pro; ?>" role="button">Editar</a>
            </div>
            <div class="col-1">
            <a class="btn btn-danger btn-lg" href="eliminar_pro.php?id=<?php echo $item ->id_pro; ?>" role="button">Eliminar</a>
            </div>
        </div><br>
        <?php }?>
    </div>
    <br>
    <div class="container-fluid backg1">FOOTER</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
</body>

</html>
