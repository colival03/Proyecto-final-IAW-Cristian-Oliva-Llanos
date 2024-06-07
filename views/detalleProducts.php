<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #000000, #00008B); /* Fondo de degradado lateral de negro a azul oscuro */
            color: #333333; /* Texto oscuro */
            padding-top: 20px; /* Añadir espacio en la parte superior */
        }

        .container {
            background-color: #ffffff; /* Fondo blanco */
            border: 1px solid #b3e5fc; /* Marco con color de borde azul cielo */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra */
            padding: 20px; /* Espaciado interno */
            margin: 20px; /* Margen por todos los lados */
        }

        .btn-volver {
            background-color: #0277bd; /* Color de fondo más oscuro para el botón */
            color: #ffffff; /* Texto blanco */
            border-color: #0277bd; /* Borde del botón */
        }

        .btn-volver:hover {
            background-color: #01579b; /* Color de fondo más oscuro al pasar el ratón */
            border-color: #01579b; /* Borde del botón al pasar el ratón */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Mostrar la imagen del producto -->
                <?php 
                $imagen_ruta = 'img/coche' . $data['id_producto'] . '.jpg'; // Construir la ruta de la imagen
                if (file_exists($imagen_ruta)) {
                    echo '<img src="' . htmlspecialchars($imagen_ruta) . '" alt="' . $data['nombre'] . '" class="img-fluid">';
                } else {
                    echo '<p>Imagen no disponible</p>';
                }
                ?>
            </div>
            <div class="col-md-6">
                <!-- Mostrar la descripción y el precio del producto -->
                <h2><?php echo $data['nombre']; ?></h2>
                <p><?php echo $data['descripcion']; ?></p>
                <p>Precio: <?php echo $data['precio']; ?>€</p>
                <a href="index.php?controller=ProductController&action=getAllProducts" class="btn btn-volver">Volver Atrás</a>
            </div>
        </div>
    </div>
</body>
</html>
