<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="diseño.css">
    <title>Interfaz</title>
</head>
<body>
    <div class="fondo">
        <div class="imagen_nav">
            <img src="Screenshot 2023-05-30 103050.png" alt="">
        </div>
        <hr style="color: aliceblue; width: 80%;margin-top: 100px;margin-bottom: 100px;" >
        <div class="inicio_sesion">
            <form method="post">
                <ul style="margin-left: 0px;">
                 <li>
                   <label for="nom_cli"></label>
                   <input  type="text" id="nom_cli" name="nom_cli" placeholder="Nombres" required>
                 </li>
                 <li>
                    <label for="ape_cli"></label>
                    <input type="text" id="ape_cli;" name="ape_cli" placeholder="Apellidos" required></input>
                  </li>
                 <li>
                   <label for="email"></label>
                   <input type="email" id="email" name="email" placeholder="Email" required>
                 </li>
                 <li>
                  <label for="pass_cli"></label>
                  <input type="password" id="pass_cli" name="pass_cli" placeholder="Contraseña" required>
                </li>
                 <li class="button">
                    <input name="enviar";style="width: 102%; height: 99%;" type="submit"></input>
                  </li>
                  <link rel="stylesheet" href="index2.html">
                </ul>
            </form>
        </div>

    </div>
    
</body>
<?php
  $conexion = mysqli_connect("localhost", "root", "", "taller_java") or die("Problemas con la conexión");
  // Utilizar sentencias preparadas para evitar inyección de SQL
  $query = "INSERT INTO clientes (nom_cli, ape_cli, email, pass_cli) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_prepare($conexion, $query);
  
  // Obtener los valores enviados desde el formulario
  
  // Verificar si los campos no están vacíos antes de ejecutar la consulta INSERT
  if (isset($_POST['nom_cli'])&& isset($_POST['ape_cli']) && isset($_POST['email'])){
    $nom_cli = $_POST['nom_cli'];
    $ape_cli = $_POST['ape_cli'];
    $email = $_POST['email'];
    $pass_cli = $_POST['pass_cli'];
   if (!empty($nom_cli) && !empty($ape_cli) && !empty($email) && !empty($pass_cli)) {
      // Escapar los valores para evitar inyección SQL
      $nom_cli = mysqli_real_escape_string($conexion, $nom_cli);
      $ape_cli = mysqli_real_escape_string($conexion, $ape_cli);
      $email = mysqli_real_escape_string($conexion, $email);
      $pass_cli = mysqli_real_escape_string($conexion, $pass_cli);
  
      // Asociar los valores a los parámetros de la consulta preparada
      mysqli_stmt_bind_param($stmt, "ssss", $nom_cli, $ape_cli, $email, $pass_cli);
  
      // Ejecutar la consulta
      mysqli_stmt_execute($stmt);
      header("Location: index2.php");
      exit();
    }
    
    }
    
    ?>
</html>