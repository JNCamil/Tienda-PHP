<h1>Gestión de productos</h1>

<!-- CREAR PRODUCTO -->
<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
   <strong class="alert_green">El producto se ha creado correctamente</strong> 

<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
    <strong class="alert_red">El producto no se ha creado correctamente</strong> 
   
<?php endif; ?>

<?php Utils::deleteSession('producto'); ?>

<!--BORRAR PRODUCTO -->
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
   <strong class="alert_green">El producto se ha borrado correctamente</strong> 

<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red">El producto no se ha borrado correctamente</strong> 
   
<?php endif; ?>

<?php Utils::deleteSession('delete'); ?>
<table>
    <tr>
        
      <th>ID</th>
      <th>NOMBRE</th>
      <th>PRECIO</th>
      <th>STOCK</th>
      <th>ACCIONES</th>

    </tr>
<?php foreach($productos as $producto): ?>
    <tr>
        
      <td><?=$producto['id'];?></td>
      <td><?=$producto['nombre'];?></td>
      <td><?=$producto['precio'];?></td>
      <td><?=$producto['stock'];?></td>
      <td>
        <!--OJO: AL SER OTRO PARÁMETRO, SE TIENE QUE PASAR CON & Y NO CON ? POR NO SER EL PRIMERO-->
        <a href="<?=base_url?>producto/editar&id=<?=$producto['id']?>" class="button button-gestion">Editar</a>
        <a href="<?=base_url?>producto/eliminar&id=<?=$producto['id']?>" class="button button-gestion button-red">Eliminar</a>
      </td>

    </tr>
    
<?php endforeach; ?>
</table>