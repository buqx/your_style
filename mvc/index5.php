<?php
   session_start();
   $id = $_SESSION['clienteid'];
$conexion = mysqli_connect("localhost", "root", "", "taller_java") or die("Problemas con la conexión");

if (!isset($_SESSION['clienteid'])) {
  header('location: index.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['eliminar'])) {
    // Eliminar la cuenta del usuario
    $id = $_SESSION['clienteid'];
    $sql = "DELETE FROM clientes WHERE id_cli = '$id'";
    $resultado = $conexion->query($sql);

    if ($resultado) {
      // Redirigir a la página de inicio o mostrar un mensaje de éxito
      header('location: index2.php');
      exit;
    } else {
      // Mostrar un mensaje de error en caso de fallo en la eliminación
      $error_message = "Error al eliminar la cuenta. Inténtalo de nuevo.";
    }
  } else {
    // Obtener los valores actualizados de los campos
    $nombre = $_POST['nom_cli'];
    $apellido = $_POST['ape_cli'];
    $contrasena = $_POST['pass_cli'];
    $email = $_POST['email'];

    // Actualizar los datos en la base de datos
    $id = $_SESSION['clienteid'];
    $sql = "UPDATE clientes SET nom_cli='$nombre', ape_cli='$apellido', pass_cli='$contrasena', email='$email' WHERE id_cli = '$id'";
    $resultado = $conexion->query($sql);

    if ($resultado) {
      // Redirigir a la página de perfil o mostrar un mensaje de éxito
      header('location: index5.php?id=' . $id);
      exit;
    } else {
      // Mostrar un mensaje de error en caso de fallo en la actualización
      $error_message = "Error al actualizar los datos. Inténtalo de nuevo.";
    }
  }
}

$id = $_SESSION['clienteid'];
$sql = "SELECT id_cli, nom_cli, ape_cli, pass_cli, email FROM clientes WHERE id_cli = '$id'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en"
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
                   <input  type="text" id="nom_cli" name="nom_cli" placeholder="Nombres" value="<?php echo $row['nom_cli']; ?>" required>
                 </li>
                 <li>
                    <label for="ape_cli"></label>
                    <input type="text" id="ape_cli;" name="ape_cli" placeholder="Apellidos" value="<?php echo $row['ape_cli']; ?>"  required>
                  </li>
                 <li>
                   <label for="email"></label>
                   <input type="email" id="email" name="email" placeholder="Email" required value="<?php echo $row['email']; ?>"> 
                 </li>
                 <li>
                  <label for="pass_cli"></label>
                  <input type="password" id="pass_cli" name="pass_cli" placeholder="Contraseña" required value="<?php echo $row['pass_cli']; ?>">
                </li>
                 <li class="button">
                    <input name="modificar";style="width: 102%; height: 99%;" type="submit" value="modificar"></input>
                    <input name="eliminar";style="width: 102%; height: 99%;" type="submit" value="Eliminar" style="margin-top: 15px;"></input>
                  </li>
                </ul>
            </form>
        </div>

    </div>
    
</body>

