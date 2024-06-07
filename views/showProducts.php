<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos - Tienda de Coches</title>
    <!-- Bootstrap CSS para estilos adicionales -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #333333, #0d47a1); /* Fondo degradado similar al header y footer */
            color: #333333; /* Texto oscuro */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #e1f5fe; /* Fondo de la tabla */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header,
        .footer {
            background: linear-gradient(to right, #333333, #0d47a1); /* Fondo degradado similar al header y footer */
            color: #ffffff; /* Texto blanco */
            padding: 10px 0; /* Espaciado interno */
            text-align: center;
            margin-bottom: 20px; /* Margen inferior para el encabezado */
        }

        h1 {
            color: #ffffff; /* Texto blanco */
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #e1f5fe; /* Fondo de la tabla */
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dddddd; /* Líneas de tabla más claras */
        }

        th {
            background-color: #b3e5fc; /* Encabezado de tabla azul cielo */
            color: #333333; /* Texto oscuro */
        }

        tr:hover {
            background-color: #c5cae9; /* Fondo ligeramente gris al pasar el ratón */
        }

        td img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .btn-info {
            background-color: #1e88e5; /* Color azul más oscuro */
            border-color: #1e88e5; /* Borde del mismo color */
        }

        .btn-info:hover {
            background-color: #0d47a1; /* Color azul oscuro al pasar el ratón */
            border-color: #0d47a1; /* Borde del mismo color */
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Listado de coches disponibles</h1>
    </div>

    <div class="container">
        <table class="table"> <!-- Agregado class="table" para aplicar estilos de Bootstrap -->
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Detalles</th>
            </tr>
            <?php
            foreach ($data as $coche) {
                // Construir la ruta de la imagen
                $imagen_nombre = 'coche' . $coche['id_producto'] . '.jpg'; // Cambiar 'jpg' según la extensión real de tus imágenes
                $imagen_ruta = 'img/' . $imagen_nombre;

                // Verificar si el archivo de imagen existe
                if (file_exists($imagen_ruta)) {
                    echo "<tr>
                <td>" . $coche['nombre'] . "</td>
                <td>" . $coche['descripcion'] . "</td>
                <td><img src='" . htmlspecialchars($imagen_ruta) . "' alt='" . $coche['nombre'] . "' class='img-fluid'></td> 
                <td>" . $coche['precio'] . "</td>
                <td>" . $coche['stock'] . "</td>
                <td><a href='index.php?controller=ProductController&action=getProductById&id=" . $coche['id_producto'] . "' class='btn btn-info'>Información</a></td>
                <td><a href='index.php?controller=ProductController&action=addCarrito&id_producto=". $coche['id_producto'] . "' class='btn btn-info'>Añadir al Carrito</a></td>
              </tr>";
                } else {
                    // Si la imagen no está disponible, mostrar un mensaje alternativo
                    echo "<tr>
                <td>" . $coche['nombre'] . "</td>
                <td>" . $coche['descripcion'] . "</td>
                <td>Imagen no disponible</td> 
                <td>" . $coche['precio'] . "</td>
                <td>" . $coche['stock'] . "</td>
                <td><a href='index.php?controller=ProductController&action=getProductById&id=" . $coche['id_producto'] . "'' class='btn btn-info'>Información</a></td>
                <td><a href='index.php?controller=ProductController&action=addCarrito&id_producto=". $coche['id_producto'] . "'' class='btn btn-info'>Añadir al Carrito</a></td>
              </tr>";
                }
            }
            ?>
        </table>
    </div>
    <!-- Bootstrap JavaScript para funcionalidades adicionales -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-Zy/zTpHwO9CbmYCmavfrxfKV0l+PdY0e5TDiQwUZHNsIaH/cuU/7kuhi4YKtpQz4" crossorigin="anonymous"></script>
</body>
</html>