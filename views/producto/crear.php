<h1>Crear nuevos productos</h1>
<div class="form_container">
<form action="<?= base_url ?>producto/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">

    <label for="descripcion">Descripción</label>
    <textarea name="descripcion"></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio">

    <label for="stock">Stock</label>
    <input type="number" name="stock">

    <label for="categoria">Categoría</label>
    <?php $categorias = Utils::showCategorys(); ?>
    <select name="categoria">
        <?php foreach ($categorias as $categoria) : ?>
            <option value="<?= $categoria['id']; ?>">
                <?= $categoria['nombre']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="imagen">Imagen</label>
    <input type="file" name="imagen">

    <input type="submit" value="Guardar">


</form>
</div>