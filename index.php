<?php 
session_start();
require_once "autoload.php";
require_once "config/db.php";
require_once "config/parameters.php";
require_once "helpers/utils.php";
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

//Para HACERLO MANUAL: ***************************************************************************************
// $controlador = new UsuarioController();
// $controlador->mostrarTodos();
// $controlador->crear();


function show_error(){
    $error = new ErrorController();
    $error->index();
}
//Para hacerlo DINÁMICO O LLAMADO CONTROLADOR FRONTAL:  *******************************************************
// PARA EL CONTROLADOR:
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller']. 'Controller';//Si concateno, no tengo que usar en la URL toda la clase
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controlller_default;
}else{
    show_error();
    // Sin el controlador: echo "La página no existe";
    exit(); //hace parar la ejecución
}

if(isset($nombre_controlador) && class_exists($nombre_controlador)){ 
    //Realmente se puede poner sólo   if(class_exists($nombre_controlador)
   
    $controlador = new $nombre_controlador;

    // PARA LA ACCIÓN:
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
    
        $controlador->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $default = action_default;
        $controlador->$default();
    }else{
        show_error();
        //Sin el controlador: echo "La página no existe";
    }

}else{
    show_error();

    //echo "La página no existe";
}

require_once 'views/layout/footer.php';
?>