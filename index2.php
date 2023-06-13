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
                     <input style="width: 99%; height: 99%;"type="email" id="email_is" name="email_is" placeholder="Email">
                  </li>
                  <li>
                    <label for="pass_cli1"></label>
                    <input style="width: 99%; height: 99%;"type="password" id="pass_cli1" name="pass_cli1" placeholder="Contraseña">
                  </li>
                 
                 <li class="button">
                    <input name="enviar" style="width: 102%; height: 99%;" type="submit">REGISTRARSE</input>
                  </li>
                </ul>
            </form>
        </div>

    </div>
    
</body>
<?php
$conexion = mysqli_connect("localhost", "root", "", "taller_java") or die("Problemas con la conexión");

// Obtener los valores enviados desde el formulario
$email = $_POST['email_is'];
$password = $_POST['pass_cli1'];

// Escapar los valores para evitar inyección SQL
$email = $conexion->real_escape_string($email);
$password = $conexion->real_escape_string($password);

// Crear la consulta SQL
$sql = "SELECT * FROM clientes WHERE email = '$email' AND pass_cli = '$password'";
global $id__cli = "SELECT id_cli FROM clientes WHERE email = '$email' ";
global $id__pro = "SELECT id_pro FROM productos where id_pro = 1"

// Ejecutar la consulta
$result = $conexion->query($sql);

// Verificar si se encontraron registros
if ($result->num_rows > 0) {
    // Los datos coinciden, hacer algo aquí 
    header("Location: index3.php");
    exit();
} else {
    // Los datos no coinciden, hacer algo aquí
    echo "Los datos no coinciden";
}
// Cerrar la conexión
$conexion->close();
?>
</html>