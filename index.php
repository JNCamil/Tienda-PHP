<h1>Bienvenido</h1>
<?php 

require_once "autoload.php";


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

/** EJEMPLO USANDO GET: http://localhost/udephp/PHP%20MVC/?controller=Usuario&action=crear */

/*
 la función method_exists se utiliza para comprobar si un método específico está definido en una clase o si existe en un objeto dado. 
 Esta función toma dos parámetros: 
 el primer parámetro es el nombre de la clase o un objeto, y el segundo parámetro es el nombre del método que se desea verificar.*/
?>