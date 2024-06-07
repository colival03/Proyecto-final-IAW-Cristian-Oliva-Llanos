<?php
include_once ("database/db.php");

/**
 * Clase de acceso a datos para la tabla productos. Implementa todos los métodos que necesiten atacar
 * la tabla productos de la base de datos.
 */
class ProductoDAO {

    // Atributo con la conexión a la BBDD.
    public $db_con;

    // Constructor que inicializa la conexión a la BBDD.
    public function __construct (){
        $this->db_con = Database::connect();
    }

    // Método que devuelve un array con todos los productos existentes en la base de datos.
    public function getAllProducts(){
        $stmt = $this->db_con->prepare("SELECT * FROM productos");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getProductById($id) {
        $stmt= $this->db_con->prepare("SELECT * FROM Productos WHERE id_producto = :id");
        $stmt->bindParam(':id', $id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();
    }       
    
    public function insertProduct( $Nombre, $Precio, $Descripcion, $Stock){
        $stmt= $this->db_con->prepare ("Insert into Productos (Nombre, Precio, Descripcion, Stock) values (:Nombre, :Precio, :Descripcion, :Stock)");      
        
        $stmt->bindParam(':Nombre', $Nombre);
        $stmt->bindParam(':Precio', $Precio);
        $stmt->bindParam(':Descripcion', $Descripcion);
        $stmt->bindParam(':Stock', $Stock);

        try{
            return $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    
}
?>
