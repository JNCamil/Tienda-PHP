<?php 

class Database{
    public static function connect(){

        #Setear los resultados de la base de datos en utf8 (tildes, ñ, ..)
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );

        $bd = new PDO('mysql:dbname=tienda_master;host=localhost', "root", "", $options);
        #Excepciones para cuando ocurra un error
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bd;

    }
}


?>