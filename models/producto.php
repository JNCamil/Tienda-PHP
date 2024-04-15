<?php

/*

Entidad: una entidad es una clase que representa a un registro de la tabla de la base de datos
Modelo Entidad: Defino los campos que hay, y manipulo objetos con esa entidad
Modelo de repositorio/consulta: En el cual tengo una librería de métodos que hacen cosas con una entidad concreta, guardar usuario, listar usuario,...

*/

class Producto
{
    //Le definimos tantas propiedades como tengamos en la bbdd
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;

    public function __construct()
    {
        //Conexión bbdd
        $this->db = Database::connect();
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    /*
    SI NO USASE PDO, TENDRÍA QUE PONER EN SETTTERS UN PARA VALIDACIÓN 
    $this->id=$this->db->real_escape_string($id)
    */
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of categoria_id
     */
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of oferta
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set the value of oferta
     *
     * @return  self
     */
    public function setOferta($oferta)
    {
        $this->oferta = $oferta;

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }


    //******************************* MÉTODOS */
    public function getAll()
    {
        $productos = $this->db->prepare("SELECT * FROM Productos ORDER BY id DESC");
        $productos->execute();
        $result = $productos->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllCategory()

    {
        $sql="SELECT p.*, c.nombre AS catnombre FROM Productos P"
        ." INNER JOIN Categorias C ON C.id=P.categoria_id"
        ." WHERE P.categoria_id={$this->getCategoria_id()}"
        ." ORDER BY id DESC";
        //var_dump($sql);die();
        $productos = $this->db->prepare($sql);
        $productos->execute();
        $result = $productos->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($result);die();
        return $result;
    }


    public function getRandom($limit){
    $productos = $this->db->prepare("SELECT * FROM Productos ORDER BY RAND() LIMIT $limit ");
    $productos->execute();
    $result = $productos->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($result);die();
    return $result;


    }
    public function getOne()
    {
        $productos = $this->db->prepare("SELECT * FROM Productos WHERE id=?");
        $productos->execute(array($this->getId()));
        $result = $productos->fetch(PDO::FETCH_ASSOC);
        //var_dump($result);die();
        return $result;
    }

    public function save()
    {
        $date = date("Y-m-d");
        $query = $this->db->prepare("INSERT INTO Productos VALUES (?,?,?,?,?,?,?,?,?)");
        $result = $query->execute(array(NULL, $this->getCategoria_id(), $this->getNombre(), $this->getDescripcion(), $this->getPrecio(), $this->getStock(), NULL, $date, $this->getImagen()));
        $correct = false;
        if ($result) {
            $correct = true;
        }
        return $correct;
    }

    public function edit()
    {
        $sql = "UPDATE Productos SET categoria_id=?, nombre=?, descripcion=?, precio=?, stock=?";
        if ($this->getImagen() != null) {
            $sql .= ", imagen=?";
        }
        $sql .= " WHERE id={$this->getId()}";

        // var_dump($this);die();


        $query = $this->db->prepare($sql);
        if ($this->getImagen() != null) {
            $result = $query->execute(array($this->getCategoria_id(), $this->getNombre(), $this->getDescripcion(), $this->getPrecio(), $this->getStock(), $this->getImagen()));
        } else {
            $result = $query->execute(array($this->getCategoria_id(), $this->getNombre(), $this->getDescripcion(), $this->getPrecio(), $this->getStock()));
        }
        $correct = false;
        if ($result) {
            $correct = true;
        }
        return $correct;
    }


    public function delete()
    {
        $query = $this->db->prepare("DELETE FROM Productos WHERE id=?");
        $result = $query->execute(array($this->getId()));
        $correct = false;
        if ($result) {
            $correct = true;
        }
        return $correct;
    }
}
