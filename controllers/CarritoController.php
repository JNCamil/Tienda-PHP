<?php
require_once "models/producto.php";
class CarritoController
{
    public function index()
    {
        $carrito = $_SESSION['carrito'];
        //var_dump($_SESSION['carrito'][0]['unidades']);

        require_once "views/carrito/index.php";
        //echo "Controlador carrito, acción index";
    }



    public function add()
    {


        if (isset($_GET['id'])) {

            $producto_id = $_GET['id'];
        } else {
            header("Location:" . base_url);
        }

        if (isset($_SESSION['carrito'])) {
            //Ojo con poner el counter dentro del bucle porque se reinicia
            //Cuenta el número de veces que se encuentra el producto en el carrito
            $counter = 0;

            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                
                

                if ($elemento['id_producto']== $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }
        if (!isset($counter) || $counter == 0) {
            //CONSEGUIR PRODCUTO
            $producto = new Producto();
            $producto->setId($producto_id);
            $pro = $producto->getOne();


            //AÑADIR AL CARRITO

            if (is_array($pro)) {

                $_SESSION['carrito'][] = array(
                    "id_producto" => $pro['id'],
                    "precio" => $pro['precio'],
                    "unidades" => 1,
                    "producto" => $pro

                );
            }
        }

        header("Location:" . base_url . "carrito/index");
    }

    public function remove()
    {
    }


    public function delete_all()
    {
        unset($_SESSION['carrito']);
        header("Location:" . base_url . "carrito/index");
    }
}
