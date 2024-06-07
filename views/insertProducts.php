<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para ingresar un producto</title>
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
            margin-top: 5px;
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
        input[type="number"],
        textarea {
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
        <h2>Formulario para ingresar un producto</h2>
        <form action="index.php?controller=ProductController&action=insertProduct" method="post">
            <label for="Nombre">Nombre del Producto:</label><br>
            <input type="text" id="Nombre" name="Nombre"><br>
            <?php
            if(isset($data) && isset($data['nombre'])){
                echo "<div class='error'>".$data['nombre']."</div>";
            }
            ?><br>

            <label for="Precio">Precio:</label><br>
            <input type="number" id="Precio" name="Precio" step="0.01" min="0"><br>
            <?php
            if(isset($data) && isset($data['precio'])){
                echo "<div class='error'>".$data['precio']."</div>";
            }
            ?><br>

            <label for="Descripcion">Descripción:</label><br>
            <textarea id="Descripcion" name="Descripcion" rows="4" cols="50"></textarea><br>
            <?php
            if(isset($data) && isset($data['descripcion'])){
                echo "<div class='error'>".$data['descripcion']."</div>";
            }
            ?><br>

            <label for="Stock">Stock:</label><br>
            <input type="number" id="Stock" name="Stock" step="1" min="0"><br>
            <?php
            if(isset($data) && isset($data['stock'])){
                echo "<div class='error'>".$data['stock']."</div>";
            }
            ?><br>

            <input type="submit" value="Insertar">
        </form>
    </div>
</body>
</html>