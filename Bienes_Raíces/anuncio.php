<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>


    <main class="contenedor seccion contenido-centrado">
        <h1 class="negritas">Casa en Venta Frente al Bosque</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="imag/webp">
            <source srcset="build/img/destacada.jpg" type="imag/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="img de propiedad">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio"> $3,000,000</p>
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
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, atque voluptatem. Distinctio officiis unde tempore ab illo eum illum quisquam. Earum dignissimos vero molestiae soluta nemo consectetur fugit voluptatem et?
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam sit incidunt inventore eaque. Quia ab obcaecati at tempora eveniet adipisci, esse voluptatum modi autem ratione ea rem reprehenderit voluptas ipsum?
            </p>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla itaque et maiores rerum in, ullam quis fugiat, nesciunt nam, beatae suscipit. Quaerat aliquam eos eaque nihil unde modi ea hic!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi deleniti cum eligendi quasi cupiditate! Rem cupiditate voluptas repellendus dicta perferendis alias voluptate. Maxime molestiae enim corrupti natus aut quae magni?
            </p>
        </div>
    </main>

<?php 
    incluirTemplate('footer');
?>