<?php 
require_once "models/usuario.php";
class UsuarioController{
    public function index(){
        echo "Controlador Usuarios, acción index";
    }
    public function registro(){
        require_once "views/usuario/registro.php";
    }

    public function save(){
        if(isset($_POST)){

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            //VALIDAR CAMPOS: **********************************
            if(preg_match("/[0-9]+/", $nombre)){
                $nombre = false;
            }
            if($nombre && $apellidos && $email && $password){
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
                
                //var_dump($_POST);
                $save = $usuario->save();
                if($save){
                    $_SESSION['register'] = "complete";
                    //echo "registro completado";
                }else{
                    $_SESSION['register'] = "failed";
                    //echo "registro fallido";
                }
            }else{
                $_SESSION['register'] = "failed";
            }
        }else{
            $_SESSION['register'] = "failed";
            
        }
        header("Location:".base_url.'usuario/registro');
    }
}


?>