<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor">
        <h1 class="negritas">Conoce Sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="img-nosotros">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="sobre nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut rem laborum voluptatibus doloribus iste molestiae, consequuntur eum, quasi tenetur itaque autem inventore. Deleniti amet nulla voluptatum minus natus ipsa expedita.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero minima ipsam necessitatibus ex temporibus cupiditate asperiores itaque ducimus qui perferendis, atque quo laboriosam suscipit laborum hic dicta tenetur id illo.
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro expedita ex aliquid autem reiciendis. Natus voluptatibus non delectus nulla? Commodi voluptas ipsum dicta, sequi nemo totam voluptatem tenetur nisi inventore.
                </p>
            </div>
        </div>
    </main>
    <section class="contenedor">
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
    </section>

<?php 
    incluirTemplate('footer');
?>