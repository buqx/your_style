<?php
   session_start();
   $nom = $_SESSION['nombre'];
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main_diseño.css">
    <title>Interfaz</title>
</head>
<body>
    <nav>
        <div class="logo">
          <a>Your Style</a>
        </div>
        <ul>
            <li><a href="#">Bienvenido <?php echo $nom; ?></a></li>
          <li><a href="#">Home</a></li>
          <li><a href="index2.php">Salir</a></li>
        </ul>
    </nav>
    <div class="imagen1"><img src="11.png" alt="" >
    <div class="container1">
    <span class="texto">CamisetaX <br>  69.999$</span>
    <button class="boton" type="submit" id="agregar1" name="agregar1">Agregar</button>
    </div>
    </div>
    <div class="imagen2"><img src="2 1.png" alt="">
    <div class="container">
    <span class="texto">Air Force 1 <br>  799.999$</span>
    <button class="boton" type="submit">Agregar</button>
    </div>
    </div>
    
      
</body>
<?php
$conexion = mysqli_connect("localhost", "root", "", "taller_java") or die("Problemas con la conexión");
// Verificar si se ha hecho clic en el botón "agregar1"
if(isset($_POST['agregar1'])) {
    // Obtener los valores de las foreign keys desde el formulario

    // Realizar la inserción en la tabla
    $sql = "INSERT INTO detalles_pedidos (id_cli, id_pro) VALUES ('$id_cli', '$id_pro')"; // Reemplaza "nombre_tabla" con el nombre de tu tabla
    $stmt = mysqli_prepare($conexion, $sql);
    if ($conexion->query($sql) === TRUE) {
        echo "Inserción exitosa";
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

</html>