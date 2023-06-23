<!DOCTYPE html>
<html>
<head>
  <title>Error de Inicio de Sesión</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    
    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    h2 {
      text-align: center;
      color: #ff0000;
      margin-top: 0;
    }
    
    p {
      text-align: center;
      color: #555555;
    }
    
    button {
      display: block;
      margin: 20px auto;
      padding: 10px 20px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Error de Inicio de Sesión</h2>
    <p>
      Ha ocurrido un error al iniciar sesión. Por favor, verifica los datos ingresados e intenta nuevamente.
    </p>
    <button onclick="window.history.back()">Volver</button>
  </div>
</body>
</html>
