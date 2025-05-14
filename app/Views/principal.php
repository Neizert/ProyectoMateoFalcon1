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

    <!-- TÍTULO SOBRE EL CARRUSEL -->
    <section class="temporada">
        <h1 class="textito">Nuestros productos</h1>
    </section>

    <!-- SECCIÓN PRINCIPAL CON CARRUSEL -->
    <section class="inicio-heladeria">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <h3>Sundae</h3>
                    <img src="assets/img/sundae.png" class="d-block w-100" alt="Sundae">
                    <a href="#" class="boton-comprar">Comprar ahora</a>
                </div>

                <div class="carousel-item">
                    <h3>Paleta bombón</h3>
                    <img src="assets/img/bombon.png" class="d-block w-100" alt="Bombon">
                    <a href="#" class="boton-comprar">Comprar ahora</a>
                </div>

                <div class="carousel-item">
                    <h3>Paleta frutal</h3>
                    <img src="assets/img/pre.png" class="d-block w-100" alt="Preenvasado">
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

    <!-- TEMPORADA -->
    <section class="temporada">
        <h1 class="textito">¡Nueva temporada de sabores!</h1>
    </section>

    <!-- CATÁLOGO DE PRODUCTOS -->
    <section id="catalogo" class="container mt-5">
        <h2 class="text-center mb-4">Catálogo de Sabores</h2>
        <div class="row g-4">
            <!-- Primeros 3 productos -->
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/helado1.png" class="card-img-top" alt="Chocolate">
                    <div class="card-body">
                        <h5 class="card-title">Chocolate</h5>
                        <p class="card-text">$500</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/helado2.png" class="card-img-top" alt="Frutilla">
                    <div class="card-body">
                        <h5 class="card-title">Frutilla</h5>
                        <p class="card-text">$500</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/helado3.png" class="card-img-top" alt="Dulce de Leche">
                    <div class="card-body">
                        <h5 class="card-title">Dulce de Leche</h5>
                        <p class="card-text">$500</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

            <!-- Productos adicionales (9 más) -->
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/helado4.png" class="card-img-top" alt="Vainilla">
                    <div class="card-body">
                        <h5 class="card-title">Vainilla</h5>
                        <p class="card-text">$500</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/helado5.png" class="card-img-top" alt="Mango">
                    <div class="card-body">
                        <h5 class="card-title">Mango</h5>
                        <p class="card-text">$500</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/helado6.png" class="card-img-top" alt="Frambuesa">
                    <div class="card-body">
                        <h5 class="card-title">Frambuesa</h5>
                        <p class="card-text">$500</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/helado7.png" class="card-img-top" alt="Coco">
                    <div class="card-body">
                        <h5 class="card-title">Coco</h5>
                        <p class="card-text">$500</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/helado8.png" class="card-img-top" alt="Limón">
                    <div class="card-body">
                        <h5 class="card-title">Limón</h5>
                        <p class="card-text">$500</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/helado9.png" class="card-img-top" alt="Menta con Chocolate">
                    <div class="card-body">
                        <h5 class="card-title">Menta con Chocolate</h5>
                        <p class="card-text">$500</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/helado10.png" class="card-img-top" alt="Tiramisu">
                    <div class="card-body">
                        <h5 class="card-title">Tiramisu</h5>
                        <p class="card-text">$500</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/helado11.png" class="card-img-top" alt="Cereza">
                    <div class="card-body">
                        <h5 class="card-title">Cereza</h5>
                        <p class="card-text">$500</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/helado12.png" class="card-img-top" alt="Cereza">
                    <div class="card-body">
                        <h5 class="card-title">Americana</h5>
                        <p class="card-text">$500</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
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
