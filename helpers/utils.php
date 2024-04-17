<?php

class Utils
{
  public static function deleteSession($name)
  {
    if (isset($_SESSION[$name])) {
      $_SESSION[$name] = null;
      unset($_SESSION[$name]);
    }
    return $name;
  }



  public static function isAdmin()
  {  //Es un middelware.
    if (!isset($_SESSION['admin'])) {
      header("Location:" . base_url);
    } else {
      return true;
    }
  }
  public static function isIdentity()
  {  //Es un middelware.
    if (!isset($_SESSION['identity'])) {
      header("Location:" . base_url);
    } else {
      return true;
    }
  }


  public static function showCategorys()
  {
    require_once "models/categoria.php";
    $categoria = new Categoria();
    $categorias = $categoria->getAll();
    return $categorias;
  }

  public static function statsCarrito()
  {
    $stats = array(
      'count' => 0,
      'total' => 0
    );
    if (isset($_SESSION['carrito'])) {

      $stats['count'] = count($_SESSION['carrito']);
      //TOTAL CARRITO
      foreach ($_SESSION['carrito'] as $producto) {
        $stats['total'] += $producto['precio'] * $producto['unidades'];
      }
    }
    return $stats;
  }

  public static function showStatus($status)
  {
    /*
    //Con match el valor que se genera dentro de las condiciones es el que pasa a estar dentro de la variable
    $value = match($status){
      0, 1, 2 => "eres feo",
      3, 4, 5 => "eres no muy feo",
      6, 7, 8, 9 => "bonito",
      10 => "Guapo",
      default => "No eres nada",
    };
    //Evaluando expresiones
    $value = match(true){
      $status <= 2 => "eres feo",
      $status <= 5 => "eres no muy feo",
      $status <= 9 => "bonito",
      $status == 10 => "Guapo",
      default => "No eres nada",
    };
*/
     $value = match($status){
      'confirm' => 'Pendiente',
      'preparation' => 'En preparación',
      'ready' => 'Preparado para enviar',
      'sent'=> 'Enviado',
    };
    /*
    //switch
    $value = 'Pendiente';
    switch ($status) {
      case 'confirm':
        $value = 'Pendiente';
        break;
      case 'preparation':
        $value = 'En preparación';
        break;
      case 'ready':
        $value = 'Preparado';
        break;
      case 'sent':
        $value = 'Enviado';
        break;
    }
    */

    return $value;

  
  }
}
