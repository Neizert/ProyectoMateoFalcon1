<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heladería Delicia</title>

    <!-- Tipografía y estilos -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/principal.css">
</head>
<body>

    <!-- SECCIÓN PRINCIPAL -->
    <section class="inicio-heladeria">
        <img src="assets/img/helado.png" alt="Helado principal">
        <h1 class="slogan">¡El placer helado que necesitas!</h1>
        <h4 class="frase">Explora nuestros sabores exclusivos y disfruta de un helado como nunca antes.</h4>
        <a href="#catalogo" class="boton-catalogo">Ver catálogo</a>


    </section>

    <!-- TEMPORADA -->
    <section class="temporada">
        <h1 class="textito">¡Nueva temporada de sabores!</h1>
    </section>

    <!-- SABORES DESTACADOS -->
    <section class="sabores-destacados" id="catalogo">

        <div class="imagen-decorativa">
            <img src="assets/img/sundae.png" alt="Sundae especial">
        </div>

        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <h3>Helado de Chocolate & Avellanas</h3>
                    <img src="assets/img/helado1.png" class="d-block w-100" alt="Helado de Chocolate">
                    <a href="#" class="boton-comprar">Comprar ahora</a>
                </div>

                <div class="carousel-item">
                    <h3>Frutilla y Crema</h3>
                    <img src="assets/img/helado2.png" class="d-block w-100" alt="Helado de Frutilla">
                    <a href="#" class="boton-comprar">Comprar ahora</a>
                </div>

                <div class="carousel-item">
                    <h3>Dulce de leche con almendras</h3>
                    <img src="assets/img/helado3.png" class="d-block w-100" alt="Helado de Dulce de Leche">
                    <a href="#" class="boton-comprar">Comprar ahora</a>
                </div>

            </div>

            <!-- Botones del carrusel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>

    <!-- SELLOS DE CALIDAD -->
    <section class="calidad">
        <span class="badge">Ingredientes naturales</span>
        <span class="badge">Sin conservantes</span>
        <span class="badge">Elaboración artesanal</span>
    </section>

    <!-- Scripts -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>
