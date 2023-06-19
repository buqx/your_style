<?php 
$conexion = mysqli_connect("localhost", "root", "", "taller_java") or die("Problemas con la conexión");
if(isset($_POST["enviar"])){
  session_start();
  $email = $_POST['email_is'];
  $password = $_POST['pass_cli1'];
  $sql = "SELECT * FROM clientes WHERE email = '$email' AND pass_cli = '$password'";
  $query = mysqli_query($conexion, $sql);
  $cliente = mysqli_fetch_assoc($query);
  $_SESSION['nombre'] = $cliente['nom_cli'];
  header("Location: index3.php");
}
?>
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
                <ul>
                  <li>
                     <label for="email_is"></label>
                     <input type="email" id="email_is" name="email_is" placeholder="Email" required>
                  </li>
                  <li>
                    <label for="pass_cli1"></label>
                    <input type="password" id="pass_cli1" name="pass_cli1" placeholder="Contraseña" required>
                  </li>
                 
                 <li class="button">
                    <input name="enviar"type="submit"></input>
                  </li>
                </ul>
            </form>
        </div>

    </div>
    
</body>
<?php
$conexion = mysqli_connect("localhost", "root", "", "taller_java") or die("Problemas con la conexión");

// Obtener los valores enviados desde el formulario
if (isset($_POST['email_is']) && isset($_POST['pass_cli1'])) {
    $email = $_POST['email_is'];
    $password = $_POST['pass_cli1'];
    $sql = "SELECT * FROM clientes WHERE email = '$email' AND pass_cli = '$password'";
    $query = mysqli_query($conexion, $sql);

        if ($query === false) {
            echo "Error: " . mysqli_error($conexion);
            exit;
        }

        if (mysqli_num_rows($query) > 0) {
            header('Location: index3.php');
            exit;
        } else {
          header('Location: index4.php');
          exit;
        }
    }

?>
</html>