<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\styles.css" />
    <title>Tienda</title>
</head>

<body>
    <div id="container">
        <!-- CABECERA -->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="camiseta">
                <a href="index.php">
                    Tienda de camisetas
                </a>
            </div>

        </header>
        <!-- MENÚ -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="">Categoría</a>
                </li>
                <li>
                    <a href="">Categoría</a>
                </li>
                <li>
                    <a href="">Categoría</a>
                </li>
                <li>
                    <a href="">Categoría</a>
                </li>
                <li>
                    <a href="">Categoría</a>
                </li>
                <li>
                    <a href="">Categoría</a>
                </li>
                <li>
                    <a href="">Categoría</a>
                </li>
            </ul>
        </nav>
        <div id="content">
            <!-- BARRA LATERAL -->

            <aside id="lateral">
                <div id="login" class="block_aside">
                    <h3>Entrar a la web</h3>
                    <form action="#" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email" />
                        <label for="password">Contraseña</label>
                        <input type="password" name="password">
                        <input type="submit" value="Enviar">

                    </form>
                    <ul>
                        <li><a href="#">Mis pedidos</a></li>
                        <li><a href="#">Gestionar pedidos</a></li>
                        <li><a href="#">Gestionar categorías</a></li>
                    </ul>


                </div>

            </aside>

            <!-- CONTENIDO CENTRAL -->
            <div id="central">
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 €</p>
                    <a href="#">Comprar</a>

                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 €</p>
                    <a href="#">Comprar</a>

                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 €</p>
                    <a href="#">Comprar</a>

                </div>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>30 €</p>
                    <a href="#">Comprar</a>

                </div>

            </div>
        </div>
        <!-- PIE DE PÁGINA  -->
        <footer id="footer">
            <p>Desarrollado por Camilo &copy;
                <?= date('Y'); ?>
            </p>
        </footer>
    </div>

</body>

</html>