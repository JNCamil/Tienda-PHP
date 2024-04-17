<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?=base_url?>">
    <!--Sin la tag base, ponemos en href de styles:
     href="< ?=base_url?>assets\css\styles.css" -->
    <link rel="stylesheet" href="assets\css\styles.css" />
    <title>Tienda</title>
</head>

<body>
    <div id="container">
        <!-- CABECERA -->
        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>assets/img/camiseta.png" alt="camiseta">
                <a href="<?=base_url?>">
                    Tienda de Ropa
                </a>
            </div>

        </header>
        <!-- MENÚ -->
        <?php $categorias=Utils::showCategorys(); ?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="">Inicio</a>
                </li>
                <?php foreach($categorias as $categoria): ?>
                <li>
                    <a href="<?=base_url?>categoria/ver&id=<?=$categoria['id']?>"><?=$categoria['nombre'];?></a>
                </li>
                <?php endforeach; ?>
               
            </ul>
        </nav>
        <div id="content">