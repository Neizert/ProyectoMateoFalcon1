<body>
    <section id="contacto-header">
        <div class="contacto">
            <h1>¡Contactate con nosotros!</h1>
            <p>Lunes a Sábados</p>
            <p>8:00 - 12:00 / 14:00 - 00:00</p>
        </div>
    </section>

    <section id="contacto-info">
        <div class="correos">
            <div class="contenedor-correo">
                <a href="mailto:neverxfulll@gmail.com" target="_blank">
                    <img src="<?= base_url('assets/img/gmail.png') ?>" alt="logo correo" class="logo-correo">
                </a>
                <p>neverxfulll@gmail.com</p>
            </div>
            <div class="contenedor-correo">
                <a href="https://wa.me/5493794261546" target="_blank">
                    <img src="<?= base_url('assets/img/WhatsApp.png') ?>" alt="logo whatsapp" class="logo-wp">
                </a>
                <p>+54 9 379-4-261546</p>
            </div>
        </div>

        <div class="formulario">
            <div class="carta personalizada">
                <div class="carta-body">
                    <h5 class="carta-title">FORMULARIO DE CONTACTO</h5>
                    <p class="carta-texto">Dejá tus consultas</p>

                    <form action="<?= base_url('consultas/guardar') ?>" method="post">
                        <div class="fila">
                            <div class="campo">
                                <input type="text" name="nombre" placeholder="Nombre" required>
                            </div>
                            <div class="campo">
                                <input type="text" name="apellido" placeholder="Apellido" required>
                            </div>
                        </div>

                        <div class="fila">
                            <div class="campo">
                                <input type="email" name="email" placeholder="Correo electrónico" required>
                                <input type="text" name="telefono" placeholder="Teléfono" required>
                                <input type="text" name="asunto" placeholder="Asunto" required>
                                <textarea name="mensaje" placeholder="Escribí tu mensaje aquí..." rows="5" required></textarea>
                                <button type="submit">Enviar consulta</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <section id="contacto-direccion">
        <div class="direccion">
            <h1>Nuestro local</h1>
            <p>Lisandro Segovia 1932, Corrientes, Argentina</p>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3556.2108846263896!2d-58.83073092540209!3d-27.496160217174217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456c251a8b9475%3A0x26767b36d734c3e!2sLisandro%20Segovia%201932%2C%20W3400DUL%20Corrientes!5e0!3m2!1ses!2sar!4v1715614158417!5m2!1ses!2sar"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>

    <section id="trabaja-con-nosotros">
        <h2>Trabajá con Nosotros</h2>
        <p>¿Te gustaría formar parte de nuestro equipo? En SweetFlavor valoramos el talento y el compromiso. Si compartís nuestra pasión por los helados artesanales y el servicio al cliente, ¡queremos conocerte!</p>
        <p>Envianos tu CV a <strong>sweetflavor.rh@gmail.com</strong> y sé parte de una experiencia única en el mundo del sabor.</p>
    </section>

    <section id="contacto-frase">
        <div class="frase">
            <h2>"El sabor que te hace volver. Siempre una cucharada más."</h2>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
