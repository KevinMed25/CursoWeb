<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1 class="negritas">Guía para la decoración de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="imag/webp">
            <source srcset="build/img/destacada2.jpg" type="imag/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="img de propiedad">
        </picture>
        <p class="informacion-meta">Escrito el: <span>13/05/2023</span> por: <span>Admin</span></p>
        <div class="resumen-propiedad">
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