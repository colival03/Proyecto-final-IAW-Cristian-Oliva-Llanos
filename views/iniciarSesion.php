<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #333333, #81d4fa); /* Fondo de degradado */
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
            max-width: 400px; /* Ancho máximo del contenedor */
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ced4da; /* Borde gris */
            border-radius: 5px; /* Bordes redondeados */
        }

        input[type="submit"] {
            background-color: #0277bd; /* Color de fondo más oscuro para el botón */
            color: #ffffff; /* Texto blanco */
            border-color: #0277bd; /* Borde del botón */
            cursor: pointer; /* Cambiar el cursor al pasar sobre el botón */
        }

        input[type="submit"]:hover {
            background-color: #01579b; /* Color de fondo más oscuro al pasar el ratón */
            border-color: #01579b; /* Borde del botón al pasar el ratón */
        }

        .alert {
            margin-top: 10px; /* Margen superior */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="index.php?controller=UserController&action=validacioniniciosesion" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre de Usuario:</label>
                <input type="text" id="nombre" name="nombre">
                <?php
                if(isset($data) && isset($data['nombre'])){
                    echo "<div class='alert alert-danger'>".$data['nombre']."</div>";
                }
                ?>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena">
                <?php
                if(isset($data) && isset($data['contrasena'])){
                    echo "<div class='alert alert-danger'>".$data['contrasena']."</div>";
                }
                ?>
            </div>
            <div class="form-group">
                <input type="submit" value="Iniciar Sesión" name="iniciarsesion">
            </div>
        </form>
    </div>
</body>
</html>