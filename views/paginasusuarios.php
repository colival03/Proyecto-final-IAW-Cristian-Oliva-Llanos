<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Bienvenida</title>
    <style>
        body {
            background: linear-gradient(to right, #000000, #00008B);
            color: white;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #87CEEB; /* Azul cielo */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        img {
            width: 100%;
            max-width: 1000px;
        }
    </style>
</head>
<body>
    <?php
    if (!isset($_SESSION['nombre'])) {
        $_SESSION['nombre'] = array();
    }
    if (!isset($_SESSION['rol'])) {
        $_SESSION['rol'] = array();
    }
    if (!empty($_SESSION['nombre']) && $_SESSION['rol'] == 'normal') {
        $pDAO = new ProductoDAO();
        $products = $pDAO->getAllProducts();
        $pDAO = null;
        View::show("showProducts", $products);
    } elseif (!empty($_SESSION['nombre']) && $_SESSION['rol'] == 'administrador') {
        echo '<div class="container">';
        echo '<h1>Bienvenido Administrador</h1>';
        echo '<div>';
        echo '<img src="img/portada.jpg" alt="">';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="container">';
        echo 'Usuario no registrado en la base de datos';
        echo '</div>';
    }
    ?>
</body>
</html>