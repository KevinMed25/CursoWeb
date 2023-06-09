<main class="contenedor">
        <h1 class="negritas">Más Sobre Nosotros</h1>
        <?php include 'iconos.php'; ?>
    </main>
    <section class="seccion contenedor">
        <h2 class="negritas">Casas y Departamentos en Venta</h2>
        
        <?php 
            include 'listado.php';
        ?>

        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="img-contacto">
        <h2>Encuentra la Casa de tus Sueños</h2>
        <p>Llena el formulario de contecto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="/contacto" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="seccion-inferior contenedor">
        <section class="blog">
            <h3 class="negritas">Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="img">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>12/05/2023</span> por: <span>Admin</span> </p>
                        <p>
                            Maximiza el espacio en tu hogar con esta gia, aprende a combinar muebles y colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="img">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Terraza al techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>12/05/2023</span> por: <span>Admin</span> </p>
                        <p>
                            Consejos para construir un terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                        </p>
                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3 class="negritas">Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con toas mis expectativas
                </blockquote>
                <p>- Kevin Medina</p>
            </div>
        </section>
    </div>
</main>