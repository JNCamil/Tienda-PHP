<?php
require_once "models/pedido.php";
class PedidoController
{
    public function hacer()
    {


        require_once "views/pedido/hacer.php";
    }



    public function add()
    {
        //var_dump($_POST);
        if (isset($_SESSION['identity'])) {
            //var_dump($_SESSION['identity']);
            //GUARDAR PEDIDO
            $usuario_id = $_SESSION['identity']['id'];
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];
            if ($provincia && $localidad && $direccion) {

                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                // GUARDAR LÍNEA PEDIDO
                $save_linea= $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = 'complete';
                } else {
                    $_SESSION['pedido'] = 'failed';
                }

                //var_dump($pedido);
            } else {
                $_SESSION['pedido'] = 'failed';
            }
            header("Location:".base_url."pedido/confirmado");
        } else {
            //REDIRIGIR AL INDEX
            header("Location:" . base_url);
        }
    }



    public function confirmado(){
        if(isset($_SESSION['identity'])){
            $identity = $_SESSION['identity'];
       

        $pedido = new Pedido();
        $pedido->setUsuario_id($identity['id']);
        $pedido=$pedido->getOneByUser();
        //var_dump($pedido);die();


        $pedido_productos = new Pedido();
        $productos=$pedido_productos->getProductsByPedido($pedido['id']);
        //var_dump($productos);die();
        }



        require_once "views/pedido/confirmado.php";
    }


    public function mis_pedidos(){
        Utils::isIdentity();
        //var_dump($_SESSION['identity']['id']);die();
        $usuario_id = $_SESSION['identity']['id'];
        $pedido = new Pedido();


        //SACAR LOS PEDIDOS DEL USUARIO
        $pedido->setUsuario_id($usuario_id);
        $pedidos=$pedido->getAllByUser();
        require_once "views/pedido/mis_pedidos.php";
    }
}
