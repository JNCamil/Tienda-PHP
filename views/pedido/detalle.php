<h1>Detalle del pedido</h1>

<?php if (isset($pedido)) :  ?>
    <?php if(isset($_SESSION['admin'])): ?>
    <h3>Cambiar estado del pedido:</h3>
    <form action="<?=base_url?>pedido/estado" method="POST">
    <!--input hidden, el id del pedido viaje por las cabeceras y por post-->
    <input type="hidden" value="<?= $pedido['id'] ?>" name="pedido_id">
    <select name="estado" >
        <option value="confirm" <?=$pedido['estado']=="confirm" ? 'selected' : "";?> >Pendiente</option>
        <option value="preparation" <?=$pedido['estado']=="preparation" ? 'selected' : "";?> >En preparación</option>
        <option value="ready" <?=$pedido['estado']=="ready" ? 'selected' : "";?> >Preparado para enviar</option>
        <option value="sent" <?=$pedido['estado']=="sent" ? 'selected' : "";?> >Enviado</option>
    </select>
    <input type="submit" value="Cambiar">

    </form>
    <br>
    <?php endif; ?>



    <h3>Dirección del envío</h3>
    Provincia:<?= $pedido['provincia'] ?> <br>
    Localidad:<?= $pedido['localidad'] ?> <br>
    Dirección:<?= $pedido['direccion'] ?> <br><br>
    <h3>Datos del pedido:</h3>


    Número de pedido: <?= $pedido['id'] ?> <br>
    Total a pagar: <?= $pedido['coste'] ?> $<br>
    Estado: <?= Utils::showStatus($pedido['estado']) ?> <br>
    Productos: <br><br>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php foreach ($productos as $producto) : ?>
            <tr>
                <td>
                    <?php if ($producto['imagen'] != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $producto['imagen'] ?>" class="img_carrito" alt="">
                    <?php else : ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" alt="">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url ?>producto/ver&id=<?= $producto['id'] ?>"> <?= $producto['nombre'] ?></a>
                </td>
                <td>
                    <?= $producto['precio'] ?>
                </td>
                <td>
                    <?= $producto['unidades'] ?>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>

<?php endif; ?>