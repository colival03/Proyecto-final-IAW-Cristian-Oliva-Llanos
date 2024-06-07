<?php
/**
 *  Controlador de Productos. Implementará todas las acciones que se puedan llevar a cabo desde las vistas
 * que afecten a productos de la tienda.
 */


include_once ("views/View.php");
include_once ("models/productos.php");
class ProductController
{

    /**
     * Método que obtiene todos los productos de la BBDD y los muestra a través de la vista showProducts.
     */
    public function getAllProducts()
    {
        include_once ("models/productos.php");
        $pDAO = new ProductoDAO();
        $products = $pDAO->getAllProducts();
        $pDAO = null;
        View::show("showProducts", $products);
    }

    public function getProductById()
    {
        include_once ("models/productos.php");
        $pDAO = new ProductoDAO();
        $id = $_REQUEST['id'];
        $product = $pDAO->getProductById($id);
        $pDAO = null;
        View::show("detalleProducts", $product);
    }

    public function insertProduct()
{
    $datospro = array();
    $errors = array();

    // Verificar si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = array();

        // Validar los campos del formulario
        if (empty($_POST['Nombre'])) {
            $errors[] = "El nombre del producto es requerido.";
        }
        if (empty($_POST['Precio'])) {
            $errors[] = "El precio es requerido.";
        }
        if (empty($_POST['Descripcion']) || strlen($_POST['Descripcion']) < 10) {
            $errors[] = "La descripción debe tener al menos 10 caracteres.";
        }
        if (empty($_POST['Stock'])) {
            $errors[] = "El stock es requerido.";
        }

        // Si hay errores, mostrarlos en la página
        if (!empty($errors)) {
            echo '<div class="error">';
            foreach ($errors as $error) {
                echo '<p>' . $error . '</p>';
            }
            echo '</div>';
        } else {
            // Procesar los datos del formulario
            $nombre = $_POST['Nombre'];
            $precio = $_POST['Precio'];
            $descripcion = $_POST['Descripcion'];
            $stock = $_POST['Stock'];

            // Creamos una instancia de la clase ProductoDAO
            $pDAO = new ProductoDAO();

            // Insertamos los datos en la base de datos
            $pDAO->insertProduct($nombre, $precio, $descripcion, $stock);

            // Redirigir a la página de todos los productos
            $this->getAllProducts();
        }
    } else {
        View::show("insertProducts", null);
    }
}

    public function addCarrito() {
        // Inicia la sesión si no está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Inicializa el carrito si no está presente en la sesión
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }
    
        // Verifica si se ha pasado un id de producto
        if (isset($_GET['id_producto'])) {
            $productoid = $_GET['id_producto'];
    
            // Asegúrate de manejar posibles errores en la creación del objeto ProductoDAO
            try {
                include_once("models/productos.php");
                $pDAO = new ProductoDAO();
                $producto = $pDAO->getProductById($productoid);
                $pDAO = null;
    
                if ($producto) {
                    $found = false;
                    foreach ($_SESSION['carrito'] as &$item) {
                        if ($item['id'] == $productoid) {
                            $item['cantidad'] += 1;  // Incrementa la cantidad si ya está en el carrito
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        // Si el producto no está en el carrito, se agrega con cantidad 1
                        $_SESSION['carrito'][] = [
                            'id'=> $producto['id'],
                            'nombre' => $producto['nombre'],
                            'precio' => $producto['precio'],
                            'cantidad' => 1
                        ];
                    }
                }
            } catch (Exception $e) {
                // Maneja posibles errores (por ejemplo, conexión a la base de datos)
                echo "Error: " . $e->getMessage();
                return;
            }
        }
    
        // Mostrar la vista carrito.php
        View::show("carrito", null);
    }

    public function borrarcarrito($item_id = null) {
    if(isset($_SESSION['carrito'])) {
        if($item_id !== null) {
            // Si se proporciona un $item_id, eliminamos solo ese elemento del carrito
            foreach ($_SESSION['carrito'] as $key => $item) {
                if($item['id'] === $item_id) {
                    unset($_SESSION['carrito'][$key]);
                    break; // Terminamos el bucle una vez que encontramos y eliminamos el elemento
                }
            }
        } else {
            // Si no se proporciona $item_id, eliminamos todos los elementos del carrito
            $_SESSION['carrito'] = array();
        }
    }
    View::show("carrito", null);
}
}
?>