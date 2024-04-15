<h1>Algunos de nuestros productos</h1>

<?php foreach ($productos as $pro) : ?>
    <div class="product">
        <a href="<?=base_url?>producto/ver&id=<?=$pro['id']?>">
            <?php if ($pro['imagen'] != null) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $pro['imagen'] ?>" alt="">
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="">
            <?php endif; ?>
            <h2><?= $pro['nombre'] ?></h2>
        </a>
        <p><?= $pro['precio'] ?></p>
        <a href="<?=base_url?>carrito/add&id=<?=$pro['id']?>" class="button">Comprar</a>

    </div>
<?php endforeach; ?>