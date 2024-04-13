<?php if (isset($categoria) && is_array($categoria)) : ?>

    <h1><?= $categoria['nombre'] ?></h1>
    <?php if (empty($productos)) : ?>
        <p>No hay productos para mostrar</p>
    <?php else : ?>
        <?php foreach ($productos as $pro) : ?>
            <div class="product">
                <?php if ($pro['imagen'] != null) : ?>
                    <img src="<?= base_url ?>uploads/images/<?= $pro['imagen'] ?>" alt="">
                <?php else : ?>
                    <img src="<?=base_url?>assets/img/camiseta.png" alt="">
                <?php endif; ?>
                <h2><?= $pro['nombre'] ?></h2>
                <p><?= $pro['precio'] ?></p>
                <a href="#" class="button">Comprar</a>

            </div>
        <?php endforeach; ?>
    <?php endif; ?>
<?php else : ?>
    <h1>La categoría no existe</h1>
<?php endif; ?>