<?php 
//Se le pasa el nombre de la clase
//CARGA DE CONTROLADORES
function controller_autoload($classname){

    include "controllers/" . $classname . ".php";
    //Hace un include de cada uno de los controladores
}

//Esta función utiliza la función de arriba para buscar todas las clases del directorio que le indique
spl_autoload_register("controller_autoload");

?>