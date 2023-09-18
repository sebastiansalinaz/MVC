<?php
include ('../Controlador/Conexion.php');

class mascotas
{

    private $id;
    private $nombre;
    private $raza;

    public function __construct($nombre, $raza, $id = null)
    {
        $this->nombre = $nombre;
        $this->raza = $raza;
        $this->id = $id;
    }


    public function listar()
    {
        $pdo = new Conexion();
        
        $sql = $pdo->prepare("SELECT * FROM masc");
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        return $sql->fetchAll();
    } 


    public function guardar()
    {
        $pdo = new Conexion();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sql = "INSERT INTO masc (id, nombre, raza) VALUES(:id, :nombre, :raza )";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $_POST['id']);
            $stmt->bindValue(':nombre', $_POST['nombre']);
            $stmt->bindValue(':raza', $_POST['raza']);
            $stmt->execute();
            $idPost = $pdo->lastInsertId();
            if ($idPost) {
                echo json_encode($idPost);
            }
        } 
    }

    public function actualizar()
    {
        $pdo = new Conexion();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sql = "UPDATE masc SET nombre=:nombre, raza=:raza WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nombre', $_POST['nombre']);
            $stmt->bindValue(':raza', $_POST['raza']);
            $stmt->bindValue(':id', $_POST['id']);
            $stmt->execute();
        }
    }

    public function eliminar()
    {
        $pdo = new Conexion();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sql = "DELETE FROM masc WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $_POST['id']);
            $stmt->execute();
        }
    }
}
