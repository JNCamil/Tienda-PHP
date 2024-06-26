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

    public function login () {
        if(isset($_POST)){
            //Idenfitificar al usuario
            //Consulta a la base de datos
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $identity=$usuario->login();
            //var_dump($identity); die();
            
            if($identity){
                $_SESSION['identity'] = $identity;
                //var_dump($_SESSION['identity']);die();
                if($identity['rol']=='admin'){
                    $_SESSION['admin']= true;
                }
            }else{
                $_SESSION['error_login'] = 'Identificación fallida';
            }

            //Crear una sesión

        }

        header("Location:".base_url);
    }

    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        header("Location:".base_url);

    }


}//FIN CLASE


?>