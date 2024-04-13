<?php 
/*
Los modelos representa a los registros de la tabla de la base de datos.
La representación de cada uno de ellos sería el modelo
Cuando yo creo un objeto con el modelo lo que hago es simular como si fuera
a crear un registro en la base de datos, es decir, un objeto representa un registro
*/
class Categoria{
    //Le definimos tantas propiedades como tengamos en la bbdd
    private $id;
    private $nombre;
    private $db;


    public function __construct(){
        //Conexión bbdd
        $this->db = Database::connect();
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


    public function getAll(){
        $query=$this->db->prepare("SELECT * FROM Categorias ORDER BY id DESC");
        $query->execute();
        $result=$query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOne(){
        $query=$this->db->prepare("SELECT * FROM Categorias WHERE id=?");
        $query->execute(array($this->getId()));
        $result=$query->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    public function save(){
        
        $query=$this->db->prepare("INSERT INTO Categorias VALUES (?,?)");
        $result=$query->execute(array(NULL, $this->getNombre()));
        $correct=false;
        if($result){
            $correct=true;
        }
        return $correct;
    }

}



?>