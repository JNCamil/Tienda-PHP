<h1>Algunos de nuestros productos</h1>

<?php foreach($productos as $pro): ?>
                <div class="product">
                    <?php if($pro['imagen'] != null): ?>
                    <img src="<?=base_url?>uploads/images/<?=$pro['imagen']?>" alt="">
                    <?php else: ?>
                        <img src="<?=base_url?>assets/img/camiseta.png" alt="">
                    <?php endif; ?>
                    <h2><?=$pro['nombre']?></h2>
                    <p><?=$pro['precio']?></p>
                    <a href="#" class="button">Comprar</a>

                </div>
<?php endforeach; ?>
           
    
