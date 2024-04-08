<?php 

require_once "autoload.php";
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

//Para HACERLO MANUAL: ***************************************************************************************
// $controlador = new UsuarioController();
// $controlador->mostrarTodos();
// $controlador->crear();

//Para hacerlo DINÁMICO O LLAMADO CONTROLADOR FRONTAL:  *******************************************************
// PARA EL CONTROLADOR:
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller']. 'Controller';//Si concateno, no tengo que usar en la URL toda la clase
}else{
    echo "La página no existe";
    exit(); //hace parar la ejecución
}

if(isset($nombre_controlador) && class_exists($nombre_controlador)){ 
    //Realmente se puede poner sólo   if(class_exists($nombre_controlador)
   
    $controlador = new $nombre_controlador;

    // PARA LA ACCIÓN:
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
    
        $controlador->$action();
    }else{
        echo "La página no existe";
    }

}else{
    echo "La página no existe";
}

require_once 'views/layout/footer.php';
?>