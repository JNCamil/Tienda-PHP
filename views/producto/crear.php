<?php if(isset($edit) && isset($pro) && is_array($pro)): ?>
<h1>Editar producto <?=$pro['nombre']?></h1>
<?php $url_action= base_url."producto/save&id=".$pro['id']; ?>
<?php else: ?>
    <h1>Crear nuevos productos</h1>
    <?php $url_action= base_url."producto/save"; ?>
<?php endif; ?>

<div class="form_container">
    
<form action="<?=$url_action?>" method="POST" ENCTYPE="multipart/form-data">
<!--SUBIDA DE ARCHIVOS: ATTR ENCTYPE="MULTIPART/FORM-DATA-->
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?=isset($pro) && is_array($pro)?$pro['nombre']:"";?>">

    <label for="descripcion">Descripción</label>
    <textarea name="descripcion"><?=isset($pro) && is_array($pro)?$pro['descripcion']:"";?></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" value="<?=isset($pro) && is_array($pro)?$pro['precio']:"";?>">

    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?=isset($pro) && is_array($pro)?$pro['stock']:"";?>">

    <label for="categoria">Categoría</label>
    <?php $categorias = Utils::showCategorys(); ?>
    <select name="categoria">
        <?php foreach ($categorias as $categoria) : ?>
            <option value="<?= $categoria['id']; ?>" <?=isset($pro) && is_array($pro) && $categoria['id']==$pro['categoria_id']?'selected':"";?>><!--SELECTED EL ID DE PRO-->
                <?= $categoria['nombre']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="imagen">Imagen</label>
    <?php if(isset($pro) && is_array($pro) && !empty($pro['imagen'])):?>

        <img src="<?=base_url?>uploads/images/<?=$pro['imagen']?>" class="thumb">

    <?php endif; ?>
    <input type="file" name="imagen">

    <input type="submit" value="Guardar">


</form>
</div>