<?php

require 'app.php';

function incluirTemplate(string $nombre, bool $principal = false) {
    include TEMPLATES_URL."/$nombre.php";
}