<?php
require_once "models/producto.php";
class ProductoController
{
    public function index()
    {

        $producto = new Producto();
        $productos = $producto->getRandom(6);
        //var_dump($productos);
        //Renderizar vista
        require_once "views/producto/destacados.php";
    }

    public function gestion()
    {
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once "views/producto/gestion.php";
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once "views/producto/crear.php";
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
            //var_dump($nombre);die();
            //Guardar PRODUCTO
            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);

                if (isset($_FILES['imagen'])) {


                    //GUARDAR LA IMAGEN
                    $file = $_FILES['imagen']; //VAR GLOBAL 
                    $filename = $file['name']; //NAME ARCHIVO
                    $mimetype = $file['type']; //TIPO ARCHIVO
                    //var_dump($file);die();

                    if ($mimetype == "image/jpg" ||  $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {
                        if (!is_dir('uploads/images')) { //SI NO EXISTE CARPETA, SE CREA
                            mkdir('uploads/images', 0777, true); //TRUE PARA QUE LO HAGA RECURSIVAMENTE
                        }
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename); //MOVER ARCHIVO: Nombre temporal del archivo, destino
                        $producto->setImagen($filename);
                    }
                }

                //EN UN CASO ACTUALIZO EN EL OTRO GUARDO

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->edit();
                }else{
                    $save = $producto->save();
                }

                
                if ($save) {
                    $_SESSION['producto'] = 'complete';
                } else {
                    $_SESSION['producto'] = 'failed';
                }
            } else {
                $_SESSION['producto'] = 'failed';
            }
        } else {
            $_SESSION['producto'] = 'failed';
        }
        header("Location:" . base_url . "producto/gestion");
    }


    public function editar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            //Reutilizamos la vista, pero con una variable que le pasamos
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();



            require_once "views/producto/crear.php";
        } else {
            header("Location:" . base_url . "producto/gestion");
        }
    }

    public function eliminar()
    {

        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $delete = $producto->delete();
            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }

        header("Location:" . base_url . "producto/gestion");
    }
}
