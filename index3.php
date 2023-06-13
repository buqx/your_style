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
          <li><a href="#">Home</a></li>
          <li><a href="index2.php">Salir</a></li>
        </ul>
      </nav>
      <div class="image-square"><img src="1 1.png" alt="">
      <div class="image-square-1"><img src="2 1.png" alt=""></div>
    
      
</body>
<?php
$conexion = mysqli_connect("localhost", "root", "", "taller_java") or die("Problemas con la conexión");

// Verificar si se ha hecho clic en el botón "agregar1"
if(isset($_POST['enviar1'])) {
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
<?php/*
$conexion = mysqli_connect("localhost", "root", "", "taller_java") or die("Problemas con la conexión");
$query = "INSERT INTO detalles_pedidos (id_cli, id_pro) VALUES ( ?, ?)";
$id__cli = "SELECT id_cli FROM clientes WHERE email = '$email' ";
$id__pro = "SELECT id_pro FROM productos where id_pro = 1";
$stmt = mysqli_prepare($conexion, $query);
// Obtener los valores enviados desde el formulario
if (isset($_POST['enviar1'])){
  if (!empty($id__cli) && !empty($id__pro) ) {
     // Escapar los valores para evitar inyección SQL
     $id_cli = mysqli_real_escape_string($conexion, $id_cli);
     $id_pro = mysqli_real_escape_string($conexion, $id_pro);
     // Asociar los valores a los parámetros de la consulta preparada
     mysqli_stmt_bind_param($stmt, "ss", $id_cli, $id_pro);
     // Ejecutar la consulta
     mysqli_stmt_execute($stmt);
     header("Location: index4.php");
     exit();
   }
  }
?>*/
</html>