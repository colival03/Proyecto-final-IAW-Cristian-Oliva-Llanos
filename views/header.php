<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cristian Coches - Tienda Online</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Estilos personalizados -->
    <style>
        .header {
            background: linear-gradient(to right, #000000, #0d47a1);
            /* Fondo degradado de negro a azul oscuro */
            background-size: 100% auto;
            /* Ajusta el tamaño del degradado */
            animation: gradient 5s linear infinite;
            /* Animación de movimiento del degradado */
            width: 100%;
            /* Ajusta el ancho del encabezado al 100% */
            color: #ffffff;
            /* Color del texto */
            margin: 0;
            /* Elimina los márgenes */
            padding: 0;
            /* Elimina el relleno */
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .navbar {
            background-color: #343a40;
            /* Color de fondo de la barra de navegación */
        }

        .nav-link,
        .nav-item.btn a,
        .fs-4 {
            color: #ffffff;
            /* Color del texto de los enlaces, botones y título */
        }

        .nav-link.active,
        .nav-link:hover {
            background-color: #1565c0;
            /* Color de fondo de los enlaces activos y al pasar el ratón */
        }

        .nav-item.btn {
            background-color: #1565c0;
            /* Color de fondo de los botones */
            border: none;
            /* Quita el borde */
            margin-right: 10px;
            /* Márgen derecho entre botones */
        }
    </style>
</head>

<body>
    <!-- Cabecera de la Página: Contiene el menú de navegación principal de la aplicación. -->
    <div class="container-fluid">
        <header class="header d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <!-- Logo y Nombre de la Tienda -->
            <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none"
                style="color: #ffffff;">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Cristian Coches</span>
            </a>

            <!-- Menú de Navegación -->
            <ul class="nav nav-pills">
                <?php if (!empty($_SESSION['nombre']) && $_SESSION['rol'] == 'normal'): ?>
                    <!-- Enlace para Listar Productos -->
                    <li class="nav-item btn">
                        <a href="index.php?controller=ProductController&action=getAllProducts" class="nav-link">Listar
                            Productos</a>
                    </li>
                    <!-- Enlace para Ver el Carrito -->
                    <li class="nav-item btn">
                        <a href="index.php?controller=ProductController&action=addCarrito" class="nav-link">Ver Carrito</a>
                    </li>
                    <!-- Enlace para Cerrar Sesión-->
                    <li class="nav-item btn">
                        <a href="index.php?controller=UserController&action=cerrarsesion" class="nav-link">Cerrar Sesión</a>
                    </li>
                <?php elseif (!empty($_SESSION['nombre']) && $_SESSION['rol'] == 'administrador'): ?>
                    <!-- Enlace para Añadir Usuarios -->
                    <li class="nav-item btn">
                        <a href="index.php?controller=UserController&action=insertUser" class="nav-link">Añadir Usuarios</a>
                    </li>
                    <!-- Enlace para Añadir Producto -->
                    <li class="nav-item btn">
                        <a href="index.php?controller=ProductController&action=insertProduct" class="nav-link">Añadir
                            Producto</a>
                    </li>
                    <!-- Enlace para Listar Productos -->
                    <li class="nav-item btn">
                        <a href="index.php?controller=ProductController&action=getAllProducts" class="nav-link">Listar
                            Productos</a>
                    </li>
                    <!-- Enlace para Cerrar Sesión-->
                    <li class="nav-item btn">
                        <a href="index.php?controller=UserController&action=cerrarsesion" class="nav-link">Cerrar Sesión</a>
                    </li>
                <?php else: ?>
                    <!-- Enlace para Iniciar Sesión -->
                    <li class="nav-item btn">
                        <a href="index.php?controller=UserController&action=showiniciosesion" class="nav-link">Iniciar
                            Sesión</a>
                    </li>
                    <!-- Enlace para Listar Productos -->
                    <li class="nav-item btn">
                        <a href="index.php?controller=ProductController&action=getAllProducts" class="nav-link">Listar
                            Productos</a>
                    </li>
                    <!-- Enlace para Ver el Carrito -->
                    <li class="nav-item btn">
                        <a href="index.php?controller=ProductController&action=addCarrito" class="nav-link">Ver Carrito</a>
                    </li>
                <?php endif; ?>
            </ul>
        </header>
    </div>
</body>
</html>