<h1>Gestión de productos</h1>


<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>

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