<?php
    require 'includes/funciones.php';
    incluirTemplate('header',$principal = true);
?>

    <main class="contenedor">
        <h1 class="negritas">Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icon Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>
                    Soluta, cupiditate ipsum quas sunt recusandae mollitia quam ab delectus neque nesciunt perferendis doloremque.
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icon Seguridad" loading="lazy">
                <h3>Precio</h3>
                <p>
                    Soluta, cupiditate ipsum quas sunt recusandae mollitia quam ab delectus neque nesciunt perferendis doloremque.
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icon Seguridad" loading="lazy">
                <h3>A Tiempo</h3>
                <p>
                    Soluta, cupiditate ipsum quas sunt recusandae mollitia quam ab delectus neque nesciunt perferendis doloremque.
                </p>
            </div>
        </div>
    </main>
    <section class="seccion contenedor">
        <h2 class="negritas">Casas y Departamentos en Venta</h2>
        <div class="contenedor-anuncios">
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa de Lujo en el Lago</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                    <p class="precio">
                        $3,000,000
                    </p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono-dm" loading="lazy" src="build/img/icono_wc.svg" alt="icono WC">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono-dm" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono-dm" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                            <p>4</p>
                        </li>
                    </ul>
                    <a class="boton-amarillo-block" href="anuncio.php">Ver Propiedad</a>
                </div>
            </div>

            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio2.webp" type="image/webp">
                    <source srcset="build/img/anuncio2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio2.jpg" alt="anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa Terminados de Lujo</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                    <p class="precio">
                        $3,000,000
                    </p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono-dm" loading="lazy" src="build/img/icono_wc.svg" alt="icono WC">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono-dm" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono-dm" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                            <p>4</p>
                        </li>
                    </ul>
                    <a class="boton-amarillo-block" href="anuncio.php">Ver Propiedad</a>
                </div>
            </div>

            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio3.webp" type="image/webp">
                    <source srcset="build/img/anuncio3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/anuncio3.jpg" alt="anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa con Alberca</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                    <p class="precio">
                        $3,000,000
                    </p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono-dm" loading="lazy" src="build/img/icono_wc.svg" alt="icono WC">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono-dm" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono-dm" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                            <p>4</p>
                        </li>
                    </ul>
                    <a class="boton-amarillo-block" href="anuncio.php">Ver Propiedad</a>
                </div>
            </div>
        </div>
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="img-contacto">
        <h2>Encuentra la Casa de tus Sueños</h2>
        <p>Llena el formulario de contecto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
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
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>120/5/2023</span> por: <span>Admin</span> </p>
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
                    <a href="entrada.php">
                        <h4>Terraza al techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>120/5/2023</span> por: <span>Admin</span> </p>
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

<?php 
    incluirTemplate('footer');
?>