<?php 
require_once "models/categoria.php";
require_once "models/producto.php";
class CategoriaController{
    public function index(){
        //echo "Controlador categoría, acción index";
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias=$categoria->getAll();

        require_once "views/categoria/index.php";

    }


    public function crear(){
        Utils::isAdmin();
        require_once "views/categoria/crear.php";
    }


    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){

        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
        //var_dump($nombre);die();
        //Guardar categoría
        $categoria = new Categoria();
        $categoria->setNombre($nombre);
        $categoria->save();
        }



        header("Location:".base_url."categoria/index");
        
    }

    public function ver(){
        if(isset($_GET['id'])){
            $id= $_GET['id'];
            //var_dump($_GET['id']);



            //CONSEGUIR CATEGORÍA
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();
            //var_dump($categoria);die();
            //var_dump($categoria);


            //CONSEGUIR PRODUCTOS
            $producto=new Producto();
            $producto->setCategoria_id($id);
            $productos=$producto->getAllCategory();
            //var_dump($productos);die();
            

        }
        require_once "views/categoria/ver.php";
    }


}


?>