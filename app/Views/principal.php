<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heladería Delicia</title>

    <!-- Tipografía y estilos -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/principal.css">
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</head>
<body>

    <!-- SECCIÓN PRINCIPAL CON CARRUSEL -->
    <section class="inicio-heladeria">
        <section class="temporada">
            <h1 class="textito">Nuestros productos</h1>
        </section>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">

                    <img src="assets/img/sundae.png" class="d-block w-100" alt="Sundae">
                    <a href="sabores" class="boton-comprar">Ver Sabores</a>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/bombon.png" class="d-block w-100" alt="Bombon">
                    <a href="bombones" class="boton-comprar">Ver Bombones</a>
                </div>
                <div class="carousel-item">
                 
                    <img src="assets/img/pre.png" class="d-block w-100" alt="Preenvasado">
                    <a href="paletas" class="boton-comprar">Ver Paletas</a>
                </div>
            </div>
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

    <!-- NUEVA SECCIÓN: SABORES, TRADICIÓN, DÓNDE ESTAMOS -->
    <section class="container my-5 letracont">
        <div class="row text-center">
            <div class="col-md-4">
                <h2>SABORES</h2>
                <p>Cada uno de nuestros sabores nace de una receta única.</p>
                <a href="sabores" class="btn btn-primary mt-3">CONÓCELOS</a>
            </div>
            <div class="col-md-4">
                <h2>TRADICIÓN</h2>
                <p>Un legado de tradición italiana. Elaboramos gelato con estilo italiano desde hace más de 50 años.</p>
                <a href="nosotros" class="btn btn-primary mt-3">CONÓCELA</a>
            </div>
            <div class="col-md-4">
                <h2>DÓNDE ESTAMOS</h2>
                <p>Más de 160 locales en todo el mundo.</p>
                <a href="contacto" class="btn btn-primary mt-3">ENCUÉNTRANOS</a>
            </div>
        </div>
    </section>

    <!-- NUEVA TEMPORADA DE SABORES -->
    <section id="catalogo" class="container mt-5">
        <h2 class="text-center mb-4">Nuestras recetas</h2>
        <div class="row g-4">
            <!-- Tarjetas representativas -->
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/paletas.png" class="card-img-top" alt="Paletas">
                    <div class="card-body">
                        <h5 class="card-title">Paletas</h5>
                        <p class="card-text">Las mejores paletas artesanales, llenas de sabor y frescura.</p>
                        <a href="paletas" class="btn btn-primary">Ver Paletas</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/sabores.png" class="card-img-top" alt="Sabores de Helado">
                    <div class="card-body">
                        <h5 class="card-title">Sabores de Helado</h5>
                        <p class="card-text">Descubre nuestra variedad de sabores cremosos y frutales.</p>
                        <a href="sabores" class="btn btn-primary">Ver Sabores</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/bombones.png" class="card-img-top" alt="Bombones">
                    <div class="card-body">
                        <h5 class="card-title">Bombones</h5>
                        <p class="card-text">Pequeñas delicias heladas cubiertas de chocolate.</p>
                        <a href="bombones" class="btn btn-primary">Ver Bombones</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SELLOS DE CALIDAD -->
    <section class="calidad frase-final">
        <h2>"La felicidad se derrite en cada cucharada."</h2>
    </section>

    <!-- Scripts -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>
