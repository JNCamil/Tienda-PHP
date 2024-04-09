<?php 

/*

Entidad: una entidad es una clase que representa a un registro de la tabla de la base de datos
Modelo Entidad: Defino los campos que hay, y manipulo objetos con esa entidad
Modelo de repositorio/consulta: En el cual tengo una librería de métodos que hacen cosas con una entidad concreta, guardar usuario, listar usuario,...

*/

class Usuario{
    //Le definimos tantas propiedades como tengamos en la bbdd
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;

    public function __construct(){
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
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return password_hash($this->password, PASSWORD_BCRYPT, ['cost' => 10]);
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */ 
    public function setRol($rol)
    {
        $this->rol = $rol;

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

    //MÉTODOS*****************************************
    public function save(){
        /*
        para escapar caracteres especiales antes de insertar datos en una consulta SQL. En PDO, puedes utilizar sentencias preparadas para lograr lo mismo 
        que con real_escape_string de mysqli, de manera segura y eficiente.
        */
        $query=$this->db->prepare("INSERT INTO Usuarios VALUES (?,?,?,?,?,?,?)");
        $result=$query->execute(array(NULL, $this->getNombre(), $this->getApellidos(), $this->getEmail(), $this->getPassword(), 'user', NULL));
        /*
        Este enfoque es más seguro y eficiente que concatenar los valores directamente en la cadena de consulta, ya que PDO maneja la sanitización de datos automáticamente, 
        previniendo así posibles ataques de inyección SQL.*/
        $correct=false;
        if($result){
            $correct=true;
        }
        return $correct;
    }
}

?>