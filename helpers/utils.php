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
}
