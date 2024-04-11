<h1>Gestión de productos</h1>


<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
   <strong class="alert_green">El producto se ha creado correctamente</strong> 

<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
    <strong class="alert_red">El producto no se ha creado correctamente</strong> 
   
<?php endif; ?>

<?php Utils::deleteSession('producto'); ?>
<table>
    <tr>
        
      <th>ID</th>
      <th>NOMBRE</th>
      <th>PRECIO</th>
      <th>STOCK</th>

    </tr>
<?php foreach($productos as $producto): ?>
    <tr>
        
      <td><?=$producto['id'];?></td>
      <td><?=$producto['nombre'];?></td>
      <td><?=$producto['precio'];?></td>
      <td><?=$producto['stock'];?></td>

    </tr>
    
<?php endforeach; ?>
</table>