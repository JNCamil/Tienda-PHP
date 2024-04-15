<h1>Carrito de la compra</h1>


<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php foreach ($carrito as $indice => $elemento) :
        //Pasamos el 'producto' de la sesión del carrito, que es el que tiene la imagen
        $producto = $elemento['producto'];
        //var_dump($producto);
    ?>
        <tr>
            <td>
                <?php if ($producto['imagen'] != null) : ?>
                    <img src="<?= base_url ?>uploads/images/<?= $producto['imagen'] ?>" class="img_carrito" alt="">
                <?php else : ?>
                    <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" alt="">
                <?php endif; ?>
            </td>
            <td>
                <a href="<?=base_url?>producto/ver&id=<?=$producto['id']?>"> <?=$producto['nombre']?></a>
            </td>
            <td>
                <?=$producto['precio']?>
            </td>
            <td>
                <?=$elemento['unidades']?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<div class="total-carrito">
<?php $stats = Utils::statsCarrito(); ?>
<h3>Precio total: <?=$stats['total']?> $</h3>
<a href="" class="button button-pedido">Hacer pedido</a>
</div>