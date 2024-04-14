<?php if (isset($pro)) : ?>

    <h1><?= $pro['nombre'] ?></h1>
  
    
        
            <?php if ($pro['imagen'] != null) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $pro['imagen'] ?>" alt="">
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="">
            <?php endif; ?>       
        <p><?= $pro['descripcion'] ?></p>
        <p><?= $pro['precio'] ?></p>
        <a href="#" class="button">Comprar</a>

    

<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif; ?>