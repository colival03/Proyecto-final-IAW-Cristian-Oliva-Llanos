<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Usuario</title>
    <style>
        body {
            background: linear-gradient(to right, #000000, #00008B);
            color: white;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .error {
            color: red;
        }
        .form-container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #87CEEB; /* Azul cielo */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #00008B;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0000CD;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Formulario para agregar un usuario</h2>
        <form action="index.php?controller=UserController&action=insertUser" method="post">
            <label for="nombre">Nombre de Usuario:</label><br>
            <input type="text" id="nombre" name="nombre">
            <?php
            if(isset($data) && isset($data['nombre'])){
                echo "<div class='error'>".$data['nombre']."</div>";
            }
            ?><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <?php
            if(isset($data) && isset($data['email'])){
                echo "<div class='error'>".$data['email']."</div>";
            }
            ?><br>

            <label for="contrasena">Contraseña:</label><br>
            <input type="password" id="contrasena" name="contrasena"><br>
            <?php
            if(isset($data) && isset($data['contrasena'])){
                echo "<div class='error'>".$data['contrasena']."</div>";
            }
            ?><br>

            <label for="rol">Rol:</label><br>
            <select id="rol" name="rol">
                <option value="normal">Normal</option>
                <option value="administrador">Administrador</option>
            </select><br><br>

            <input type="submit" value="Insertar">
        </form>
    </div>
</body>
</html>