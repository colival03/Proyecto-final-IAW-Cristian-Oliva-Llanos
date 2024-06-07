<?php
// Inicializa el carrito si no está ya inicializado
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Función para calcular el total del carrito
function calcularTotal($carrito)
{
    $total = 0;
    foreach ($carrito as $item) {
        $total += $item['precio'] * $item['cantidad'];
    }
    return $total;
}

// Verificar si se ha solicitado la eliminación de un artículo
if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($_SESSION['carrito'] as $key => $item) {
        if ($item['id'] == $id) {
            unset($_SESSION['carrito'][$key]);
            $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar el array
            break;
        }
    }
}

// Obtener el carrito de la sesión
$carrito = $_SESSION['carrito'];
$total = calcularTotal($carrito);
?>

<!DOCTYPE html>
<html lang="es">
<style>
     <style>
        body {
            background: linear-gradient(to right, #000000, #000066); /* Degradado lateral de negro a azul oscuro */
            color: #333333; /* Texto oscuro */
            padding-top: 20px; /* Añadir espacio en la parte superior */
            margin-bottom: 20px; /* Añadir margen en la parte inferior */
        }

        .container {
            background-color: #ffffff; /* Fondo blanco */
            border: 1px solid #b3e5fc; /* Marco con color de borde azul cielo */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra */
            padding: 20px; /* Espaciado interno */
            margin: 20px auto; /* Margen vertical automático y margen horizontal 20px */
            max-width: 800px; /* Ancho máximo del contenedor */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #f2f2f2; /* Fondo de tabla */
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a.btn {
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        a.btn-primary {
            background-color: #0277bd;
            border-color: #0277bd;
        }

        a.btn-primary:hover {
            background-color: #01579b;
            border-color: #01579b;
        }

        a.btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        a.btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }

        a.btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        a.btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }
    </style>
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Reemplaza con la ruta a tus estilos CSS -->
</head>

<body>
    <div class="container">
        <h1>Carrito de Compras</h1>
        <?php if (!empty($carrito)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($carrito as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                            <td><?php echo number_format($item['precio'], 2); ?> €</td>
                            <td><?php echo $item['cantidad']; ?></td>
                            <td><?php echo number_format($item['precio'] * $item['cantidad'], 2); ?> €</td>
                            <td>
                                <a href="index.php?controller=ProductController&action=borrarcarrito" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3>Total: <?php echo number_format($total, 2); ?> €</h3>
            <a href="index.php?controller=ProductController&action=getAllProducts" class="btn btn-primary">Seguir
                Comprando</a>
            <a href="index.php?controller=ProductController&action=borrarcarrito" class="btn btn-success">Proceder al Pago</a>
        <?php else: ?>
            <p>Tu carrito está vacío.</p>
            <a href="index.php?controller=ProductController&action=getAllProducts" class="btn btn-primary">Ir a Comprar </a>
        <?php endif; ?>
    </div>
</body>
</html>