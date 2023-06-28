<?php
$rutaCarpeta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$rutaProyecto = explode("/", $rutaCarpeta);

require_once $_SERVER['DOCUMENT_ROOT']. "/" . $rutaProyecto[1] .'/mvc/core/connection.php';

class Productos extends connection
{
    private $id_pro;
    private $nom_pro;
    private $precio_pro;
    private $descripcion_pro;

    public function __construct($id = null, $nom = null, $pre = null, $descripcion = null,)
    {
        $this->id_pro = $id;
        $this->nom_pro = $nom;
        $this->precio_pro = $pre;
        $this->descripcion_pro = $descripcion;
        parent::__construct();
    }

    public function getAll()
    {
        try {
            // FETCH_OBJ
            $sql = $this->dbConnection->prepare("SELECT * FROM productos");
            // Ejecutamos
            $sql->execute();
            $resultSet = null;
            // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $resultSet[] = $row;
            }
            return $resultSet;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }
    public function insertar_productos()
    {
        try {
            $sql = $this->dbConnection->prepare("INSERT INTO productos ( id_pro,nom_pro, precio_pro, descripcion_pro)values(?,?,?,?)"); 
            $sql->bindParam(1, $this->id_pro);
            $sql->bindParam(2, $this->nom_pro);
            $sql->bindParam(3, $this->precio_pro);
            $sql->bindParam(4, $this->descripcion_pro);
            // Ejecutamos
            $sql->execute();
            return $sql;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong>ERROR EN SISTEMA CONSULTE A SU TI MAS CERCANO</strong>
    </div>';
            die();

        }

    }

    public function editar_producto($id_pro)
    {
        try
        {
            $dbproducto = $this->dbConnection->prepare("UPDATE productos SET nom_pro=:nom_pro,precio_pro=:precio_pro,descripcion_pro=:descripcion_pro WHERE id_pro=:id_pro");
            $dbproducto->bindParam(":id_pro", $id_pro);
            $dbproducto->bindParam(":nom_pro", $this ->nom_pro);
            $dbproducto->bindParam(":precio_pro", $this->precio_pro);
            $dbproducto->bindParam(":descripcion_pro", $this->descripcion_pro);
            $dbproducto->execute();
            return $dbproducto;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong>ERROR EN SISTEMA CONSULTE A SU TI MAS CERCANO</strong>
    </div>';

            die();
        }

    }

    public function eliminar_producto()
    {
        try
        {
            $dbpaciente = $this->dbConnection->prepare("DELETE FROM productos where id_pro=:id_pro");
            $dbpaciente->bindParam(":id_pro", $this->id_pro);
            $dbpaciente->execute();
            return $dbpaciente;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong>ERROR EN SISTEMA CONSULTE A SU TI MAS CERCANO</strong>
    </div>';

            die();
        }

    }

    public function getItem()
    {
        try {

            $sql = $this->dbConnection->prepare("SELECT * FROM productos WHERE id_pro = ?");
            $sql->bindParam(1, $this->id_pro);
            $sql->execute();
            $resultSet = null;
            while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $resultSet = $row;
            }
            return $resultSet;
        } catch (PDOException $ex) {
            echo '<div class="alert alert-danger container text-center" role="alert">
        <strong>ERROR EN SISTEMA CONSULTE A SU TI MAS CERCANO</strong>
    </div>';

            die();
        }
    }
    /**
     * Get the value of documento
     */
    public function getId_pro()
    {
        return $this->id_pro;
    }

    /**
     * Set the value of documento
     *
     * @return  self
     */
    public function setId_pro($id_pro)
    {
        $this->id_pro = $id_pro;
        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNom_pro()
    {
        return $this->nom_pro;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNom_pro($nom_pro)
    {
        $this->nom_pro = $nom_pro;
        return $this;
    }

    /**
     * Get the value of direccion
     */
    public function getPrecio_pro()
    {
        return $this->precio_pro;
    }
 /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setPrecio_pro($precio_pro)
    {
        $this->precio_pro = $precio_pro;
        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getDescripcion_pro()
    {
        return $this->descripcion_pro;
    }
     /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setDescripcion_pro($descripcion_pro)
    {
        $this->$descripcion_pro = $descripcion_pro;
        return $this;
    }

}

   