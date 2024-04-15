<?php 



class Pedido
{
    //Le definimos tantas propiedades como tengamos en la bbdd
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
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
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of usuario_id
     */ 
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     *
     * @return  self
     */ 
    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get the value of provincia
     */ 
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set the value of provincia
     *
     * @return  self
     */ 
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get the value of localidad
     */ 
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set the value of localidad
     *
     * @return  self
     */ 
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of coste
     */ 
    public function getCoste()
    {
        return $this->coste;
    }

    /**
     * Set the value of coste
     *
     * @return  self
     */ 
    public function setCoste($coste)
    {
        $this->coste = $coste;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

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
     * Get the value of hora
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    public function save()
    {
        $date = date("Y-m-d");
        $hora_actual = date("H:i:s");
        $query = $this->db->prepare("INSERT INTO Pedidos VALUES (?,?,?,?,?,?,?,?,?)"); //Podría meter la fecha y hora aquí con curdate() y curtime()
        $result = $query->execute(array(NULL, $this->getUsuario_id(), $this->getProvincia(), $this->getLocalidad(), $this->getDireccion(), $this->getCoste(), 'confirm', $date, $hora_actual));
        $correct = false;
        if ($result) {
            $correct = true;
        }
        return $correct;
    }

    public function getAll()
    {
        $productos = $this->db->prepare("SELECT * FROM Pedidos ORDER BY id DESC");
        $productos->execute();
        $result = $productos->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOne()
    {
        $productos = $this->db->prepare("SELECT * FROM Pedidos WHERE id=?");
        $productos->execute(array($this->getId()));
        $result = $productos->fetch(PDO::FETCH_ASSOC);
        //var_dump($result);die();
        return $result;
    }

//*************LÍNEA DE PEDIDOS */
    public function save_linea(){
        //SELECCIONA EL ID DEL ÚLTIMO INSERT
        $sql= "SELECT LAST_INSERT_ID() AS 'pedido';";
        $query=$this->db->prepare($sql);
        $query->execute();
        $pedido_id=$query->fetch(PDO::FETCH_ASSOC)['pedido'];

        foreach ($_SESSION['carrito'] as  $elemento) {
            //Pasamos el 'producto' de la sesión del carrito, que es el que tiene la imagen
            $producto = $elemento['producto'];
            //var_dump($producto);

            $insert="INSERT INTO Lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto['id']}, {$elemento['unidades']});";
            $query=$this->db->prepare($insert);
            $save=$query->execute();

        }
        $correct = false;
        if ($save) {
            $correct = true;
        }
        return $correct;
       

    }

}



?>